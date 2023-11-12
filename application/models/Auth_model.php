<?php
class Auth_model extends CI_Model
{
    public function cekdataLogin($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('users')->row();
    }

    public function session($username)
    {
        $this->db->where('username', $username);
        $this->db->join('dapur', 'dapur.id_dapur=users.id_dapur');
        return $this->db->get('users')->row();
    }
}
