<?php

namespace App\Models;

use CodeIgniter\Model;

class leavesM extends Model{
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

    public function getLeavesByUserAndType($id,$type){
        $builder = $this->db->table('leaves');
        $builder->select('*');
        $builder->where('employee', $id);
        $builder->where('type', $type);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function insertNewLeave($data){
        $builder = $this->db->table('leaves');
        $builder->insert($data);
    }

    public function getLeavesByUserThisYear($id){
        $builder = $this->db->table('leaves');
        $builder->select('*');
        $builder->where('employee', $id);
        $builder->where('YEAR(startdate)', date("Y"));
        $builder->where('status', 2);

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function validateLeave($id,$num){
        $builder = $this->db->table('leaves');
        $builder->set('status', $num);
        $builder->where('id', $id);

        $builder->update();

        //return the updated leave
        $builder = $this->db->table('leaves');
        $builder->select('*');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResultArray();

    }


    protected $table = 'leaves';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;
// id titre contenu date updated_at
    protected $allowedFields = ['*'];


    protected $useTimestamps = false;

}

