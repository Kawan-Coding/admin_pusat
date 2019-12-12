<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    protected $date;
    protected $tabel = 'Users';
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('M_user');
        $this->date = new DateTime();
        // $this->load->library('Msg');
        //==== ALLOWING CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
    }
    public function msg($name, $status, $data, $custom_msg = '')
    {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($this->msg->get($name, $status, $data, $custom_msg), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }

    function is_valid()
    {
        if (isset($_POST) && count($_POST) <= 0) {
            $this->msg('', '400', '', 'tidak ada masukan');
        }
    }

    function Login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->M_user->is_valid($username,$password)) {
            echo "valid";
        }else{
            echo "false";
            
        }
    }
}
