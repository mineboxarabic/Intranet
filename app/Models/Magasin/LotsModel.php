<?php

namespace App\Models;

use CodeIgniter\Model;

class LotsModel extends Model{
    protected $table = 'lot';
    protected $primaryKey = 'id_lot';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id_lot nom_lot lot_obs lot_acc degat manquant lot_cat dispo num_projet
    protected $allowedFields = ['id_lot', 'nom_lot', 'lot_obs', 'lot_acc', 'degat', 'manquant', 'lot_cat', 'dispo', 'num_projet'];


    protected $useTimestamps = false;

}
