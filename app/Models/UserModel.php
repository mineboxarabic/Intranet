<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'membres';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['first_name','last_name', 'email'];


    protected $useTimestamps = false;

}
