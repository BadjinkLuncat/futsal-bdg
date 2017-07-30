<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservasi_model extends CI_Model {
    protected $table='reservasi';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get($id=null){
        if ($id){
            $this->db->where('id_detail_lapang',$id);
            $this->db->join('detail_lapang', 'detail_lapang.id=reservasi.id_detail_lapang', 'inner');
            $this->db->join('lapang', 'lapang.id=detail_lapang.id_lapang', 'inner');
        }
        
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getByField($where,$date=null){
        if (!$date){
            $date=date('Y-m-d');
        }
        $this->db->where('detail_lapang.id_lapang',$where);
        $this->db->where('DATE(reservasi.tanggal_reservasi) >=',$date);
        $this->db->join('detail_lapang', 'detail_lapang.id=reservasi.id_detail_lapang', 'inner');
        $query = $this->db->get($this->table);
        return $query->result();

    }

    public function find($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function transaksi($id){
        $this->db->where('reservasi.id',$id);
        $this->db->join('transaksi', 'reservasi.id=transaksi.id_reservasi', 'left');
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function cari_kode($where){
        $this->db->join('detail_lapang', 'detail_lapang.id=reservasi.id_detail_lapang', 'inner');
        $this->db->join('harga_lapang', 'detail_lapang.id=harga_lapang.id_detail_lapang', 'left');
        $this->db->join('lapang', 'lapang.id=detail_lapang.id_lapang', 'left');
        $this->db->where('kode_reservasi',$where);
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

    public function updatereservasi($data, $where){
        $data['tanggal_update']=date('Y-m-d G:i:s');
        $this->db->where('kode_reservasi', $where);
        $res = $this->db->update($this->table, $data);
        return $res;
    }
 
    public function delete($where){
        $res = $this->db->delete($this->table, $where);
        return $res;
    }

}