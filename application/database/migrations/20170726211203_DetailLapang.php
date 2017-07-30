<?php

class Migration_DetailLapang extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_lapang' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint' => 11
            ),
            'tipe' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default'=>1
            ),
            'deskripsi' => array(
                'type' => 'TEXT',
                'null'=>true
            ),
            'gambar' => array(
                'type' => 'TEXT',
                'null'=>true
            ),
            'tanggal' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
            ),
            'tanggal_update' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_lapang) REFERENCES lapang(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('detail_lapang');
    }

    public function down() {
        $this->dbforge->drop_table('detail_lapang');
    }

}