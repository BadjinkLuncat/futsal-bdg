<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->lang->load('auth');
    }

	public function index()
	{
		$this->load->view('backend/login');
	}
        
    public function login()
    {
        $remember = (bool) $this->input->post('remember');
        if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember)){
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect(base_url('admin/dashboard'));
        }
        else
        {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            var_dump($this->ion_auth->errors());
            die();
        }

        redirect(base_url('admin/auth/login'));
    }

    // log the user out
    public function logout()
    {
        $this->data['title'] = "Logout";
        $logout = $this->ion_auth->logout();
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect(base_url('admin/auth/login'), 'refresh');
    }

    public function register()
    {
        $this->load->view('backend/register');
    }

    public function postregister()
    {
        $this->load->model('ion_auth_model');
        $this->load->model('lapang_model');
        $identity=$this->input->post('email');
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $additional_data=['nama'=>$this->input->post('nama'),'telepon'=>$this->input->post('telepon')];
        $groups=[3];
        $userRegister=$this->ion_auth_model->register($identity, $password, $email, $additional_data,$groups);
        $file_name=rand(100,1000).'_'.date('YmdGis');
        $config['upload_path']   = 'assets/uploads/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $config['max_size']      = 1024; 
        $config['max_width']     = 1024; 
        $config['max_height']    = 768;  
        $config['file_name']    = $file_name;  
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('image')) {
            $field['gambar']= 'noimage.gif'; 
            $error = array('error' => $this->upload->display_errors(),'request'=>$this->input->post());
        }
        else { 
            $image=$this->upload->data();
            $field['gambar']= $image['file_name'];
        } 
        $field['nama']=$this->input->post('field_nama');
        $field['telepon']=$this->input->post('field_telepon');
        $field['hp']=$this->input->post('field_hp');
        $field['email']=$this->input->post('field_email');
        $field['location']=$this->input->post('location');
        $field['alamat']=$this->input->post('field_alamat');
        $field['buka']=$this->input->post('field_buka');
        $field['tutup']=$this->input->post('field_tutup');
        $field['id_user']=$userRegister;
        $auth=$this->lapang_model->insert($field);
        
        redirect(base_url('backend/user-trustee/admin'),'refresh');
    }
}
