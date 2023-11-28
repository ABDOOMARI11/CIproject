<?php

// app/Database/Migrations/YYYY-MM-DD-HHIISS_CreateUtilisateursTable.php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUtilisateursTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'PseudoNom' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'Nom' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'Prenom' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'Adresse' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'Sexe' => [
                'type' => 'VARCHAR',
                'constraint' => 1,
                'default' => 'M',
            ],
            'Profession' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
                'null' => true,
            ],
            'DateNaissance' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'Password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('PseudoNom', true);
        $this->forge->createTable('utilisateurs');
    }

    public function down()
    {
        $this->forge->dropTable('utilisateurs');
    }
}

