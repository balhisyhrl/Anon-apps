<?php

function is_owned($id, $idu = 'kosong')
{
	$ci = &get_instance();
	if (is_login(false)) {
		if ($idu == 'kosong') {
			$id_users = $ci->session->userdata('id_login');
		} else {
			$id_users = $idu;
		}
		$query = $ci->db->get_where('items_owned', [
			'id_items' => $id,
			'id_users' => $id_users
		]);
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}

function is_member($id_users = '')
{
	$ci = &get_instance();
	if (is_login(false)) {
		if ($id_users == '') {
			$id_users = $ci->session->userdata('id_login');
		}
		$query = $ci->db->get_where('users_badge', ['badge' => 'member', 'id_users' => $id_users]);
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}
