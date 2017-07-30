<?php

class Migration_Transaksi extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'no_transaksi' => array(
                'type' => 'VARCHAR',
                'constraint'=>16
            ),
            'id_reservasi' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint' => 11
            ),
            'harga'=>array(
                'type'=>'DECIMAL'
            ),
            'uang_muka'=>array(
                'type'=>'DECIMAL',
                'null'=>true
            ),
            'gambar'=>array(
                'type'=>'TEXT',
                'null'=>true
            ),
            'sisa'=>array(
                'type'=>'DECIMAL',
                'null'=>true
            ),
            'status'=>array(
                'type'=>'INT',
                'default'=>1
            ),
            'tanggal' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s')
            ),
            'tanggal_update' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_reservasi) REFERENCES reservasi(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('transaksi');
    }

    public function down() {
        $this->dbforge->drop_table('transaksi');
    }

}