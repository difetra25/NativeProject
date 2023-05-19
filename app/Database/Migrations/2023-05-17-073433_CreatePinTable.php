<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePinTable extends Migration
{
	public function up()
	{
		$fields = [
			"id" => [
				"type"=> "INT",
				"unsigned"=> true,
				"auto_increment"=> true,
			],
			"caption" => [
				"type"=> "VARCHAR",
				"constraint" => "200"
			],
			"location" => [
				"type"=> "TEXT"
			],
			"hashtag" => [
				"type"=> "VARCHAR",
				"constraint" => "200"
			],
			"upload" => [
				"type"=> "VARCHAR",
				"constraint" => "200"
			],
		];
		$this->forge->addKey('id', true);
		$this->forge->addField($fields);
        $this->forge->createTable('pins', true); //If NOT EXISTS create table pins
    }

        public function down()
        {
        $this->forge->dropTable('pins', true); //If Exists drop table pins
    }
}
