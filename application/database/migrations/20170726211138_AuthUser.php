<?php

class Migration_AuthUser extends CI_Migration {

    public function up()
    {
        // Drop table 'groups' if it exists
        $this->dbforge->drop_table('groups', TRUE);

        // Table structure for table 'groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'deskripsi' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->dbforge->create_table('groups');

        // Dumping data for table 'groups'
        $data = array(
            array(
                'id' => '1',
                'nama' => 'super-admin',
                'deskripsi' => 'Super Admin'
            ),
            array(
                'id' => '2',
                'nama' => 'admin',
                'deskripsi' => 'General Admin'
            ),
            array(
                'id' => '3',
                'nama' => 'owner',
                'deskripsi' => 'Owner'
            ),
            array(
                'id' => '4',
                'nama' => 'member',
                'deskripsi' => 'General User'
            )
        );
        $this->db->insert_batch('groups', $data);


        // Drop table 'user' if it exists
        $this->dbforge->drop_table('user', TRUE);

        // Table structure for table 'user'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
            ),
            'salt' => array(
                'type' => 'VARCHAR',
                'constraint' => '40'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'kode_aktifasi' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE
            ),
            'kode_lupa_password' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE
            ),
            'waktu_lupa_password' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'kode_pengingat' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE
            ),
            'tanggal' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
            ),
            'tanggal_update' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
                'null'=>true
            ),
            'login_terakhir' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
                'null'=>true
            ),
            'aktif' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'telepon' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user');

        // Dumping data for table 'user'
        $data = array(
            'id' => '1',
            'password' => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',
            'salt' => '',
            'email' => 'super-admin@booking-futsal.com',
            'kode_aktifasi' => '',
            'kode_lupa_password' => NULL,
            'aktif' => '1',
            'nama' => 'Super',
            'telepon' => '082216912584',
        );
        $this->db->insert('user', $data);

        // Drop table 'user_groups' if it exists
        $this->dbforge->drop_table('group_user', TRUE);

        // Table structure for table 'user_groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_user' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE
            ),
            'id_group' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE
            ),
            'tanggal' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
            ),
            'tanggal_update' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
                'null'=>true
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_group) REFERENCES groups(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('group_user');

        // Dumping data for table 'user_groups'
        $data = array(
            array(
                'id' => '1',
                'id_user' => '1',
                'id_group' => '1',
            ),
        );
        $this->db->insert_batch('group_user', $data);

        // Drop table 'login_attempts' if it exists
        $this->dbforge->drop_table('login_attempt', TRUE);

        // Table structure for table 'login_attempts'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '16',
                'null'=>true
            ),
            'login' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null'=> TRUE
            ),
            'waktu' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'tanggal' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
            ),
            'tanggal_update' => array(
                'type' => 'DATETIME',
                'default'=>date('Y-m-d G:i:s'),
                'null'=>true
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('login_attempt');

    }

    public function down()
    {
        $this->dbforge->drop_table('user', TRUE);
        $this->dbforge->drop_table('groups', TRUE);
        $this->dbforge->drop_table('group_user', TRUE);
        $this->dbforge->drop_table('login_attempt', TRUE);
    }

}