<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(  APPPATH.'libraries/phpass-0.1/PasswordHash.php');

class Migration_Create_users_table extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}
	// first_name, last_name, email, password, creation_date
	public function up() {
		$this->dbforge->add_field(
			[
				'id' => [
					'type' => 'INT',
					'constraint' => 11,
					'auto_increment' => true,
					'unsigned' => true
				],
				'first_name' => [
					'type' => 'VARCHAR',
					'constraint' => 64
				],
				'last_name' => [
					'type' => 'VARCHAR',
					'constraint' => 64
				],
				'email' => [
					'type' => 'VARCHAR',
					'constraint' => 64,
					'unique' => true
				],
				'password' => [
					'type' => 'VARCHAR',
					'constraint' => 64
				],
				'is_admin' => [
					'type' => 'BOOLEAN',
					'default' => false
				],
				'creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
			]
		)
		->add_key('id', true)
		->create_table('users');

		$hasher = new PasswordHash(HASH_STRENGTH, HASH_PORTABLE);
		$this->db->insert('users',[
			'first_name' => 'super',
			'last_name' => 'admin',
			'email' => 'admin@blog.dev',
			'password' => $hasher->HashPassword("basicpass"),
			'is_admin' => true
		]);
	}

	public function down() {
		$this->dbforge->drop_table('users');
	}

}

/* End of file 20160830103907_Create_users_table.php */
/* Location: ./application/migrations/20160830103907_Create_users_table.php */