<?php

class Migration_Artikel extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'judul' => array(
                'type' => 'TEXT'
            ),
            'konten' => array(
                'type' => 'TEXT',
            ),
            'gambar' => array(
                'type' => 'TEXT',
                'null' => true,
            ),
            'tanggal' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s')
            ),
            'tanggal_update' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s')
            ),
            'status' => array(
                'type' => 'BOOLEAN',
                'default' => false,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('artikel');
    }

    public function down() {
        $this->dbforge->drop_table('artikel');
    }

}