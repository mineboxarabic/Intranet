<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjetM extends Model{
    protected $table = 'projets';
    protected $primaryKey = 'id_projet';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id_projet nom_projet commanditaire annee nbr_etu referent descriptif condition date_fin url file file_img
protected $allowedFields = ['nom_projet', 'commanditaire', 'annee', 'nbr_etu', 'referent', 'descriptif', 'condition', 'date_fin', 'url', 'file', 'file_img'];


    protected $useTimestamps = false;

}
