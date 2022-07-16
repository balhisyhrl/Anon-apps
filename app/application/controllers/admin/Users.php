<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!is_admin()) {
			$this->session->set_flashdata("error", "Hanya untuk role admin");
			redirect(base_url());
		}
		$this->load->model("admin_model", "admin");
	}

	public function index()
	{
		$data = [
			'title' => 'Users Manager',
			'users' => $this->db->get('users')->result()
		];
		backEnd_view('users/users_list', $data);
	}

	public function users_edit()
	{
		$id = $this->uri->segment(4);
		if ($this->input->post()) {
			$row = $this->db->get_where('users', ['id' => $id])->row();
			$name = $this->input->post('name');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role = $this->input->post('role');
			$bio = $this->input->post('bio');
			$status = $this->input->post('status');
			if ($password == null) {
				$password = $row->password;
			} else {
				$password = password_hash($password, PASSWORD_DEFAULT);
			}
			$img = uploadimg([
				'path' => 'avatar',
				'name' => 'avatar',
				'compress' => false
			]);
			if ($img['result'] == 'success') {
				$gambar = $img['nama_file'];
			} else {
				$gambar = $row->avatar;
			}
			$this->db->update('users', [
				'name' => $name,
				'email' => $email,
				'password' => $password,
				'username' => $username,
				'bio' => $bio,
				'status' => $status,
				'avatar' => $gambar,
				'role' => $role
			], ['id' => $id]);
			$this->session->set_flashdata('success', 'Successfully updated users.');
			redirect(base_url('admin/users'));
		} else {
			$data = [
				'title' => 'Users Edit',
				'row' => $this->db->get_where('users', ['id' => $id])->row()
			];
			backEnd_view('users/users_edit', $data);
		}
	}

	public function users_delete()
	{
		$id = $this->uri->segment(4);
		if ($id) {
			$this->db->delete('users', [
				'id' => $id
			]);
			$this->session->set_flashdata('success', 'Successfully delete users.');
			redirect(base_url('admin/users'));
		}
	}

	public function owned_list()
	{
		$id_users = _getSlug(3);
		$user = $this->db->get_where('users', ['id' => $id_users])->row();
		$data = [
			'title' => 'Owned For ' . $user->name,
			'owned' => $this->admin->getOwned($id_users)->result(),
			'id_users' => $id_users
		];
		backEnd_view('users/owned_list', $data);
	}

	public function owned_delete()
	{
		$id_users = _getSlug(3);
		$id_owned = _getSlug(6);
		if ($id_owned) {
			$this->db->delete('items_owned', [
				'id' => $id_owned
			]);
			$this->session->set_flashdata('success', 'Successfully delete owned.');
			redirect(base_url("admin/users/$id_users/owned"));
		}
	}

	public function badge_list()
	{
		$id_users = _getSlug(3);
		if ($this->input->post()) {
			$this->db->insert('users_badge', [
				'id_users' => $id_users,
				'badge' => $this->input->post('badge'),
				'created_at' => date("Y-m-d h:i:sa")
			]);
			$this->session->set_flashdata('success', 'Successfully add badge.');
			redirect(base_url("admin/users/$id_users/badge"));
		} else {
			$user = $this->db->get_where('users', ['id' => $id_users])->row();
			$data = [
				'title' => 'Badge For ' . $user->name,
				'row' => $this->admin->getBadge($id_users)->result(),
				'id_users' => $id_users
			];
			backEnd_view('users/badge_list', $data);
		}
	}

	public function badge_delete()
	{
		$id_users = _getSlug(3);
		$id_badge = _getSlug(6);
		if ($id_badge) {
			$this->db->delete('users_badge', [
				'id' => $id_badge
			]);
			$this->session->set_flashdata('success', 'Successfully delete badge.');
			redirect(base_url("admin/users/$id_users/badge"));
		}
	}
}
