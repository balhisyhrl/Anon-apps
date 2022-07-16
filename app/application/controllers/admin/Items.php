<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Items extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!is_admin()) {
			$this->session->set_flashdata("error", "Hanya untuk role admin");
			redirect(base_url());
		}
		$this->load->model("admin_model", 'admin');
	}

	public function index()
	{
		$result = $this->db->select("*")->from('items')->order_by('id', 'DESC')->get()->result();
		$data = [
			'title' => 'ITEMS LIST',
			'result' => $result
		];
		backEnd_view("items/list", $data);
	}

	public function create()
	{
		if ($this->input->post()) {
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$docs = $this->input->post('docs');
			$status = $this->input->post('status');
			$tipe = $this->input->post('tipe');
			$btn_wabuy = $this->input->post('btn_wabuy');
			$btn_detail = $this->input->post('btn_detail');
			$tag = $this->input->post('tag');
			$price = $this->input->post('price');
			$temp = '';
			foreach ($tag as $c) {
				if ($temp == '') {
					$temp = $c;
				} else {
					$temp = "$temp,$c";
				}
			}
			$tag = $temp;
			$img = uploadimg([
				'path' => 'thumbnails',
				'name' => 'thumb',
				'compress' => true,
				'height' => 245,
				'width' => 409
			]);
			if ($img['result'] == 'success') {
				$gambar = $img['nama_file'];
			} else {
				$gambar = 'default.jpg';
			}
			$this->db->insert('items', [
				'title' => $title,
				'thumbnail' => $gambar,
				'description' => $description,
				'docs' => $docs,
				'tags' => $tag,
				'tipe' => $tipe,
				'btn_detail' => $btn_detail,
				'btn_wabuy' => $btn_wabuy,
				'status' => $status,
				'price' => $price,
				'uploader' => $this->session->userdata('id_login'),
				'seo_url' => sluggenerate($title),
				'seo_description' => strip_tags(word_limiter($description, 160)),
				'seo_keywords' => '',
				'created_at' => date("Y-m-d h:i:sa"),
				'updated_at' => date("Y-m-d h:i:sa")
			]);
			$this->session->set_flashdata('success', 'Successfully added a new items.');
			$pan = $this->db->get_where('items', ['seo_url' => sluggenerate($title)])->row();
			redirect(base_url('admin/items/edit/' . $pan->id));
		} else {
			$data = [
				'title' => 'Items Create',
				'tag' => $this->db->get('items_tags')->result()
			];
			backEnd_view("items/create", $data);
		}
	}

	public function edit()
	{
		$id_items = _getSlug(4);
		if ($this->input->post()) {
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$docs = $this->input->post('docs');
			$status = $this->input->post('status');
			$tipe = $this->input->post('tipe');
			$btn_wabuy = $this->input->post('btn_wabuy');
			$btn_detail = $this->input->post('btn_detail');
			$tag = $this->input->post('tag');
			$price = $this->input->post('price');
			$temp = '';
			foreach ($tag as $c) {
				if ($temp == '') {
					$temp = $c;
				} else {
					$temp = "$temp,$c";
				}
			}
			$tag = $temp;
			$img = uploadimg([
				'path' => 'thumbnails',
				'name' => 'thumb',
				'compress' => true,
				'height' => 245,
				'width' => 409
			]);
			if ($img['result'] == 'success') {
				$gambar = $img['nama_file'];
			} else {
				$gambar = $this->input->post('old_thumb');;
			}
			$this->db->update('items', [
				'title' => $title,
				'thumbnail' => $gambar,
				'description' => $description,
				'docs' => $docs,
				'tags' => $tag,
				'tipe' => $tipe,
				'price' => $price,
				'btn_detail' => $btn_detail,
				'btn_wabuy' => $btn_wabuy,
				'status' => $status,
				'uploader' => $this->session->userdata('id_login'),
				'seo_url' => $this->input->post('seo_slug'),
				'seo_description' => $this->input->post('seo_description'),
				'seo_keywords' => $this->input->post('seo_keywords'),
				'updated_at' => date("Y-m-d h:i:sa")
			], ['id' => $id_items]);
			if ($this->input->post('save') == 'saves') {
				$this->session->set_flashdata('success', 'Successfully update items.');
				redirect(base_url('admin/items/edit/' . $id_items));
			} else {
				$this->session->set_flashdata('success', 'Successfully update items.');
				redirect(base_url('admin/items'));
			}
		} else {
			$data = [
				'title' => 'Items Edit',
				'row' => $this->db->get_where('items', ['id' => $id_items])->row(),
				'tag' => $this->db->get('items_tags')->result()
			];
			backEnd_view("items/edit", $data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$this->db->delete('items', ['id' => $id]);
		$this->session->set_flashdata("success", "Successfully delete items.");
		redirect(base_url("admin/items"));
	}

	public function cate_index()
	{
		if ($this->input->post()) {
			$this->db->insert('items_tags', [
				'title' => $this->input->post('title'),
				'slug' => sluggenerate($this->input->post('title')),
				'created_at' => date("Y-m-d h:i:sa")
			]);
			$this->session->set_flashdata("success", "Successfully add tag.");
			redirect(base_url("admin/tags"));
		} else {
			$data = [
				'title' => 'Tags List',
				'row' => $this->db->get_where('items_tags')->result()
			];
			backEnd_view("items/category_list", $data);
		}
	}

	public function cate_edit()
	{
		if ($this->input->post()) {
			$this->db->update('items_tags', [
				'title' => $this->input->post('title'),
				'slug' => sluggenerate($this->input->post('slug')),
				'created_at' => date("Y-m-d h:i:sa")
			], ['id' => $this->input->post('id')]);
			$this->session->set_flashdata("success", "Successfully update tag.");
			redirect(base_url("admin/tags"));
		} else {
			$id = _getSlug(4);
			$row = $this->db->get_where('items_tags', ['id' => $id])->row();
			echo '<input type="hidden" name="id" value="' . $row->id . '">
			<div class="mb-1">
				<label for="exampleFormControlInput1" class="form-label">Title Category</label>
				<input type="text" name="title" class="form-control" value="' . $row->title . '" placeholder="Title" required>
			</div>
			<div class="mb-1">
				<label for="exampleFormControlInput1" class="form-label">SEO Slug</label>
				<input type="text" name="slug" class="form-control" value="' . $row->slug . '" placeholder="Slug" required>
			</div>';
		}
	}

	public function cate_delete()
	{
		$id = _getSlug(4);
		$this->db->delete('items_tags', ['id' => $id]);
		$this->session->set_flashdata("success", "Successfully delete tag.");
		redirect(base_url("admin/tags"));
	}

	public function version_index()
	{
		$id_items = _getSlug(4);
		if ($this->input->post()) {
			$this->db->insert('items_downloads', [
				'id_items' => $this->input->post('id_items'),
				'title' => $this->input->post('title'),
				'version' => $this->input->post('version'),
				'link' => $this->input->post('link'),
				'created_at' => date("Y-m-d h:i:sa")
			]);
			$this->session->set_flashdata("success", "Successfully add version.");
			redirect(base_url("admin/items/vers/$id_items"));
		} else {
			$data = [
				'title' => 'Downloads Link',
				'row' => $this->db->get_where('items_downloads', ['id_items' => $id_items])->result(),
				'id_items' => $id_items
			];
			backEnd_view("items/vers_list", $data);
		}
	}

	public function version_edit()
	{
		if ($this->input->post()) {
			$this->db->update('items_downloads', [
				'title' => $this->input->post('title'),
				'version' => $this->input->post('version'),
				'link' => $this->input->post('link'),
				'created_at' => date("Y-m-d h:i:sa")
			], ['id' => $this->input->post('id')]);
			$this->session->set_flashdata("success", "Successfully add version.");
			redirect(base_url("admin/items/vers/" . $this->input->post('id_items')));
		} else {
			$id = _getSlug(5);
			$row = $this->db->get_where('items_downloads', ['id' => $id])->row();
			echo '<input type="hidden" name="id_items" value="' . $row->id_items . '"><input type="hidden" name="id" value="' . $row->id . '">
			<div class="mb-1">
			<label for="exampleFormControlInput1" class="form-label">Title</label>
			<input type="text" name="title" class="form-control" value="' . $row->title . '" placeholder="Title" required>
		</div>
		<div class="mb-1">
		<label for="exampleFormControlInput1" class="form-label">Version</label>
		<input type="text" name="version" class="form-control" placeholder="Ex: 1.5" value="' . $row->version . '" required>
	</div>
		<div class="mb-1">
			<label for="exampleFormControlInput1" class="form-label">Link</label>
			<textarea class="form-control" name="link" placeholder="Link"  rows="2" required>' . $row->link . '</textarea>
			<small>recommend using mediafire.</small>
		</div>';
		}
	}

	public function version_delete()
	{
		$id = _getSlug(6);
		$this->db->delete('items_downloads', ['id' => $id]);
		$this->session->set_flashdata("success", "Successfully delete version.");
		redirect(base_url("admin/items/vers/" . _getSlug(4)));
	}

	public function license_index()
	{
		if ($this->input->post()) {
			$this->db->insert('items_licence', [
				'id_items' => $this->input->post('id_items'),
				'license' => $this->input->post('license'),
				'created_at' => date("Y-m-d h:i:sa")
			]);
			$this->session->set_flashdata("success", "Successfully add license.");
			redirect(base_url("admin/license"));
		} else {
			$data = [
				'title' => 'License Item',
				'row' => $this->admin->getLicense()->result(),
				'getitems' => $this->db->get_where('items', ['tipe' => 'forsale'])->result()
			];
			backEnd_view("items/license_list", $data);
		}
	}

	public function license_generate()
	{
		echo generate_license('BAL');
	}

	public function license_delete()
	{
		$id = _getSlug(4);
		$this->db->delete('items_license', ['id' => $id]);
		$this->session->set_flashdata("success", "Successfully delete license.");
		redirect(base_url("admin/license"));
	}
}
