<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    protected $table='transaksi';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get(){
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function find($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function insert($data){
        $res = $this->db->insert($this->table, $data);
        return $res;
    }
 
    public function delete($where){
        $res = $this->db->delete($this->table, $where);
        return $res;
    }

    public function update($data, $where){
        $data['tanggal_update']=date('Y-m-d G:i:s');
        $this->db->where('id',$where);
        $res = $this->db->update($this->table, $data);
        return $res;
    }

}