<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapang extends CI_Controller {

    protected $login=false;

    public function __construct(){
        parent::__construct();
        $this->load->library('ion_auth');
        if($this->ion_auth->logged_in()===True)
        {
            $this->login=true;
        }
    }
    public function index(){
        $data['login']=$this->login;
        $this->load->model('lapang_model');
        $data['lapang']=$this->lapang_model->get();
        $this->load->view('frontend/lapang',$data);
    }

    public function detail($id){
        $data['login']=$this->login;
        $this->load->model('lapang_model');
        $lapang=$this->lapang_model->find($id);
        $this->load->model('detail_lapang_model');
        $detail_lapang=$this->detail_lapang_model->get($id);
        $this->load->model('reservasi_model');
        $date="2017-07-31";
        $booking=$this->reservasi_model->getByField($id,$date);
        $data['lapang']=$lapang;

        $data['peta']=explode(',', $lapang->lat_long);
        $data['detail_lapang']=$detail_lapang;
        $jadwal=[];
        var_dump($booking);
        foreach ($detail_lapang as $key => $value) {
            $open=intval(date('G',strtotime($lapang->buka)));
            $close=intval(date('G',strtotime($lapang->tutup)));
            $i=1;
            for ($open; $open < $close; $open++) {
                $hour=date('G:i',mktime($open,0,0,0,0,0)); 
                $jadwal[$key][$open]['detail_id']=$value->id;
                $jadwal[$key][$open]['number']=$i++;
                $jadwal[$key][$open]['jam']=$hour;
                $jadwal[$key][$open]['status']='Kosong';
                // if (date_create(date('Y-m-d ').$hour) <= date('Y-m-d G:i') || date('G',mktime($open,0,0,0,0,0)) <= date('G') ){
                //     $jadwal[$key][$open]['status']='Tidak Tersedia';
                //     $jadwal[$key][$open]['jam']=$hour;
                // }

                if ($booking){
                    foreach ($booking as $k => $val) {
                        if ($value->id == $val->id && date_format(date_create($val->tanggal_reservasi),'G:i')== $hour){
                            $jadwal[$key][$open]['status']='Isi';
                            $jadwal[$key][$open]['jam']=date_format(date_create($val->tanggal_reservasi),'G:i');
                        }
                    }
                }
            }
        }
        $data['jadwal']=$jadwal;
        $this->load->view('frontend/detail-lapang',$data);
    } 

    public function cari(){
        $data['login']=$this->login;
        $this->load->model('lapang_model');
        $data['lapang']=$this->lapang_model->cari($this->input->post('cari'));
        $this->load->view('frontend/lapang',$data);
    }

}
