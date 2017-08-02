<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapang extends CI_Controller {

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
        $data=array();
        $this->load->model('lapang_model');
        $data['lapang']=$this->lapang_model->findByUser(2)->row();
        $data['peta']=explode(',', $data['lapang']->lat_long);
        $this->load->model('detail_lapang_model');
        $data['data']=$this->detail_lapang_model->findByLapang($data['lapang']->id);
        $this->load->view('backend/lapang/index',$data);
    }

    public function edit(){
        $this->load->model('lapang_model');
        $lapang=$this->lapang_model->findByUser(2)->row();
        $data=[
            'form_name'=>'form1', 
            'form_id'=>'form1', 
            'form_action'=>base_url('admin/lapang/update/').$lapang->id,
            'form_method'=>'post',
            'form_multipart'=>true,
            'lapang'=>$lapang,
            'peta'=>explode(',', $lapang->lat_long)
            ];
        $this->load->view('backend/lapang/form',$data);
    }

    public function update($id){
        $this->load->model('lapang_model');
        $data=$this->input->post();
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
                $data['gambar']= $image['file_name'];
            } 
        }
        unset($data['image']);
        $update=$this->lapang_model->update($data,$id);
        redirect(base_url('admin/lapang'),'refresh');
    }

    public function detail($id)
    {
        $data=array();
        $this->load->model('detail_lapang_model');
        $data['lapang']=$this->detail_lapang_model->find($id);
        $this->load->view('backend/lapang/detail',$data);
    }

    public function tambah_lapang($id){
        $data=[
            'form_name'=>'form1', 
            'form_id'=>'form1', 
            'form_action'=>base_url('admin/lapang/detail/insert/').$id,
            'form_method'=>'post',
            'form_multipart'=>true
            ];
        $data['nama']=null;
        $data['harga']=null;
        $data['deskripsi']=null;
        $data['gambar']=null;
        $this->load->view('backend/lapang/form_detail',$data);
    }

    public function edit_lapang($id){
        $data=[
            'form_name'=>'form1', 
            'form_id'=>'form1', 
            'form_action'=>base_url('admin/lapang/detail/update').'/'.$id,
            'form_method'=>'post',
            'form_multipart'=>true
            ];
        if ($id){
            $this->load->model('detail_lapang_model');
            $lapang=$this->detail_lapang_model->find($id);
            $data['nama']=$lapang->nama;
            $data['deskripsi']=$lapang->deskripsi;
            $data['gambar']=$lapang->gambar;
            $data['harga']=$lapang->harga;
        }
        $this->load->view('backend/lapang/form_detail',$data);
    }

    public function insert_lapang($id){
        $data=$this->input->post();
        $data['id_lapang']=$id;
        $file_name=rand(100,1000).'_'.date('YmdGis');
        $config['upload_path']   = 'assets/uploads/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $config['max_size']      = 1024; 
        $config['max_width']     = 1024; 
        $config['max_height']    = 768;  
        $config['file_name']    = $file_name;  
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($_FILES['image'])){
            if ( ! $this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors(),'request'=>$this->input->post());
            }
            else { 
                $image=$this->upload->data();
                $data['gambar']= $image['file_name'];
            } 
        }
        // $config['upload_path']   = 'assets/uploads/'; 
        // $config['allowed_types'] = 'gif|jpg|png'; 
        // $config['max_size']      = 10240; 
        // $config['max_width']     = 10240; 
        // $config['max_height']    = 7680;
        // if (isset($_FILES)){
        //     $dataImage=[];
        //     foreach ($_FILES['image'] as $imageUpload => $image) {
        //         $file_name=rand(100,1000).'_'.date('YmdGis');  
        //         $config['file_name']    = $file_name;  
        //         $this->load->library('upload', $config);
        //         $this->upload->initialize($config);
        //         if ( ! $this->upload->do_upload('image[]')) {
        //             $error = array('error' => $this->upload->display_errors(),'request'=>$this->input->post());
        //             var_dump($error);
        //             die();
        //         }
        //         else { 
        //             $image=$this->upload->data();
        //             $dataImage[]=$image['file_name'];
        //         } 
        //     }
        //     $data['gambar']=implode(',', $dataImage);
        // }
        // unset($data['image']);
        unset($data['image']);
        $this->load->model('detail_lapang_model');
        $res=$this->detail_lapang_model->insert($data);
        redirect(base_url('admin/lapang'));
    }

    public function update_lapang($id){
        $this->load->model('detail_lapang_model');
        $data=$this->input->post();
        $file_name=rand(100,1000).'_'.date('YmdGis');
        $config['upload_path']   = 'assets/uploads/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $config['max_size']      = 1024; 
        $config['max_width']     = 1024; 
        $config['max_height']    = 768;  
        $config['file_name']    = $file_name;  
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($_FILES['image'])){
            if ( ! $this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors(),'request'=>$this->input->post());
            }
            else { 
                $image=$this->upload->data();
                $data['gambar']= $image['file_name'];
            } 
        }
        unset($data['image']);
        $res=$this->detail_lapang_model->update($data,$id);
        redirect(base_url('admin/lapang'));
    }

    function delete_lapang($id){
        $this->load->model('detail_lapang_model');
        $res=$this->detail_lapang_model->delete($id);
        redirect(base_url('admin/lapang'));
    }

    public function jadwal($id)
    {
        $tanggal=date('Y-m-d');
        if ($this->input->post('tanggal')){
            $tanggal=date('Y-m-d',strtotime($this->input->post('tanggal')));
        }
        $this->load->model('lapang_model');
        $this->load->model('detail_lapang_model');
        $this->load->model('reservasi_model');
        $detail_lapang=$this->detail_lapang_model->find($id);
        $lapang=$this->lapang_model->find($detail_lapang->id_lapang);
        $booking=$this->reservasi_model->getByField($id,$tanggal);
        $data['lapang']=$lapang;
        $data['tanggal']=$tanggal;
        $data['peta']=explode(',', $lapang->lat_long);
        $data['detail_lapang']=$detail_lapang;
        $jadwal=[];
        $open=intval(date('G',strtotime($lapang->buka)));
        $close=intval(date('G',strtotime($lapang->tutup)));
        $i=1;
        if ($tanggal >= date('Y-m-d')){
            for ($open; $open < $close; $open++) {
                $hour=date('G:i',mktime($open,0,0,0,0,0)); 
                $jadwal[$open]['detail_id']=$detail_lapang->id;
                $jadwal[$open]['number']=$i++;
                $jadwal[$open]['jam']=$hour;
                $jadwal[$open]['status']='Kosong';
                $jadwal[$open]['tanggal_reservasi']=$tanggal.' '.$hour;
                if ($booking){
                    foreach ($booking as $k => $val) {
                        if (date_format(date_create($val->tanggal_reservasi),'G:i')== $hour){
                            $jadwal[$open]['status']='Isi';
                            $jadwal[$open]['jam']=date_format(date_create($val->tanggal_reservasi),'G:i');
                        }
                    }
                }
                if ($tanggal== date('Y-m-d') && date('G',mktime($open,0,0,0,0,0)) <= date('G') ){
                    $jadwal[$open]['status']='Tidak Tersedia';
                }
            }
        }
        $data['jadwal']=$jadwal;
        $this->load->view('backend/lapang/jadwal',$data);
    }
}
