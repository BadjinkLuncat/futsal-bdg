<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    protected $login=false;

    public function __construct(){
        parent::__construct();
        $this->load->library('ion_auth');
        if($this->ion_auth->logged_in()===True)
        {
            $this->login=true;
        }
    }

    public function index() {
        $data['login']=$this->login;
        $data['booking']=[];
        $this->load->model('temp_transaksi_model');
        $booking=$this->temp_transaksi_model->find($_SERVER['REMOTE_ADDR']);
        $id_lapang=$booking->id_detail_lapang;
        $this->load->model('detail_lapang_model');
        $detail_lapang=$this->detail_lapang_model->find($id_lapang);
        $this->load->model('lapang_model');
        $lapang=$this->lapang_model->find($detail_lapang->id_lapang);
        $data['jam']=$booking->tanggal_reservasi;
        $data['detail_lapang']=$detail_lapang;
        $data['kode_reservasi']=$booking->kode_reservasi;
        $data['tanggal_reservasi']=$booking->tanggal_reservasi;
        $data['lapang']=$lapang;
        $data['booking']=$data;
        $this->load->view('frontend/keranjang_booking',$data);
    }

    public function cara_booking() {
        $data['login']=$this->login;
        $this->load->view('frontend/cara_booking',$data);
    }

    public function konfirmasi_pembayaran() {
        $data['login']=$this->login;
        $data['transaksi']=[];
        $this->load->view('frontend/konfirmasi_pembayaran',$data);
    }

    public function check_kode() {
        $data['login']=$this->login;
        $this->load->model('reservasi_model');
        $data['transaksi']=$this->reservasi_model->cari_kode($this->input->post('kode_reservasi'));
        $this->load->view('frontend/konfirmasi_pembayaran',$data);
    }

    public function konfirmasi() {
        $this->load->model('reservasi_model');
        $this->load->model('ion_auth_model');
        $this->load->model('lapang_model');
        $this->load->model('detail_lapang_model');
        $data['status']=1;
        $reservasiUpdate=$this->reservasi_model->updatereservasi($data,$this->input->post('kode_reservasi'));
        $reservasi=$this->reservasi_model->cari_kode($this->input->post('kode_reservasi'));
        $detail_lapang=$this->detail_lapang_model->find($reservasi->id_detail_lapang);
        $file_name=rand(100,1000).'_'.date('YmdGis');
        $config['upload_path']   = 'assets/uploads/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $config['max_size']      = 10240; 
        $config['max_width']     = 10240; 
        $config['max_height']    = 7680;  
        $config['file_name']    = $file_name;  
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($_FILES['image'])){
            if ( ! $this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors(),'request'=>$this->input->post());
            }
            else { 
                $image=$this->upload->data();
                $transaksi['gambar']= $image['file_name'];
            } 
        }
        $transaksi['no_transaksi']='P'.date('YmdGis');
        $transaksi['id_reservasi']=$reservasi->id;
        $transaksi['harga']=$detail_lapang->harga;
        $this->load->model('transaksi_model');
        $this->transaksi_model->insert($transaksi);
        $data['transaksi']=$reservasi;
        $user=$this->ion_auth_model->user($reservasi->id_user)->row();
        $detail_lapang=$this->detail_lapang_model->find($reservasi->id_detail_lapang);
        $lapang=$this->lapang_model->find($detail_lapang->id_lapang);
        // $this->sendEmail($reservasi,$detail_lapang,$lapang,$user);
        // $this->sendEmailToAdmin($reservasi,$detail_lapang,$lapang,$user);
        $data['login']=$this->login;
        $this->load->view('frontend/konfirmasi_pembayaran',$data);
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
        $htmlContent .= '<p>Telah Kami Terima</p>';
        $htmlContent .= '<p>Silahkan Tunggu Konfirmasi Selanjutnya, Terima Kasih</p>';

        $this->email->to($user->email);
        $this->email->from('info@example.com','Booking Futsal');
        $this->email->subject('Konfirmasi Pembayaran');
        $this->email->message($htmlContent);
        return $emailSend=$this->email->send();
        
    }

    function sendEmailToAdmin($reservasi,$detail_lapang,$lapang,$user){
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
        $htmlContent = '<h3>Pembayaran</h3>';
        $htmlContent .= '<br>';
        $htmlContent .= '<p>Nama           : '.$reservasi->nama_user.'</p>';
        $htmlContent .= '<p>Kode Reservasi : '.$reservasi->kode_reservasi.'</p>';
        $htmlContent .= '<p>Nama Lapang    : '.$lapang->nama.'</p>';
        $htmlContent .= '<p>Tanggal & Waktu Reservasi : '.$reservasi->tanggal_reservasi.'</p>';
        $htmlContent .= '<br>';
        $htmlContent .= '<p>Telah Kami Terima, Terima kasih</p>';

        $this->email->to('mail.ajid13@gmail.com');
        $this->email->from('info@example.com','Booking Futsal');
        $this->email->subject('Konfirmasi Pembayaran');
        $this->email->message($htmlContent);
        return $emailSend=$this->email->send();
    }
}
