<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnimalsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'species' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'age' => [
                'type' => 'INT',
                'null' => true,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('animals');
    }

    public function down()
    {
        $this->forge->dropTable('animals');
    }
}
