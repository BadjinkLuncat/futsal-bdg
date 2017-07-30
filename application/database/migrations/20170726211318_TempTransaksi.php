<?php

class Migration_TempTransaksi extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'user' => array(
                'type' => 'TEXT',
                'constraint' => 30
            ),
            'id_detail_lapang' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'kode_booking' => array(
                'type' => 'VARCHAR',
                'constraint' => 16
            ),
            'harga' => array(
                'type' => 'INT'
            ),
            'tanggal_booking' => array(
                'type' => 'DATETIME'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('temp_transaksi');
    }

    public function down() {
        $this->dbforge->drop_table('temp_transaksi');
    }

}