<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lapang_model extends CI_Model {
    protected $table='lapang';
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

    public function findByUser($id){
        $this->db->where('id_user',$id);
        $query = $this->db->get($this->table);
        return $query;
    }
    public function cari($where){
        $this->db->where('nama like "%'.$where.'%"')->or_where('alamat like "%'.$where.'%"', NULL, FALSE);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function insert($data){
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
        $res = $this->db->delete($this->table, $where);
        return $res;
    }

}