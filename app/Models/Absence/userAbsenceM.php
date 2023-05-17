<?php

namespace App\Models;

use CodeIgniter\Model;

class userAbsenceM extends Model{

    public function __construct( )
    {
        parent::__construct();
        $custom = [
            'DSN'      => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'admin_lms',
            'DBDriver' => 'MySQLi',
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => true,
            'charset'  => 'utf8',
            'DBCollat' => 'utf8_general_ci',
            'swapPre'  => '',
            'encrypt'  => false,
            'compress' => false,
            'strictOn' => false,
            'failover' => [],
            'port'     => 3306,
        ];
        $this->db = \Config\Database::connect($custom);
        
    }

    public function getUserByEmail($email)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('email', $email);
        $query = $builder->get();
        return $query->getResultArray();
    }

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;

    //protected $allowedFields = [];


    protected $useTimestamps = false;

}
