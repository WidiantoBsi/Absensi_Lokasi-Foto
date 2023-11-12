<?php
class tutor extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		cek_login();
        date_default_timezone_set("Asia/Jakarta");
	}
	
	public function index()
	{
		$data = array(
			'title'			=> 'Tutorial'
		);
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/tutor.php', $data);
		$this->load->view('template/footer.php');
	}
}