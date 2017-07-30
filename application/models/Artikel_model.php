<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel_model extends CI_Model {
    protected $table='artikel';
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
        $data['tanggal']=date('Y-m-d G:i:s');
        $data['tanggal_update']=date('Y-m-d G:i:s');
        $res = $this->db->insert($this->table, $data);
        return $res;
    }
 
    public function update($data, $where){
        $data['tanggal_update']=date('Y-m-d G:i:s');
        $this->db->where('id',$where);
        $res = $this->db->update($this->table, $data);
        return $res;
    }
 
    public function delete($where){
        $this->db->where('id',$where);
        $res = $this->db->delete($this->table);
        return $res;
    }

    public function cari($where){
        $this->db->where('judul like "%'.$where.'%"');
        $query = $this->db->get($this->table);
        return $query->result();
    }
}