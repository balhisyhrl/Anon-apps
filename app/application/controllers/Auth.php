<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    show_404();
  }

  public function login()
  {
    if ($this->input->post()) {
      $username = _POST('username');
      $password = _POST('password');
      $rembemr = _POST('remember');
      $query = $this->db->select("*")->where('username', $username)->or_where("email", $username)->get("users");
      if ($query->num_rows() == 1) {
        $row = $query->row();
        if (password_verify($password, $row->password)) {
          if ($rembemr == 'on') {
            setcookie('appvelix_id', $row->id, time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie('appvelix_token', hash('ripemd160', $row->password), time() + (10 * 365 * 24 * 60 * 60), '/');
          }
          $this->session->set_userdata(array('id_login' => $row->id, 'status_login' => true));
          echo 'berhasil';
        } else {
          echo 'Your password is wrong.';
        }
      } else {
        echo 'Username or email is not registered.';
      }
    } else {
      frontEnd_view('auth/login');
      if (is_login(false)) {
        redirect(base_url(''));
      }
    }
  }

  public function register()
  {
    if ($this->input->post()) {
      $name = _POST('name');
      $email = _POST('email');
      $username = sluggenerate(_POST('username'));
      $password = _POST('password');
      if ($this->db->get_where('users', ['email' => $email])->num_rows() == 0) {
        if ($this->db->get_where('users', ['username' => $username])->num_rows() == 0) {
          $this->db->insert('users', [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'avatar' => 'default.jpg',
            'role' => 'user',
            'status' => 'active',
            'created_at' => date("Y-m-d h:i:sa")
          ]);
          $this->session->set_flashdata('success', 'Successfully Registered, Please login.');
          redirect(base_url("auth/login"));
        } else {
          $this->session->set_flashdata('val_name', $name);
          $this->session->set_flashdata('val_password', $password);
          $this->session->set_flashdata('val_email', $email);
          $this->session->set_flashdata('error', 'The username is already registered in another account.');
          redirect(base_url("auth/register"));
        }
      } else {
        $this->session->set_flashdata('val_username', $username);
        $this->session->set_flashdata('val_name', $name);
        $this->session->set_flashdata('val_password', $password);
        $this->session->set_flashdata('error', 'The email is already registered in another account.');
        redirect(base_url("auth/register"));
      }
    } else {
      frontEnd_view('auth/register');
      if (is_login(false)) {
        redirect(base_url(''));
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $re = $this->session->flashdata('re_url');
    unset($_COOKIE['appvelix_token']);
    unset($_COOKIE['appvelix_id']);
    setcookie('appvelix_token', NULL, -1, '/');
    setcookie('appvelix_id', NULL, -1, '/');
    $this->session->set_flashdata('success', 'Account logged out successfully.');
    if ($re) {
      redirect($re);
    } else {
      redirect(base_url("auth/login"));
    }
  }

  public function verify()
  {
    if (!is_login()) {
      redirect(base_url("auth/login"));
    }
    $data['us'] = $this->db->get_where("users", ['id' => $this->session->userdata('id_login')])->row();
    if ($data['us']->status != 'inactive') {
      redirect(base_url(''));
    }
    if ($this->input->post()) {
      if ($this->session->userdata('session_verify')) {
        if ($this->session->userdata('session_verify') < date('Y-m-d H:i')) {
          $this->kirim_verify($data['us']);
        } else {
          $this->session->set_flashdata('error', 'Mengirim Email Verify Cooldown 5 menit.');
          redirect(base_url("auth/verify"));
        }
      } else {
        $this->kirim_verify($data['us']);
      }
    }
    ajax_loadview("auth_verify", $data);
  }

  public function token()
  {
    $token = $this->uri->segment(2);
    $this->db->query("DELETE FROM users_token WHERE expired < NOW()");
    $query = $this->db->get_where('users_token', ['token' => $token]);
    if ($query->num_rows() == 1) {
      $row = $query->row();
      if ($row->tipe == 'verify') {
        $this->db->query("UPDATE `users` SET `status` = 'active' WHERE `users`.`id` = $row->id_users;");
        $this->db->delete('users_token', ['id' => $row->id]);
        $this->session->set_flashdata('success', 'Akun Berhasil di verifikasi.');
        redirect(base_url("/"));
      } else if ($row->tipe == 'forgot') {
        if ($this->input->post()) {
          $password = $this->input->post('password');
          $this->db->delete('users_token', ['id' => $row->id]);
          $this->db->update('users', ['password' => password_hash($password, PASSWORD_DEFAULT)], ['id' => $row->id_users]);
          $this->session->set_flashdata('success', 'Perubahan password akun anda berhasil.');
          redirect(base_url("auth/login"));
        } else {
          frontEnd_view('auth/update_password');
        }
      }
    } else {
      frontEnd_view('auth/expired');
    }
  }

  public function forgot()
  {
    if (is_login()) {
      redirect(base_url());
    }
    if ($this->input->post()) {
      $tipe = $this->input->post('tipe');
      if ($tipe == 'cari') {
        $usermail = $this->input->post('usermail');
        $cekusers = $this->db->select("*")->where("username", $usermail)->or_where("email", $usermail)->get("users");
        if ($cekusers->num_rows() != 0) {
          $row = $cekusers->row();
          $data['row'] = $row;
          frontEnd_view('auth/forgot', $data);
        } else {
          $this->session->set_flashdata('error', 'Username or email not found.');
          redirect(base_url("auth/forgot"));
        }
      } else if ($tipe == 'kirim') {
        $us = $this->db->get_where("users", ['id' => $this->input->post('id_users')])->row();
        if ($this->session->userdata('session_forgot')) {
          if ($this->session->userdata('session_forgot') < date('Y-m-d H:i')) {
            $this->kirim_forgot($us);
          } else {
            $this->session->set_flashdata('error', 'Sending Email Forgot Cooldown 5 minutes.');
            redirect(base_url("auth/forgot"));
          }
        } else {
          $this->kirim_forgot($us);
        }
      }
    } else {
      frontEnd_view('auth/forgot');
    }
  }

  function kirim_verify($row)
  {
    $minutes_to_add = 5;
    $time = new DateTime(date('Y-m-d H:i'));
    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
    $this->session->set_userdata(array('session_verify' => $time->format('Y-m-d H:i')));
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);
    $this->db->query("INSERT INTO `users_token` (`id`, `id_users`, `token`, `tipe`, `expired`) VALUES (NULL, '$row->id', '$token', 'verify', NOW() + INTERVAL 5 HOUR)");
    $html_mail =  file_get_contents(base_url() . "public/mail_verify.html");
    $msg = str_replace(array('{{NAME}}', '{{TOKEN}}'), array($row->name, base_url("verify/$token")), $html_mail);
    $this->sendEmail('Verify CTF', $msg, $row->email);
    $this->session->set_flashdata('success', 'Successfully sent the verification link in the email ' . $row->email . '.');
    redirect(base_url("verify"));
  }

  function kirim_forgot($row)
  {
    $minutes_to_add = 5;
    $time = new DateTime(date('Y-m-d H:i'));
    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
    $this->session->set_userdata(array('session_forgot' => $time->format('Y-m-d H:i')));
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);
    $this->db->query("INSERT INTO `users_token` (`id`, `id_users`, `token`, `tipe`, `expired`) VALUES (NULL, '$row->id', '$token', 'forgot', NOW() + INTERVAL 5 HOUR)");
    $html_mail =  file_get_contents(base_url() . "public/mail_forgot.html");
    $msg = str_replace(array('{{NAME}}', '{{TOKEN}}'), array($row->name, base_url("forgot/$token")), $html_mail);
    $this->sendEmail('FORGOT APPBAL', $msg, $row->email);
    $this->session->set_flashdata('success', 'Successfully sent the link, forgot your password, check your email at ' . $row->email . '.');
    redirect(base_url("auth/forgot"));
  }

  function sendEmail($title, $msg, $penerima)
  {
    $webmaster = $this->db->get_where("webmaster", ['id' => 1])->row();
    $this->load->library('PHPMailer_load');
    $mail = $this->phpmailer_load->load();
    $mail->isSMTP();
    $mail->Host = trim($webmaster->mail_host);
    $mail->SMTPAuth = true;
    $mail->Username = trim($webmaster->mail_username);
    $mail->Password = trim($webmaster->mail_password);
    $mail->SMTPSecure = trim($webmaster->mail_encryption);
    $mail->Port = trim($webmaster->mail_port);
    $mail->setFrom(trim(explode('|', $webmaster->mail_from)[0]), trim(explode('|', $webmaster->mail_from)[1]));
    $mail->addAddress($penerima, '-');
    $mail->Subject = "$title";
    $mail->msgHtml("$msg");

    if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      //echo "Message sent!";
    } // Kirim email dengan cek kondisi
  }
}
