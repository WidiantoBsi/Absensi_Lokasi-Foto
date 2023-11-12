<?php
class izin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('izin_model');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data = array(
            'title'             => 'Izin & Cuti',
            'dapur'            => $this->izin_model->getdapur(),
            'izin'        => $this->izin_model->getizin()
        );
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/absen/izin.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tambahizin()
    {
        $jenis = $this->input->post('jenis');
        $keterangan = $this->input->post('keterangan');
        $bukti = $_FILES['bukti']['name'];
        $awal = $this->input->post('tgl-awal');
        $akhir = $this->input->post('tgl-akhir');
        $status = $this->input->post('status');

        $date = date('Y-m-d');
        $d2 = trim($date);
        //acak nama gambar
        $extensi1 = explode('.', $bukti);
        //mengubah huruf menjadi kecil semua=
        $extensi = strtolower(end($extensi1));
        //script acak angka
        $acak_angka =  rand(1, 999);
        //script acak nama gmbar
        $nama_gambar = uniqid($acak_angka);
        //nama gamabr baru
        $bukti_baru = 'izin' . $nama_gambar . $d2 . '.' .  $extensi;

        $data = array(
            'id_user'   => $this->session->userdata('id_user'),
            'jenis'   => $jenis,
            'keterangan'   => $keterangan,
            'bukti'   => $bukti_baru,
            'tgl_awal'   => $awal,
            'tgl_akhir'   => $akhir,
            'status_izin'   => $status,
            'tgl'   => date('Y-m-d')
        );
        $config['upload_path'] = './assets/img/foto/'; //folder penyimpanana gambar
        $config['file_name'] = $bukti_baru;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPG|JPEG|GIF|SVG|JFIF|jfif';
        $config['max_size'] = '3024';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('bukti')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect(base_url('izin'), 'refresh');
        } else {
            $this->upload->data();
            $this->izin_model->tambahizin($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan !</div>');
            redirect(base_url('izin'), 'refresh');
        }
    }

    public function status($id)
    {
        $status = $this->input->post('statusbaru');

        $data = array(
            'status_izin'  => $status
        );

        if ($status == 'Disetujui'){
            $id_user = $this->input->post('id_user');
            $bukti = $this->input->post('bukti');
            $awal = $this->input->post('awal');
            $akhir = $this->input->post('akhir');
            $this->izin_model->tambahabsen($id_user, $awal, $akhir, $bukti);
        }
        $this->izin_model->status($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Izin berhasil di edit !</div>');
        redirect('izin', 'refresh');
    }
}
