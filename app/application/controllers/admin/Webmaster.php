<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webmaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!is_admin()) {
			$this->session->set_flashdata("error", "Hanya untuk role admin");
			redirect(base_url());
		}
	}

	public function index()
	{
		if ($this->input->post()) {
			$this->db->update('webmaster', [
				'script_head' => $this->input->post('ahead'),
				'script_body' => $this->input->post('abody'),
				'mail_driver' => $this->input->post('mail_driver'),
				'mail_host' => $this->input->post('mail_host'),
				'mail_port' => $this->input->post('mail_port'),
				'mail_username' => $this->input->post('mail_username'),
				'mail_password' => $this->input->post('mail_password'),
				'mail_encryption' => $this->input->post('mail_encryption'),
				'mail_from' => $this->input->post('mail_from'),
				'plugin_comment' => '',
				'src_comment' => ''
			], ['id' => 1]);
			$this->session->set_flashdata('success', 'Successfully updated webmaster.');
			redirect(base_url("admin/webmaster"));
		} else {
			$data = [
				'title' => 'General Webmaster',
				'row' => $this->db->get_where('webmaster', ['id' => 1])->row()
			];
			backEnd_view('webmaster/general', $data);
		}
	}
}


/* End of file Admin/Webmaster.php */
/* Location: ./application/controllers/Admin/Webmaster.php */
