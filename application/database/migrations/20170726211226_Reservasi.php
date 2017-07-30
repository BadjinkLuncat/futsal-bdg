<?php

class Migration_Reservasi extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'kode_reservasi' => array(
                'type' => 'VARCHAR',
                'constraint'=>16
            ),
            'id_user' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE
            ),
            'nama_user' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'email' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'no_hp' => array(
                'type' => 'VARCHAR',
                'constraint' => '13',
                'null' => TRUE
            ),
            'id_detail_lapang' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint' => 11
            ),
            'status' => array(
                'type' => 'BOOLEAN',
            ),
            'tanggal_reservasi' => array(
                'type' => 'DATETIME',
            ),
            'durasi' => array(
                'type' => 'INT',
                'constraint' => 11,
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
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_detail_lapang) REFERENCES detail_lapang(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('reservasi');
    }

    public function down() {
        $this->dbforge->drop_table('reservasi');
    }

}