<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'	=> 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'firstname'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'lastname'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'is_active'		=> [
				'type'	=> 'TINYINT'
			],
			'created_at' => [
				'type'           => 'DATETIME',						
				'null'           => true,
			],					
			'updated_at' => [
				'type'           => 'DATETIME',						
				'null'           => true,
			],			
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
