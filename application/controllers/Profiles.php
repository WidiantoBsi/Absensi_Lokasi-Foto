<?php
class Profiles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('User_model');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Profies | ' . $this->session->userdata('nama'),
            'us'        => $this->User_model->getUs()
        );
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/users/profiles.php', $data);
        $this->load->view('template/footer.php');
    }
}
