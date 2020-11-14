<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlogs extends Migration
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
			'title'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'content'       => [
				'type'           => 'LONGTEXT'			
			],
			'slug'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'img_url'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
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
		$this->forge->createTable('blogs');		
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('blogs');
	}
}
