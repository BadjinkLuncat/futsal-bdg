<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
            redirect('admin/auth/login');
        }else{
            if (!$this->ion_auth->in_group('admin') || !$this->ion_auth->in_group('super-admin')){
                redirect('admin/auth/login');
            }
        }
    }

    public function index()
    {
        $data=array();
        $this->load->model('ion_auth_model');
        $data['data']=$this->ion_auth_model->users('admin')->result();
        $this->load->view('backend/user-trustee/admin/index',$data);
    }

    public function create(){
        $this->createEdit();
    }

    public function insert(){
        $this->insertUpdate();
    }


    public function edit($id){
        $this->createEdit($id);
    }

    public function update($id){
        $this->insertUpdate($id);
    }

    function createEdit($id=null){
        $data['form']=[
            'form_name'=>'form1', 
            'form_id'=>'form1', 
            'form_action'=>base_url('admin/user-trustee/admin/insert'),
            'form_method'=>'post',
            'form_multipart'=>false
            ];
        $data['data']=[
            'password' => null,
            'email' => null,
            'nama' => null,
            'telepon' => null,
        ];
        if ($id){
            $data['form']['form_action']=base_url('admin/user-trustee/admin/update'.'/'.$id);
            $this->load->model('ion_auth_model');
            $user=$this->ion_auth_model->user($id)->result_array();
            $data['data']=$user[0];
        }
        $this->load->view('backend/user-trustee/admin/form',$data);
    }

    function insertUpdate($id=null){
        $this->load->model('ion_auth_model');
        $identity=$this->input->post('email');
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $additional_data=['nama'=>$this->input->post('nama'),'telepon'=>$this->input->post('telepon')];
        $groups=[2];
        if ($id){
            $res=$this->ion_auth_model->update($id, $additional_data);
        }else{
            $res=$this->ion_auth_model->register($identity, $password, $email, $additional_data,$groups);
        }
        redirect(base_url('backend/user-trustee/admin'),'refresh');
    }

    function delete($id){
        $this->load->model('ion_auth_model');
        $this->ion_auth_model->delete_user($id);
        redirect(base_url('backend/user-trustee/admin'),'refresh');
    }
}
