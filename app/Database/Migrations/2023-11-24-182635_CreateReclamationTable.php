<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReclamationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NumReclamation' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'CorpReclamation' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'DateReclamation' => [
                'type' => 'DATE',
            ],
            'PseudoNom' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);

        $this->forge->addKey('NumReclamation', true);
        $this->forge->createTable('reclamation');
    }


    public function down()
    {
        $this->forge->dropTable('reclamation');
    }
}
