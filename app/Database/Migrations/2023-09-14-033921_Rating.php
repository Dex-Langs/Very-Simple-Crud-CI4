<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rating extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'makanan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'rating1' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'rating2' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'rating3' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'rating4' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'rating5' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('makanan_id', 'makanan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ratings');
    }

    public function down()
    {
        $this->forge->dropTable('ratings');
    }
}
