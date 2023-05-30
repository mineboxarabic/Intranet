<?php

namespace App\Models;

use CodeIgniter\Model;

class ESM extends Model{
    protected $table = 'es';
    protected $primaryKey = 'id_es';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id_ESM nom_ESM commanditaire annee nbr_etu referent descriptif condition date_fin url file file_img
protected $allowedFields = ['nom_es', 'commanditaire', 'annee', 'nbr_etu', 'referent', 'descriptif', 'condition', 'date_fin', 'url', 'file', 'file_img'];


    protected $useTimestamps = false;

}
