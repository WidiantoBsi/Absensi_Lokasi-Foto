<?php
class riwayat_model extends CI_Model
{
    public function getdapur()
    {
        $this->db->order_by('dapur.id_dapur', 'DESC');
        return $this->db->get('dapur')->result();
    }

    public function getuser()
    {
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get('users')->result();
    }

    public function getabsen($tgll)
    {
        if ($this->session->userdata('role_id') == 2) {
            $this->db->where('absen.id_user', $this->session->userdata('id_user'));
        }
        $this->db->where('absen.tgl', $tgll);
        $this->db->order_by('id_absen', 'DESC');
        $this->db->join('users', 'users.id_user=absen.id_user');
        $this->db->join('dapur', 'dapur.id_dapur=users.id_dapur');
        return $this->db->get('absen')->result();
    }

    public function getabsen2($tgll)
    {
        $this->db->where('absen.tgl', $tgll);
        $this->db->order_by('id_absen', 'DESC');
        $this->db->join('users', 'users.id_user=absen.id_user');
        $this->db->join('dapur', 'dapur.id_dapur=users.id_dapur');
        return $this->db->get('absen')->result();
    }

    public function hapusdata($id)
    {
        $this->db->where('id_absen', $id);
        $this->db->delete('absen');
    }
}