<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
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
        $this->load->model('lapang_model');
        $this->load->model('artikel_model');
        $data['lapang']=$this->lapang_model->get();
        $data['login']=$this->login;
        $data['artikel']=$this->artikel_model->get();
        $this->load->view('frontend/home',$data);
    }
}
