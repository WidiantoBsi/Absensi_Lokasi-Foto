<?php
class riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('riwayat_model');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $tglll = $this->input->post('tanggal');
        if (!isset($tglll)) {
            $tgll    =  date('Y-m-d');
        } else {
            $tgll = $this->input->post('tanggal');
        }

        $this->session->set_userdata('tglll', $tgll);

        $data = array(
            'title'             => 'Riwayat Absen',
            'dapur'            => $this->riwayat_model->getdapur(),
            'user'            => $this->riwayat_model->getuser(),
            'tgl'            => $tgll,
            'riwayat'        => $this->riwayat_model->getabsen($tgll)
        );
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/absen/riwayat.php', $data);
        $this->load->view('template/footer.php');
    }

    public function index2()
    {
        $tgll = $this->session->userdata('tglll');

        $data = array(
            'title'             => 'Riwayat Absen',
            'dapur'            => $this->riwayat_model->getdapur(),
            'user'            => $this->riwayat_model->getuser(),
            'tgl'            => $tgll,
            'riwayat'        => $this->riwayat_model->getabsen($tgll)
        );
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/absen/riwayat.php', $data);
        $this->load->view('template/footer.php');
    }
    

    public function hapus($id)
    {
        $this->riwayat_model->hapusdata($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus !</div>');
        redirect(base_url('riwayat-'), 'refresh');
    }
}
