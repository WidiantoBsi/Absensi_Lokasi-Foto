<?php

class Dashboard_model extends CI_Model
{
    public function cekabsen()
    {
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('tgl', date("Y-m-d"));
        return $this->db->get('absen')->row();
    }

    public function dataabsen()
    {
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('tgl', date("Y-m-d"));
        return $this->db->get('absen')->result();
    }

    public function absen($data)
    {
        $this->db->insert('absen', $data);
    }
    
    public function nama()
    {
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get('users')->row();
    }

    public function dapur()
    {
        $this->db->order_by('id_dapur', 'ASC');
        return $this->db->get('dapur')->result();
    }
    
    public function cekizin()
    {
        $this->db->where('status_izin', 'Pending');
        return $this->db->get('izin');
    }
    
    public function rank($bulan)
    {
        $this->db->select('count(status) as tot, absen.id_user, nama, nama_dapur');
        $this->db->where('status', 1);
        $this->db->group_by('absen.id_user'); 
        $this->db->join('users', 'users.id_user=absen.id_user');
        $this->db->join('dapur', 'dapur.id_dapur=users.id_dapur');
        $this->db->where("DATE_FORMAT(tgl,'%Y-%m') = '".$bulan."'");
        $this->db->where("role_id", 2);
        $this->db->order_by('tot', 'DESC');
        return $this->db->get('absen')->result();
    }
}
