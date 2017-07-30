<?php

class Migration_HargaLapang extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_detail_lapang' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint'=>11,
            ),
            'harga' => array(
                'type' => 'DECIMAL',
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
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_detail_lapang) REFERENCES detail_lapang(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('harga_lapang');
    }

    public function down() {
        $this->dbforge->drop_table('harga_lapang');
    }

}