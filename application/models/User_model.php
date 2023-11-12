<?php
class User_model extends CI_Model
{
    public function inputuser($data)
    {
        $this->db->insert('users', $data);
    }

    public function getUser()
    {
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get('users')->result();
    }
    
    public function cekuser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('users')->result();
    }

    public function getdapur()
    {
        $this->db->order_by('nama_dapur', 'ASC');
        return $this->db->get('dapur')->result();
    }

    public function updateuser($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->set($data);
        $this->db->update('users');
    }

    public function hapus($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
    }

    public function pass($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->set($data);
        $this->db->update('users');
    }

    public function passuser($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->set($data);
        $this->db->update('users');
    }

    public function profileupdate($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->set($data);
        $this->db->update('users');
    }

    public function active($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->set($data);
        $this->db->update('users');
    }

    //get sesisin
    public function cekdata()
    {
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get('users')->row();
    }

    public function getUs()
    {
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get('users')->result();
    }
}
