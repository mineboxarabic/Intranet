<?php

namespace App\Models;

use CodeIgniter\Model;

class leaves_historyM extends Model{
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
            'port'     => 3308,
        ];
        $this->db = \Config\Database::connect($custom);
        
    }

    public function getAllHistoryByUser($id){
        $builder = $this->db->table('leaves_history');
        $builder->select('*');
        $builder->where('employee', $id);
        $query = $builder->get();

        return $query->getResultArray();
    }
    protected $table = 'leaves_history';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id titre contenu date updated_at
    protected $allowedFields = ['*'];


    protected $useTimestamps = false;

}

