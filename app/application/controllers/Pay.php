<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pay extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->mid = array('server_key' => 'SB-Mid-server-ai2K0M7w8w14D0BKLCT0LqJX', 'production' => false);
    }

    public function index()
    {
        if (is_login(false)) {
            $id_product = $this->uri->segment(2);
            $query = $this->db->get_where('items', ['id' => $id_product]);
            if ($query->num_rows() == 1) {
                if ($this->db->get_where('items_owned', ['id_users' => $this->session->userdata('id_login'), 'id_items' => $id_product])->num_rows() == 0) {
                    // $this->load->library('midtrans');
                    // $this->midtrans->config($this->mid);
                    $data['row'] = $query->row();
                    // frontEnd_view("items/payment", $data);
                    redirect($data['row']->btn_wabuy);
                } else {
                    $this->session->set_flashdata('success', 'You already have this item.');
                    redirect(base_url("library"));
                }
            } else {
                $this->session->set_flashdata('error', 'Products are not available.');
                redirect(base_url('explore'));
            }
        } else {
            $this->session->set_flashdata('error', 'you have to login first.');
            redirect(base_url('auth/login'));
        }
    }

    public function claim_licence()
    {

        if ($this->input->post()) {
            redirect(base_url("licence/") . $this->input->post('licence'));
        } else if ($this->uri->segment(2)) {
            if (is_login()) {
                $license = htmlspecialchars(str_replace("'", "", trim($this->uri->segment(2))));
                $query = $this->db->get_where('items_licence', ['license' => $license]);
                if ($query->num_rows() != 0) {
                    $row = $query->row();
                    if ($this->db->get_where('items_owned', ['id_items' => $row->id_items, 'id_users' => $this->session->userdata('id_login')])->num_rows() == 0) {
                        $this->db->delete('items_licence', ['id' => $row->id]);
                        $this->db->insert('items_owned', [
                            'id_items' => $row->id_items,
                            'id_users' => $this->session->userdata('id_login'),
                            'payment' => 'licence',
                            'created_at' => date("Y-m-d h:i:sa")
                        ]);
                        if ($this->db->get_where('users_badge', ['id_users' => $this->session->userdata('id_login'), 'badge' => 'customer'])->num_rows() == 0) {
                            $this->db->insert('users_badge', [
                                'id_users' => $this->session->userdata('id_login'),
                                'badge' => 'customer',
                                'created_at' => date("Y-m-d h:i:sa")
                            ]);
                        }
                        $this->session->unset_userdata('lcgen');
                        $this->session->set_flashdata("success", 'License successfully obtained.');
                        redirect(base_url("library"));
                    } else {
                        $this->session->set_flashdata("success", 'This item you already have before.');
                        redirect(base_url("library"));
                    }
                } else {
                    $this->session->set_flashdata("error", 'Invalid license.');
                    redirect(base_url('licence'));
                }
            } else {
                $this->session->set_flashdata("error", 'You must login first, if you do not have an account register first.');
                redirect(base_url('licence'));
            }
        } else {
            frontEnd_view('home/licence');
        }
    }

    public function md_licence()
    {
        $lcmd = $this->uri->segment(2);
        $query = $this->db->get_where('items_licence', ['MD5(license)' => $lcmd]);
        if ($query->num_rows() != 0) {
            $row = $query->row();
            $this->session->set_userdata('lcgen', $row->license);
            frontEnd_view('home/licence');
        } else {
            $this->session->set_flashdata("error", 'Invalid license.');
            redirect(base_url('licence'));
        }
    }

    public function midtrans()
    {
        if (is_login()) {
            if ($this->input->post()) {
                $this->load->library('midtrans');
                $this->midtrans->config($this->mid);
                $item = $this->db->get_where('items', ['id' => $this->input->post('id_product')]);
                $users = $this->db->get_where('users', ['id' => $this->session->userdata('id_login')])->row();
                $row = $item->row();
                $transaction_details = array(
                    'order_id' => rand(),
                    'gross_amount' => $row->price, // no decimal allowed for creditcard
                );
                $item1_details = array(
                    'id' => 'BAL-1',
                    'price' => $row->price,
                    'quantity' => 1,
                    'name' => $row->title
                );
                $item_details = array($item1_details);

                // Optional
                // $billing_address = array(
                //     'first_name'    => "Andri",
                //     'last_name'     => "Litani",
                //     'address'       => "Mangga 20",
                //     'city'          => "Jakarta",
                //     'postal_code'   => "16602",
                //     'phone'         => "081122334455",
                //     'country_code'  => 'IDN'
                // );

                // // Optional
                // $shipping_address = array(
                //     'first_name'    => "Obet",
                //     'last_name'     => "Supriadi",
                //     'address'       => "Manggis 90",
                //     'city'          => "Jakarta",
                //     'postal_code'   => "16601",
                //     'phone'         => "08113366345",
                //     'country_code'  => 'IDN'
                // );

                // Optional
                $customer_details = array(
                    'first_name'    => "$users->name",
                    'email'         => "$users->email"
                );

                // Data yang akan dikirim untuk request redirect_url.
                $credit_card['secure'] = true;
                //ser save_card true to enable oneclick or 2click
                //$credit_card['save_card'] = true;

                // $time = time();
                // $custom_expiry = array(
                //     'start_time' => date("Y-m-d H:i:s O", $time),
                //     'unit' => 'minute',
                //     'duration'  => 2
                // );

                $transaction_data = array(
                    'transaction_details' => $transaction_details,
                    'item_details'       => $item_details,
                    'customer_details'   => $customer_details,
                    'credit_card'        => $credit_card,
                    // 'expiry'             => $custom_expiry
                );

                error_log(json_encode($transaction_data));
                $snapToken = $this->midtrans->getSnapToken($transaction_data);
                error_log($snapToken);
                echo $snapToken;
            }
        }
    }


    public function notification()
    {
        $this->load->library('veritrans');
        $this->veritrans->config($this->mid);
        echo 'test notification handler';
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result, 'true');
        $status_code = $result['status_code'];
        $order_id = $result['order_id'];

        $data = [
            'status_code' => $result['status_code'],
            'status_message' => $result['status_message'],
            'settlement_time' => $result['settlement_time'],
            'transaction_status' => $result['transaction_status']
        ];

        if ($status_code == 200) {
            $this->db->update('tb_transaction', $data, ['order_id' => $order_id]);
        } else if ($status_code == 202) {
            $this->db->update('tb_transaction', $data, ['order_id' => $order_id]);
        } else if ($status_code == 201) {
            // todo
        } else {
            $this->db->update('tb_transaction', $data, ['order_id' => $order_id]);
        }
    }

    public function invoice()
    {
        if (is_login()) {
            if ($this->uri->segment(2)) {
                $order_id = $this->uri->segment(2);
                $this->load->model('front_model', 'front');
                $transaction = $this->front->invoice_detail($order_id);
                if ($transaction->num_rows() != 0) {
                    $data['row'] = $transaction->row();
                    frontEnd_view("users/invoice", $data);
                } else {
                    $this->session->set_flashdata('error', 'invoices do not exist.');
                    redirect(base_url('invoice'));
                }
            } else {
            }
        } else {
            $this->session->set_flashdata('error', 'you have to login first.');
            redirect(base_url(''));
        }
    }

    public function finish()
    {
        $this->load->library('midtrans');
        $this->midtrans->config($this->mid);
        $result = json_decode($this->input->post('result_data'), true);
        $type = $result['payment_type'];
        $iproduct = $this->input->post('res_ip');
        if ($this->db->get_where('tb_transaction', ['order_id' => $result['order_id']])->num_rows() == 0) {
            if ($type == 'bank_transfer') {
                $this->bank_transfer($result, $iproduct);
            } else if ($type == 'gopay') {
                $this->gopay($result, $iproduct);
            } else if ($type == 'qris') {
                $this->qris($result, $iproduct);
            } else if ($type == 'cstore') {
                $this->cstore($result, $iproduct);
            }
        }
        redirect(base_url("invoice/" . $result['order_id']));
    }

    public function bank_transfer($result, $iproduct)
    {
        $data = [
            'order_id' => $result['order_id'],
            'id_product' => $iproduct,
            'id_users' => $this->session->userdata('id_login'),
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'bank' => $result['va_numbers'][0]['bank'],
            'va_numbers' => $result['va_numbers'][0]['va_number'],
            'status_message' => $result['status_message'],
            'pdf_url' => $result['pdf_url'],
            'transaction_status' => $result['transaction_status'],
            'status_code' => $result['status_code'],
            'finish_redirect_url' => $result['finish_redirect_url']
        ];
        $save = $this->db->insert('tb_transaction', $data);
    }

    public function gopay($result, $iproduct)
    {
        $data = [
            'order_id' => $result['order_id'],
            'id_product' => $iproduct,
            'id_users' => $this->session->userdata('id_login'),
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'status_message' => $result['status_message'],
            'transaction_status' => $result['transaction_status'],
            'status_code' => $result['status_code'],
            'finish_redirect_url' => $result['finish_redirect_url'],
            // add
            'transaction_id' => $result['transaction_id']
        ];
        $save = $this->db->insert('tb_transaction', $data);
    }

    public function qris($result, $iproduct)
    {
        $data = [
            'order_id' => $result['order_id'],
            'id_product' => $iproduct,
            'id_users' => $this->session->userdata('id_login'),
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'status_message' => $result['status_message'],
            'transaction_status' => $result['transaction_status'],
            'status_code' => $result['status_code'],
            'finish_redirect_url' => $result['finish_redirect_url'],
            'transaction_id' => $result['transaction_id']
        ];
        $save = $this->db->insert('tb_transaction', $data);
    }

    public function cstore($result, $iproduct)
    {
        $data = [
            'order_id' => $result['order_id'],
            'id_product' => $iproduct,
            'id_users' => $this->session->userdata('id_login'),
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'status_message' => $result['status_message'],
            'pdf_url' => $result['pdf_url'],
            'transaction_status' => $result['transaction_status'],
            'status_code' => $result['status_code'],
            'finish_redirect_url' => $result['finish_redirect_url'],
            'payment_code' => $result['payment_code']
        ];
        $save = $this->db->insert('tb_transaction', $data);
    }
}
