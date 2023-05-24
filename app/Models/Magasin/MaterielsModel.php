<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterielsModel extends Model{
    protected $table = 'materiel';
    protected $primaryKey = 'id_materiel';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id titre contenu date updated_at
    protected $allowedFields = ['*'];


    protected $useTimestamps = false;

}
