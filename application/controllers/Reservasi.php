<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi extends CI_Controller {

    protected $login=false;

    public function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        if($this->ion_auth->logged_in()===True)
        {
            $this->login=true;
        }
    }

    public function index() {
        $data['login']=$this->login;
        $this->load->model('lapang_model');
        $data['lapang']=$this->lapang_model->find();
        $this->load->view('frontend/booking',$data);
    }

    public function booking() {
        $id_lapang=$this->input->post('id_lapang');
        $this->load->model('detail_lapang_model');
        $detail_lapang=$this->detail_lapang_model->find($id_lapang);
        $this->load->model('lapang_model');
        $lapang=$this->lapang_model->find($detail_lapang->id_lapang);
        $data['kode_reservasi']='BO'.date('YmdGis');
        $data['user']=$_SERVER['REMOTE_ADDR'];
        $data['id_detail_lapang']=$detail_lapang->id;
        $data['harga']=$detail_lapang->harga;
        $data['tanggal_reservasi']=date_format('Y-m-d G:i:s', date_create(date('Y-m-d').' '.$this->input->post('jam')));
        $this->load->model('temp_transaksi_model');
        $this->temp_transaksi_model->deletes($_SERVER['REMOTE_ADDR']);
        $temp=$this->temp_transaksi_model->insert($data);
        $data['jam']=$this->input->post('jam');
        $data['detail_lapang']=$detail_lapang;
        $data['lapang']=$lapang;
        $data['booking']=$data;
        $data['login']=$this->login;
        $this->load->view('frontend/keranjang_booking',$data);
    }

    public function checkout() {
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()) {
            $reservasi['kode_reservasi']=$this->input->post('kode_reservasi');
            $reservasi['id_detail_lapang']=$this->input->post('id_detail_lapang');
            $reservasi['tanggal_reservasi']=$this->input->post('tanggal_reservasi');
            $reservasi['login']=$this->login;
            $this->load->view('frontend/register-checkout',$reservasi);
        }else{
            $user = $this->ion_auth->user()->row();
            $reservasi['kode_reservasi']=$this->input->post('kode_reservasi');
            $reservasi['id_user']=$user->id;
            $reservasi['nama_user']=$user->nama;
            $reservasi['email']=$user->email;
            $reservasi['no_hp']=$user->telepon;
            $reservasi['id_detail_lapang']=$this->input->post('id_detail_lapang');
            $reservasi['status']=0;
            $reservasi['tanggal_reservasi']=$this->input->post('tanggal_reservasi');
            $this->load->model('reservasi_model');
            $this->reservasi_model->insert($reservasi);
            $this->load->model('detail_lapang_model');
            $detail_lapang=$this->detail_lapang_model->find($this->input->post('id_detail_lapang'));
            $this->load->model('lapang_model');
            $lapang=$this->lapang_model->find($detail_lapang->id_lapang);
            $data['login']=$this->login;
            $data['booking']=[];
            $this->load->view('frontend/keranjang_booking',$data);
        }
    }

    public function checkoutregister() {
        $this->load->model('ion_auth_model');
        $identity=$this->input->post('email');
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $additional_data=['nama'=>$this->input->post('nama'),'telepon'=>$this->input->post('telepon')];
        $groups=[4];
        $userRegister=$this->ion_auth_model->register($identity, $password, $email, $additional_data,$groups);
        if ($userRegister!=false){
            $this->ion_auth->login($this->input->post('email'), $password);
            $this->load->library(array('ion_auth'));
            $user = $this->ion_auth->user()->row();
            $reservasi['kode_reservasi']=$this->input->post('kode_reservasi');
            $reservasi['id_user']=$user->id;
            $reservasi['nama_user']=$user->nama;
            $reservasi['email']=$user->email;
            $reservasi['no_hp']=$user->telepon;
            $reservasi['id_detail_lapang']=$this->input->post('id_detail_lapang');
            $reservasi['status']=0;
            $reservasi['tanggal_reservasi']=$this->input->post('tanggal_reservasi');
            $this->load->model('reservasi_model');
            $reservasi=$this->reservasi_model->insert($reservasi);
            $this->load->model('detail_lapang_model');
            $detail_lapang=$this->detail_lapang_model->find($this->input->post('id_detail_lapang'));
            $this->load->model('lapang_model');
            $lapang=$this->lapang_model->find($detail_lapang->id_lapang);
            $reservasi=$this->reservasi_model->find($reservasi->id);
            $this->sendEmail($reservasi,$detail_lapang,$lapang,$user);
            redirect(base_url('/'),'refresh');
        }
    }

    function sendEmail($reservasi,$detail_lapang,$lapang,$user) {
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
        $htmlContent = '<h3>Konfirmasi Reservasi Lapang Futsal</h3>';
        $htmlContent .= '<br>';
        $htmlContent .= '<p>Nama           : '.$reservasi->nama_user.'</p>';
        $htmlContent .= '<p>Kode Reservasi : '.$reservasi->kode_reservasi.'</p>';
        $htmlContent .= '<p>Nama Lapang    : '.$lapang->nama.'</p>';
        $htmlContent .= '<p>Tanggal & Waktu Reservasi : '.$reservasi->tanggal_reservasi.'</p>';
        $htmlContent .= '<br>';
        $htmlContent .= '<p>Silahkan Untuk Melakukan Pembayaran uang muka ke Rek : 625845458552 a.n Booking Futsal, Terima kasih</p>';
        $this->email->to($user->email);
        $this->email->from('info@example.com','Booking Futsal');
        $this->email->subject('Konfirmasi Pembayaran');
        $this->email->message($htmlContent);
        return $emailSend=$this->email->send();
    }
}
