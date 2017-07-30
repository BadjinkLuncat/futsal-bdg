<?php

class Migration_Lapang extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_user' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
            ),
            'alamat' => array(
                'type' => 'TEXT'
            ),
            'location' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'telepon' => array(
                'type' => 'VARCHAR',
                'constraint'=>12,
                'null' => TRUE
            ),
            'hp' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'email' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'buka' => array(
                'type' => 'TIME',
                'default'=>'08:00'
            ),
            'tutup' => array(
                'type' => 'TIME',
                'default'=>'22:00'
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
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('lapang');
    }

    public function down() {
        $this->dbforge->drop_table('lapang');
    }

}