<?php
class izin_model extends CI_Model
{
    public function getdapur()
    {
        $this->db->order_by('dapur.id_dapur', 'DESC');
        return $this->db->get('dapur')->result();
    }

    public function getizin()
    {
        if ($this->session->userdata('role_id') == 2) {
            $this->db->where('izin.id_user', $this->session->userdata('id_user'));
        }
        $this->db->order_by('id_izin', 'DESC');
        $this->db->join('users', 'users.id_user=izin.id_user');
        $this->db->join('dapur', 'dapur.id_dapur=users.id_dapur');
        return $this->db->get('izin')->result();
    }
    
    public function tambahizin($data)
    {
        $this->db->insert('izin', $data);
    }
    
    public function status($data, $id)
    {
        $this->db->where('id_izin', $id);
        $this->db->set($data);
        $this->db->update('izin');
    }
    
    public function tambahabsen($id_user, $awal, $akhir, $bukti)
    {
        $date = date($awal);
        $end = date($akhir);
        for ($x = 0; $x < 5; $x++) {
            if ($date > $end) {
              break;
            }
            $sql="INSERT INTO `absen`(`id_user`, `foto`, `lat`, `lon`, `map`, `jam`, `tgl`, `status`) VALUES ('$id_user','$bukti','-','-','https://www.google.co.id/maps','00:00:00','$date','2')";    
            $this->db->query($sql);
            $date = date("Y-m-d", strtotime($date. ' + 1 days'));
          }
    }
}