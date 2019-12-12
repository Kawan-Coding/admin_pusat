<?php

class M_user extends CI_Model
{
    //referense https://codeigniter.com/user_guide/general/models.html
    protected $tb_users = 'users';
    protected $cashflow = 'cash_flow';
    protected $date;
    public function __construct()
    {
        $this->date = new DateTime();
    }
    public function get($key = null, $value = null)
    {
        if ($key != null) {
            $query = $this->db->get_where($this->tb_users, array($key => $value));
            return $query->row();
        }

        $query = $this->db->get($this->tb_users);
        return $query->result();
    }
    public function is_valid($username, $password)
    {
        $this->db->select('');
        $count = $this->db->get_where($this->tb_users, array('username' => $username))->row_array();
        //mendapatkan password dari username diatas
        if (isset($count['id'])) {
            $hash = $this->get('username', $username)->password;
            if (password_verify($password, $hash)) {
                return true;
            } else {
                return  false;
            }
        } else {
            return false;
        }
    }
}
