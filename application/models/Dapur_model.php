<?php
class dapur_model extends CI_Model
{
    public function inputdata($data)
    {
        $this->db->insert('dapur', $data);
    }

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

    public function editdata($data, $id)
    {
        $this->db->where('id_dapur', $id);
        $this->db->set($data);
        $this->db->update('dapur');
    }

    public function hapusdata($id)
    {
        $this->db->where('id_dapur', $id);
        $this->db->delete('dapur');
    }

    public function active($data, $id)
    {
        $this->db->where('id_dapur', $id);
        $this->db->set($data);
        $this->db->update('dapur');
    }
}
