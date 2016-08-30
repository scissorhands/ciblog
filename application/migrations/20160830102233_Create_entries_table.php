<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_entries_table extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field(
			[
				'id' => [
					'type' => 'INT',
					'constraint' => 11,
					'auto_increment' => true,
					'unsigned' => true
				],
				'author' => [
					'type' => 'VARCHAR',
					'constraint' => 128
				],
				'text' => [
					'type' => 'VARCHAR',
					'constraint' => 255
				],
				'creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
			]
		)
		->add_key('id', true)
		->create_table('entries');
	}

	public function down() {
		$this->dbforge->drop_table('entries');
	}

}

/* End of file 20160830102233_Create_entries_table.php */
/* Location: ./application/migrations/20160830102233_Create_entries_table.php */