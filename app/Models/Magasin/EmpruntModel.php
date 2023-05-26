<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpruntModel extends Model{
    protected $table = 'emprunt';
    protected $primaryKey = 'id_emprunt';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id titre contenu date updated_at
    protected $allowedFields = ['*'];


    protected $useTimestamps = false;

}
