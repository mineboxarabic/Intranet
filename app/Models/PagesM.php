<?php

namespace App\Models;

use CodeIgniter\Model;

class PagesM extends Model{
    protected $table = 'pages';
    protected $primaryKey = 'id_projet';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id titre contenu date updated_at
protected $allowedFields = ['titre', 'contenu', 'date'];


    protected $useTimestamps = false;

}
