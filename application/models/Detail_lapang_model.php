<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_lapang_model extends CI_Model {
    protected $table='detail_lapang';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get($id=null){
        if ($id){
            $this->db->where('id_lapang',$id);
        }
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function lapang($id){
        $this->db->join('harga_lapang', 'detail_lapang.id=harga_lapang.id_detail_lapang', 'left');
        $this->db->where('detail_lapang.id_lapang',$id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function findByLapang($id){
        $this->db->where('detail_lapang.id_lapang',$id);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function find($id){
        $this->db->where('detail_lapang.id',$id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function insert($data){
        $res = $this->db->insert($this->table, $data);
        return $res;
    }
 
    public function update($data, $where){
        $data['tanggal_update']=date('Y-m-d G:i:s');
        $this->db->where('id', $where);
        $res = $this->db->update($this->table, $data);
        return $res;
    }
 
    public function delete($where){
        $this->db->where('id', $where);
        $res = $this->db->delete($this->table);
        return $res;
    }

}