<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {
    
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
        $this->load->model('artikel_model');
        $data['data_artikel']=$this->artikel_model->get();
        $data['artikel']=$this->artikel_model->get();
        $this->load->view('frontend/artikel',$data);
    }

    public function cari (){
        $data['login']=$this->login;
        $this->load->model('artikel_model');
        $data['data_artikel']=$this->artikel_model->get();
        $data['artikel']=$this->artikel_model->cari($this->input->post());
        $this->load->view('frontend/artikel',$data);
    }

    public function detail($id){
        $data['login']=$this->login;
        $this->load->model('artikel_model');
        $data['data_artikel']=$this->artikel_model->get();
        $data['artikel']=$this->artikel_model->find($id);
        $this->load->view('frontend/detail-artikel',$data);
    }
}
