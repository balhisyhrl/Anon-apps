<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!is_admin()) {
			$this->session->set_flashdata("error", "Hanya untuk role admin");
			redirect(base_url());
		}
		$this->load->model('stats_model', 'stats');
	}

	public function index()
	{
		$data = [
			'title' => 'Home Admin',
			'count_client' => $this->db->get_where('users_badge', ['badge' => 'client'])->num_rows(),
			'count_member' => $this->db->get_where('users_badge', ['badge' => 'member'])->num_rows(),
			'count_customer' => $this->db->get_where('users_badge', ['badge' => 'customer'])->num_rows(),
			'getitems' => $this->db->get_where('items', ['tipe' => 'forsale'])->result()
		];
		backEnd_view('home', $data);
	}

	public function icons()
	{

		$data = [
			'title' => 'Icons'
		];
		backEnd_view('icons', $data);
	}
}


/* End of file Admin/Home.php */
/* Location: ./application/controllers/Admin/Home.php */
