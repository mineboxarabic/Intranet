<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationsModel extends Model{
    protected $table = 'reservations';
    protected $primaryKey = 'id_reservation';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id_reservation id_materiel lot id_lot id_user date_debut date_retour
    protected $allowedFields = ['id_reservation', 'id_materiel', 'lot', 'id_lot', 'id_user', 'date_debut', 'date_retour'];


    protected $useTimestamps = false;

}
