<?php

namespace App\Models;

use CodeIgniter\Model;

class EntitleDDaysM extends Model{

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

    public function getByContract($contract)
    {
        $builder = $this->db->table('entitleddays');
        $builder->select('*');
        $builder->where('contract', $contract);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getByUser($id)
    {
        $builder = $this->db->table('entitleddays');
        $builder->select('*');
        $builder->where('employee', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    
    protected $table = 'entitleddays';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id titre contenu date updated_at
    //protected $allowedFields = ['titre', 'contenu', 'date'];


    protected $useTimestamps = false;

}

