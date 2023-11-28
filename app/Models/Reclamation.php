<?php

namespace App\Models;

use CodeIgniter\Model;

class Reclamation extends Model
{
    protected $table = 'reclamation';
    protected $primaryKey = 'NumReclamation';
    protected $allowedFields = ['CorpReclamation', 'DateReclamation', 'PseudoNom'];
}