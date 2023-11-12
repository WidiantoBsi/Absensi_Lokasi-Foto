<?php
class dapur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        role1();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('dapur_model');
        $this->load->library('form_validation');
    }


    public function index()
    {

        $data = array(
            'title'     => 'Data dapur',
            'dapur'   => $this->dapur_model->getdapur()
        );


        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/dapur.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_dapur', 'Nama dapur', 'required');
        $this->form_validation->set_rules('alamat_dapur', 'Alamat', 'required');
        $this->form_validation->set_rules('is_active_dapur', 'Status Aktif', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nama = $this->input->post('nama_dapur');
            $alamat = $this->input->post('alamat_dapur');
            $is_active = $this->input->post('is_active_dapur');

            $data = array(
                'nama_dapur'          => $nama,
                'alamat_dapur'        => $alamat,
                'is_active_dapur'     => $is_active,
                'tgl_input'             => date("Y-m-d H:i:s")
            );
            $this->dapur_model->inputdata($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan !</div>');
            redirect(base_url('dapur'), 'refresh');
        }
    }

    public function edit($id)
    {
        $nama = $this->input->post('nama_dapur');
        $alamat = $this->input->post('alamat_dapur');

        $data = array(
                'nama_dapur'          => $nama,
                'alamat_dapur'        => $alamat,
                'tgl_input'             => date("Y-m-d H:i:s")
            );
        $this->dapur_model->editdata($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di edit !</div>');
        redirect(base_url('dapur'), 'refresh');
    }

    public function hapus($id)
    {
        $this->dapur_model->hapusdata($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus !</div>');
        redirect(base_url('dapur'), 'refresh');
    }

    public function aktif($id)
    {
        $s = $this->input->get('aktif');
        $data = array(
            'is_active_dapur'    => $s
        );
        $this->dapur_model->active($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di edit !</div>');
        redirect(base_url('dapur'), 'refresh');
    }
}
