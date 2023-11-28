<?php

// app/Models/Utilisateurs.php

namespace App\Models;

use CodeIgniter\Model;

class Utilisateurs extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'PseudoNom';
    protected $allowedFields = ['Nom', 'Prenom', 'Adresse', 'Sexe', 'Profession', 'DateNaissance', 'Password'];
}
