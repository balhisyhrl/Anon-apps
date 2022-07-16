<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Front_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------------

	public function items_list($limit, $start, $tag, $tipe)
	{
		$this->db->select("items.*,users.name,users.avatar,users.username");
		$this->db->from("items");
		$this->db->join('users', 'users.id = items.uploader');
		$this->db->where('items.status', 1);
		if ($tipe != 'none') {
			$this->db->like('items.tipe', $tipe);
		}
		if ($tag != 'none') {
			$this->db->like('items.tags', $tag);
		}
		$this->db->order_by("items.id", 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get();
	}

	public function countItems($tag, $tipe)
	{
		$this->db->select("items.*");
		$this->db->from("items");
		$this->db->join('users', 'users.id = items.uploader');
		$this->db->where('items.status', 1);
		if ($tipe != 'none') {
			$this->db->like('items.tipe', $tipe);
		}
		if ($tag != 'none') {
			$this->db->like('items.tags', $tag);
		}
		return $this->db->get()->num_rows();
	}

	public function items_detail($url)
	{
		$this->db->select("items.*,users.name,users.avatar,users.username");
		$this->db->from("items");
		$this->db->join('users', 'users.id = items.uploader');
		$this->db->where('items.status', 1);
		$this->db->where('items.seo_url', $url);
		return $this->db->get();
	}




	// ------------------------------------------------------------------

	public function owned_list($limit, $start)
	{
		$this->db->select("items.*,items_owned.payment,items_owned.created_at as pembelian");
		$this->db->from("items");
		$this->db->join('items_owned', 'items_owned.id_items = items.id');
		$this->db->where('items_owned.id_users', $this->session->userdata('id_login'));
		$this->db->where('status', 1);
		$this->db->order_by("items.id", 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get();
	}

	public function countOwned()
	{
		$this->db->select("*");
		$this->db->from("items");
		$this->db->join('items_owned', 'items_owned.id_items = items.id');
		$this->db->where('items_owned.id_users', $this->session->userdata('id_login'));
		$this->db->where('status', 1);
		return $this->db->get()->num_rows();
	}



	// ------------------------------------------------------------------



	public function countUsers($by)
	{
		$this->db->select("*");
		$this->db->from("users");
		if ($by != 'users') {
			$this->db->join('users_badge', 'users_badge.id_users = users.id');
			$this->db->where('users_badge.badge', $by);
		}
		$this->db->where('users.status', 'active');
		return $this->db->get()->num_rows();
	}


	public function users_list($limit, $start, $by)
	{
		$this->db->select("*");
		$this->db->from("users");
		if ($by != 'users') {
			$this->db->join('users_badge', 'users_badge.id_users = users.id');
			$this->db->where('users_badge.badge', $by);
		}
		$this->db->where('users.status', 'active');
		$this->db->order_by("users.id", 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get();
	}


	public function activity()
	{
		$this->db->select("items_owned.*,users.name");
		$this->db->from("items_owned");
		$this->db->join('users', 'users.id = items_owned.id_users');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(5);
		return $this->db->get();
	}

	public function invoice_detail($id)
	{
		$this->db->select("tb_transaction.*,items.title");
		$this->db->from("tb_transaction");
		$this->db->join('items', 'items.id = tb_transaction.id_product');
		$this->db->where('tb_transaction.id_users', $this->session->userdata('id_login'));
		$this->db->where('tb_transaction.order_id', $id);
		return $this->db->get();
	}


	public function getapi()
	{
		$this->db->select("api_list.*,api_tag.title as tag");
		$this->db->from("api_list");
		$this->db->join('api_tag', 'api_tag.id = api_list.tag');
		$this->db->where('status', 'active');
		return $this->db->get()->result();
	}
	public function api_detail($id)
	{
		$this->db->select("api_list.*,api_tag.title as tag");
		$this->db->from("api_list");
		$this->db->join('api_tag', 'api_tag.id = api_list.tag');
		$this->db->where('api_list.status', 'active');
		$this->db->where('api_list.id', $id);
		return $this->db->get()->row();
	}
}

/* End of file Front_model.php */
/* Location: ./application/models/Front_model.php */
