<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettings extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'company_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'phone'       => [
				'type'           => 'VARCHAR',
				'constraint'     =>	'255'		
			],
			'address'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'facebook'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'twitter'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'instagram'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'linkedin'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'logo'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'about_us'       => [
				'type'           => 'TEXT'
			],
			'mission'       => [
				'type'           => 'TEXT'
			],
			'vision'       => [
				'type'           => 'TEXT'
			],
			'motto'       => [
				'type'           => 'TEXT'
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
		$this->forge->createTable('settings');		
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('settings');
	}
}
