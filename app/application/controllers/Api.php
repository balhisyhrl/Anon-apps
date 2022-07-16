<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front_model', 'front');
		$this->api_key = 'BAL-APIKEY2022';
	}

	public function index()
	{
		$data['title'] = '';
		$data['tag'] = $this->db->get_where('api_tag')->result();
		$data['listapi'] = $this->front->getapi('api_list');
		frontEnd_view('api/home', $data);
	}

	public function detail()
	{
		$data['title'] = '';
		$data['tag'] = $this->db->get_where('api_tag')->result();
		$data['row'] = $this->front->api_detail($this->uri->segment(2));
		frontEnd_view('api/detail', $data);
	}

	public function list_item()
	{
		header('Content-Type: application/json');
		$response = array();
		if ($this->input->get('apikey') == $this->api_key) {
			$query = $this->db->select("title,id,status")->from('items')->where('status', 1)->order_by('id', 'DESC')->get()->result();
			$response['status'] = 1;
			$response['message'] = 'Successfully retrieved item data.';
			foreach ($query as $row) {
				$push['id_items'] = (int)$row->id;
				$push['title'] = $row->title;
				$response['data'][] = $push;
			}
			echo json_encode($response);
		} else {
			$response['status'] = 0;
			$response['message'] = 'Apikey is invalid.';
			echo json_encode($response);
		}
	}

	public function generate_licence()
	{
		header('Content-Type: application/json');
		$response = array();
		if ($this->input->get('apikey') == $this->api_key) {
			if ($this->input->get('iditems')) {
				$licence = generate_license('BAL');
				$this->db->insert('items_licence', [
					'id_items' => $this->input->get('iditems'),
					'license' => $licence,
					'created_at' => date("Y-m-d h:i:sa")
				]);
				$response['status'] = 1;
				$response['message'] = 'License created successfully.';
				$response['licence'] = $licence;
				$response['url'] = base_url('c/' . md5($licence));
				echo json_encode($response);
			} else {
				$response['status'] = 0;
				$response['message'] = 'The iditems parameter does not exist.';
				echo json_encode($response);
			}
		} else {
			$response['status'] = 0;
			$response['message'] = 'Apikey is invalid.';
			echo json_encode($response);
		}
	}
}
