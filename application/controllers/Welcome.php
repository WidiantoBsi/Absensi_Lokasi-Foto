<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
        $bln = $this->input->post('bulan');
        if (!isset($bln)) {
            $bulan    =  date('Y-m');
        } else {
            $bulan = $this->input->post('bulan');
        }

		$data = array(
			'title'			=> 'Dashboard',
			'nama'			=> $this->Dashboard_model->nama(),
			'cekabsen'		=> $this->Dashboard_model->cekabsen(),
			'dataabsen'		=> $this->Dashboard_model->dataabsen(),
			'dapur'			=> $this->Dashboard_model->dapur(),
			'cekizin'		=> $this->Dashboard_model->cekizin(),
            'bulan'         => $bulan,
			'rank'			=> $this->Dashboard_model->rank($bulan)
		);

		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('pages/dashboard.php', $data);
		$this->load->view('template/footer.php');
	}
	
    public function absen()
    {
        $encoded_data = $this->input->post('photoStore');
		$binary_data = base64_decode($encoded_data);

		//upload foto
		$photoname = uniqid().'.jpeg';
		$result = file_put_contents('assets/img/foto/'.$photoname, $binary_data);

		//insert database
        $id = $this->session->userdata('id_user');
        $lat = $this->input->post('lat');
        $lon = $this->input->post('lon');
        $map = $this->input->post('map');

        $data = array(
            'id_user'   	=> $id,
            'foto'     		=> $photoname,
            'lat'          	=> $lat,
            'lon'			=> $lon,
            'map'          	=> $map,
            'jam'          	=> date('H:i:s'),
            'tgl'          	=> date('Y-m-d'),
            'status'        => '1'
        );
        $this->Dashboard_model->absen($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Absen Berhasil.</div>');
        redirect(base_url('dashboard'), 'refresh');
    }
}
