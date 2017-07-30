<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        if($this->ion_auth->logged_in()===FALSE)
        {
            redirect(base_url('admin/auth/login'));
        }
    }
    
    public function index()
    {
        $this->load->model('reservasi_model');
        $data['data']=$this->reservasi_model->get();
        $this->load->view('backend/reservasi/index',$data);
    }

    public function detail($id){
        $this->load->model('reservasi_model');
        $data['reservasi']=$this->reservasi_model->transaksi($id);
        $this->load->view('backend/reservasi/detail',$data);
    }

    public function konfirmasi($id)
    {
        $update['status']=2;
        $this->load->model('reservasi_model');
        $this->load->model('detail_lapang_model');
        $this->load->model('lapang_model');
        $this->load->model('ion_auth_model');
        $updateStatus=$this->reservasi_model->update($update,$id);
        $reservasi=$this->reservasi_model->find($id);
        $detail_lapang=$this->detail_lapang_model->find($reservasi->id_detail_lapang);
        $lapang=$this->lapang_model->find($detail_lapang->id_lapang);
        $user=$this->ion_auth_model->user($reservasi->id_user)->row();
        $this->load->model('transaksi_model');
        $this->transaksi_model->update($update,$reservasi->id);
        $this->sendEmail($reservasi,$detail_lapang,$lapang,$user);
        redirect(base_url('admin/reservasi'), 'refresh');
    }

    public function lunas($id)
    {
        $update['status']=3;
        $this->load->model('reservasi_model');
        $updateStatus=$this->reservasi_model->update($update,$id);
        $reservasi=$this->reservasi_model->find($id);
        $this->load->model('transaksi_model');
        $this->transaksi_model->update($update,$reservasi->id);
        redirect(base_url('admin/reservasi'), 'refresh');
    }

    public function calendar()
    {
        $this->load->view('backend/reservation/calendar');
    }

    public function create()
    {
        $this->load->view('backend/reservasi/index');
    }

    public function insert()
    {
        $this->load->view('backend/reservasi/index');
    }

    function sendEmail($reservasi,$detail_lapang,$lapang,$user){
        $this->load->library('email');
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'tigabelas.ajid@gmail.com',
            'smtp_pass' => 'Lup4l461',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $htmlContent = '<h3>Konfirmasi Pembayaran</h3>';
        $htmlContent .= '<br>';
        $htmlContent .= '<p>Nama           : '.$reservasi->nama_user.'</p>';
        $htmlContent .= '<p>Kode Reservasi : '.$reservasi->kode_reservasi.'</p>';
        $htmlContent .= '<p>Nama Lapang    : '.$lapang->nama.'</p>';
        $htmlContent .= '<p>Tanggal & Waktu Reservasi : '.$reservasi->tanggal_reservasi.'</p>';
        $htmlContent .= '<br>';
        $htmlContent .= '<p>Telah Kami Terima, Terima kasih</p>';

        $this->email->to($user->email);
        $this->email->from('info@example.com','Booking Futsal');
        $this->email->subject('Konfirmasi Pembayaran');
        $this->email->message($htmlContent);
        return $emailSend=$this->email->send();
        
    }
}
