<?php
class rekap_model extends CI_Model
{
    public function getnama()
    {
        $this->db->where("role_id", 2);
        $this->db->order_by('users.id_dapur', 'DESC');
        $this->db->order_by('nama', 'ASC');
        $this->db->join('dapur', 'dapur.id_dapur=users.id_dapur');
        return $this->db->get('users')->result();
    }
}