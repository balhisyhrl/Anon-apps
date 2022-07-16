<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front_model', 'front');
		$this->session->set_flashdata('re_url', base_url("$_SERVER[REQUEST_URI]"));
	}

	public function index()
	{
		$data = [
			'count_customer' => $this->db->get_where('users_badge', ['badge' => 'customer'])->num_rows(),
			'count_products' => $this->db->get_where('items')->num_rows(),
			'count_sales' => $this->db->get_where('items_owned')->num_rows(),
			'last_users' => $this->db->query('SELECT avatar,name,username FROM users ORDER BY id DESC LIMIT 5'),
			'activity' => $this->front->activity()->result()
		];
		frontEnd_view('home/home', $data);
	}

	public function maintenance()
	{
		$data = $this->db->get_where('websettings', ['id' => 1])->row();
		if ($data->maintenance != 'on') {
			redirect(base_url());
		} else {
			$datas['websettings'] = $data;
			$this->load->view("frontend/maintenance", $datas);
		}
	}

	public function page_404()
	{
		$data = $this->db->get_where('websettings', ['id' => 1])->row();
		$datas['websettings'] = $data;
		$this->load->view("frontend/404", $datas);
	}

	public function explore()
	{
		$perpage = 8;
		$this->load->library('pagination');
		($this->input->get('tag')) ? $tag = $this->input->get('tag') : $tag = "none";
		($this->input->get('tipe')) ? $tipe = $this->input->get('tipe') : $tipe = "none";
		$page = $this->input->get('per_page');
		$config = [
			'allow_get_array' => true,
			'page_query_string' => true,
			'base_url' => base_url('explore'),
			'total_rows' => $this->front->countItems($tag, $tipe),
			'per_page' => $perpage,
			'use_page_numbers' => false,
			'full_tag_open' => '<ul class="pagination-list">',
			'full_tag_close' => '</ul>',
			'first_link' => false,
			'last_link' => false,
			'first_tag_open' => '<li><div class="pagination-link">',
			'first_tag_close' => '</div></li>',
			'prev_link' => '&laquo',
			'prev_tag_open' => '<li><div class="pagination-link">',
			'prev_tag_close' => '</div></li>',
			'next_link' => '&raquo',
			'next_tag_open' => '<li><div class="pagination-link">',
			'next_tag_close' => '</div></li>',
			'last_tag_open' => '<li class="page-item">',
			'last_tag_close' => '</li>',
			'cur_tag_open' => '<li><a class="pagination-link is-current">',
			'cur_tag_close' => '</a></li>',
			'num_tag_open' => '<li><div class="pagination-link">',
			'num_tag_close' => '</div></li>'
		];
		$this->pagination->initialize($config);
		$data['items'] = $this->front->items_list($perpage, $page, $tag, $tipe)->result();
		frontEnd_view('items/index', $data);
	}

	public function detail_items()
	{
		$url = _getSlug(2);
		$query = $this->front->items_detail($url);
		if ($query->num_rows() != 0) {
			$row = $query->row();
			$data = [
				'title' => $row->title,
				'row' => $row,
				'version' => $this->db->query("SELECT * FROM items_downloads WHERE id_items=$row->id ORDER BY id DESC"),
				'owned' => $this->db->get_where('items_owned', ['id_items' => $row->id])
			];
			frontEnd_view('items/detail', $data);
		} else {
			redirect(base_url('404'));
		}
	}

	public function download_items()
	{
		if (is_login()) {
			$id = _getSlug(2);
			$download = $this->db->get_where('items_downloads', ['id' => $id]);
			if ($download->num_rows() != 0) {
				$download = $download->row();
				$item = $this->db->get_where('items', ['id' => $download->id_items])->row();
				if ($item->tipe == 'forsale') {
					if ($this->db->get_where("items_owned", ['id_items' => $download->id_items, 'id_users' => $this->session->userdata('id_login')])->num_rows() != 0) {
						if (preg_match("/mediafire.com/i", $download->link)) {
							$this->load->helper('dom');
							$html = file_get_html($download->link);
							foreach ($html->find('a[id=downloadButton]') as $element)
								redirect($element->href);
						} else {
							redirect($download->link);
						}
					} else {
						$this->session->set_flashdata('error', 'Have no access.');
						redirect(base_url('explore'));
					}
				} else if ($item->tipe == 'member') {
					if ($this->db->get_where("users_badge", ['id_users' => $this->session->userdata('id_login'), 'badge' => 'member'])->num_rows() != 0) {
						if (preg_match("/mediafire.com/i", $download->link)) {
							$this->load->helper('dom');
							$html = file_get_html($download->link);
							foreach ($html->find('a[id=downloadButton]') as $element)
								redirect($element->href);
						} else {
							redirect($download->link);
						}
					} else {
						$this->session->set_flashdata('error', 'Have no access.');
						redirect(base_url('explore'));
					}
				} else if ($item->tipe == 'free') {
					if (preg_match("/mediafire.com/i", $download->link)) {
						$this->load->helper('dom');
						$html = file_get_html($download->link);
						foreach ($html->find('a[id=downloadButton]') as $element)
							redirect($element->href);
					} else {
						redirect($download->link);
					}
				} else {
					$this->session->set_flashdata('error', 'Have no access.');
					redirect(base_url('explore'));
				}
			} else {
				redirect(base_url('404'));
			}
		} else {
			$this->session->set_flashdata('error', 'You are not logged in!');
			redirect(base_url());
		}
	}

	public function owned()
	{
		if (is_login()) {
			$search = $this->input->get('search');
			$perpage = 8;
			$this->load->library('pagination');
			$page = $this->input->get('per_page');
			$config = [
				'allow_get_array' => true,
				'page_query_string' => true,
				'base_url' => base_url("owned"),
				'total_rows' => $this->front->countOwned($search),
				'per_page' => $perpage,
				'use_page_numbers' => false,
				'full_tag_open' => '<ul class="pagination-list">',
				'full_tag_close' => '</ul>',
				'first_link' => false,
				'last_link' => false,
				'first_tag_open' => '<li><div class="pagination-link">',
				'first_tag_close' => '</div></li>',
				'prev_link' => '&laquo',
				'prev_tag_open' => '<li><div class="pagination-link">',
				'prev_tag_close' => '</div></li>',
				'next_link' => '&raquo',
				'next_tag_open' => '<li><div class="pagination-link">',
				'next_tag_close' => '</div></li>',
				'last_tag_open' => '<li class="page-item">',
				'last_tag_close' => '</li>',
				'cur_tag_open' => '<li><a class="pagination-link is-current">',
				'cur_tag_close' => '</a></li>',
				'num_tag_open' => '<li><div class="pagination-link">',
				'num_tag_close' => '</div></li>'
			];
			$this->pagination->initialize($config);
			$data['items'] = $this->front->owned_list($perpage, $page, $search)->result();
			frontEnd_view('users/owned', $data);
		} else {
			$this->session->set_flashdata("error", 'You must login first to access this feature.');
			redirect(base_url('auth/login'));
		}
	}

	public function getdownload_owned()
	{
		$id = $this->input->get('id');
		if ($id) {
			$version =  $this->db->query("SELECT * FROM items_downloads WHERE id_items=$id ORDER BY id DESC")->result();
			$row = $this->db->get_where("items", ['id' => $id]);
			if ($row->num_rows()) {
				$row = $row->row();
				echo '<div style="text-align: center;"><small><p>' . $row->title . '</p></small></div><br>';
				foreach ($version as $v) {
					echo '<a href="' . base_url("download/$v->id") . '" class="button h-button is-info is-rounded is-elevated is-fullwidth m-b-10">
					<span class="icon">
				<i class="fas fa-check"></i>
				</span>
				<span>' . $v->title . '</span>
				</a>';
				}
			} else {
				echo '<div class="content"><blockquote class="is-danger"><p>The item is no longer available.</p></blockquote></div>';
			}
		}
	}
}
