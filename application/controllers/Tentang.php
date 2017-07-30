<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

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
        $this->load->view('frontend/tentang_kami',$data);
    }

    public function kontak() {
        $data['login']=$this->login;
        $this->load->view('frontend/kontak_kami',$data);
    }
}
