<?php
class rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('rekap_model');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        //role1();
        $bln = $this->input->post('bulan');
        if (!isset($bln)) {
            $bulan    =  date('Y-m');
        } else {
            $bulan = $this->input->post('bulan');
        }

        $data = array(
            'title'             => 'Rekap Absen',
            'bulan'            => $bulan,
            'nama'        => $this->rekap_model->getnama()
        );
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/absen/rekap.php', $data);
        $this->load->view('template/footer.php');
    }
    
    public function print()
    {
        $bulan = $this->input->post('bulan');
        $data = array(
            'title' => 'Cetak Rekap',
            'bulan' => $bulan,
            'nama'        => $this->rekap_model->getnama()
        );
        $this->load->view('pages/print/print_rekap.php', $data);
    }
}