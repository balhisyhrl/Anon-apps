<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('front_model', 'front');
  }

  public function index()
  {
    $this->load->library('pagination');
    $slug = _getSlug(1);
    $page = $this->input->get('per_page');
    $config = [
      'allow_get_array' => true,
      'page_query_string' => true,
      'base_url' => base_url($slug),
      'total_rows' => $this->front->countUsers($slug),
      'per_page' => 12,
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
    $data['users'] = $this->front->users_list(12, $page, $slug)->result();
    $data['title'] = $slug;
    frontEnd_view('users/index', $data);
  }

  public function settings()
  {
    if (is_login(false)) {
      if ($this->input->post()) {
        $this->db->update("users", [
          'name' => preg_replace("/[^a-zA-Z]/", "", _POST('name')),
          'bio' => _POST('bio')
        ], ['id' => $this->session->userdata('id_login')]);
        $this->session->set_flashdata('success', 'Successfully updated account.');
        redirect(base_url("users/settings"));
      } else {
        $data['row'] = $this->db->select("users.*")->where(['id' => $this->session->userdata('id_login')])->get("users")->row();
        $data['galleryavatar'] = array_diff(scandir("./public/storage/avatar/default/"), array('.', '..'));
        frontEnd_view("users/settings", $data);
      }
    } else {
      redirect(base_url());
    }
  }

  public function change_password()
  {
    if (is_login(false)) {
      if ($this->input->post()) {
        $old_password = $this->input->post('old_password');
        $new_password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
        $row = $this->db->get_where('users', ['id' => $this->session->userdata('id_login')])->row();
        if (password_verify($old_password, $row->password)) {
          $this->db->update('users', ['password' => $new_password], ['id' => $this->session->userdata('id_login')]);
          setcookie('BAL_id', $row->id, time() + (10 * 365 * 24 * 60 * 60), '/');
          setcookie('BAL_token', hash('ripemd160', $new_password), time() + (10 * 365 * 24 * 60 * 60), '/');
          $this->session->set_flashdata('success', 'Successfully updated password.');
          echo 'berhasil';
        } else {
          echo 'Password wrong!';
        }
      } else {
        echo 'What do you want to do';
      }
    } else {
      echo 'Your session is lost.';
    }
  }

  public function change_username()
  {
    if (is_login(false)) {
      if ($this->input->post()) {
        $new_username = sluggenerate($this->input->post('new_username'));
        if ($this->db->get_where('users', ['username' => $new_username])->num_rows() == 0) {
          $this->db->update('users', ['username' => $new_username], ['id' => $this->session->userdata('id_login')]);
          $this->session->set_flashdata('success', 'Successfully updated username.');
          echo 'berhasil';
        } else {
          echo 'Username is already used by another account';
        }
      } else {
        echo 'Why are you stupid';
      }
    } else {
      echo 'Your Session Lost';
    }
  }

  public function change_email()
  {
    if (is_login(false)) {
      if ($this->input->post()) {
        $new_email = $this->input->post('new_email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['id' => $this->session->userdata('id_login')])->row();
        if (password_verify($password, $user->password)) {
          if ($this->db->get_where('users', ['email' => $new_email])->num_rows() == 0) {
            $this->db->update('users', ['email' => $new_email], ['id' => $this->session->userdata('id_login')]);
            $this->session->set_flashdata('success', 'Successfully updated Email.');
            echo 'berhasil';
          } else {
            echo 'Email already used by another account';
          }
        } else {
          echo 'Password wrong!';
        }
      } else {
        echo 'Why are you stupid';
      }
    } else {
      echo 'Your Session Lost';
    }
  }

  public function change_avatar()
  {
    if (is_login(false)) {
      if ($this->input->post()) {
        $avatar = htmlspecialchars($this->input->post('avatar'));
        $this->db->update('users', ['avatar' => $avatar], ['id' => $this->session->userdata('id_login')]);
        $this->session->set_flashdata('success', 'Berhasil update Avatar.');
        echo 'berhasil';
      } else {
        echo 'Why gblk';
      }
    } else {
      echo 'Your session is lost.';
    }
  }

  public function upload_avatar()
  {
    if (is_login(false)) {
      if ($this->input->post('image')) {
        $data = $_POST["image"];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $filename = uniqid(rand(), true) . '.jpg';
        $this->db->update('users', ['avatar' => $filename], ['id' => $this->session->userdata('id_login')]);
        $imageName = "./public/storage/avatar/$filename";
        file_put_contents($imageName, $data);
        echo $this->input->post('image');
      } else {
        echo 'kesalahan';
      }
    } else {
      echo 'notlogin';
    }
  }

  public function get_users()
  {
    $username = $this->uri->segment(2);
    $query = $this->db->select("users.*")->where(['username' => $username])->get("users");
    if ($query->num_rows() != 0) {
      $row = $query->row();
      $data['row'] = $row;
      $data['owned'] = $this->db->get_where('items_owned', ['id_users' => $row->id])->num_rows();
      if (is_login(false)) {
        if ($row->id == $this->session->userdata('id_login')) {
          if ($this->input->get('m')) {
            frontEnd_view('users/users_detail', $data);
          } else {
            frontEnd_view('users/users_view', $data);
          }
        } else {
          frontEnd_view('users/users_detail', $data);
        }
      } else {
        frontEnd_view('users/users_detail', $data);
      }
    } else {
      echo 'Users not found';
    }
  }
}
