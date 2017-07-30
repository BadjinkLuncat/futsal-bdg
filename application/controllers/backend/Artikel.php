<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

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
        $this->load->model('artikel_model');
        $data['data']=$this->artikel_model->get();
        $this->load->view('backend/artikel/index',$data);
    }
    public function create()
    {
        $data['form']=[
            'form_name'=>'form1', 
            'form_id'=>'form1', 
            'form_action'=>base_url('admin/artikel/insert'),
            'form_method'=>'post',
            'form_multipart'=>true
            ];
        $data['data']=[
            'judul' => null,
            'konten' => null,
            'gambar' => null,
        ];
        $this->load->view('backend/artikel/form',$data);
    }

    public function insert(){
        $this->load->model('artikel_model');
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
        $res=$this->artikel_model->insert($data);
        redirect(base_url('admin/artikel'),'refresh');
    }

    public function edit($id){
        $data['form']=[
            'form_name'=>'form1', 
            'form_id'=>'form1', 
            'form_action'=>base_url('admin/artikel/insert'),
            'form_method'=>'post',
            'form_multipart'=>true
            ];
        $data['data']=[
            'judul' => null,
            'konten' => null,
            'gambar' => null,
        ];
        if ($id){
            $data['form']['form_action']=base_url('admin/artikel/update'.'/'.$id);
            $this->load->model('artikel_model');
            $artikel=$this->artikel_model->find($id);
            $data['data']=[
                'judul' => $artikel->judul,
                'konten' => $artikel->konten,
                'gambar' => $artikel->gambar,
            ];
            
        }
        $this->load->view('backend/artikel/form',$data);
    }

    public function update ($id){
        $this->load->model('artikel_model');
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
        $res=$this->artikel_model->update($data,$id);
        redirect(base_url('admin/artikel'),'refresh');
    }

    public function delete($id){
        $this->load->model('artikel_model');
        $artikel=$this->artikel_model->delete($id);
        redirect(base_url('admin/artikel'),'refresh');
    }
}
