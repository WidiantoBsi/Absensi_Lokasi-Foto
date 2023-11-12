<?php
defined('BASEPATH') or exit('No direct script access allowed');

class noaccess extends CI_Controller
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
			'title'			=> 'Tidak Ada Akses'
		);
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/noaccess.php', $data);
		$this->load->view('template/footer.php');
	}
}