<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'tbl_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = false;
    protected $allowedFields = [
        'id',
        'invite_id',
        'will_attend',
        'will_not_attend',
        'qr_code_status'

    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];


    public function getCompanionsWithUserNames()
    {
        // Join tbl_users with tbl_companions
        return $this->select('tbl_users.id, tbl_users.name, tbl_users.will_attend, tbl_users.will_not_attend, tbl_users.date, tbl_users.name as user_name', 'tbl_users.invite_id')
            ->join('tbl_companions', 'tbl_users.id = tbl_companions.user_id', 'inner')
            ->findAll();
    }
    public function get_totals()
    {
        $builder = $this->db->table(tableName: 'tbl_users');
        $total_users = $builder->countAllResults();

        return [
            'total_users' => $total_users,
        ];
    
    }
    public function get_will_attend()
    {
        $builder = $this->db->table(tableName: 'tbl_users');
        $builder->where('tbl_users.will_attend', 'Yes');
        $total_users_will_attend= $builder->countAllResults();

        return [
            'total_users_will_attend' => $total_users_will_attend,
        ];
    
    }
    public function getRemSlots($table_number)
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number', $table_number);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', $table_number);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();
        $rem_slots = 10 - ($total_companions + $total_users);

        return $rem_slots;
    }
    public function get_table_slots_1()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number', 1);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 1);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_1' => $total_companions + $total_users,
        ];
    }
    public function get_table_slots_2()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number', 2);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 2);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_2' => $total_companions + $total_users,
        ];
    }
    public function get_table_slots_3()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number', 3);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 3);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_3' => $total_companions + $total_users,
        ];
    }
    public function get_table_slots_4()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number', 4);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 4);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_4' => $total_companions + $total_users,
        ];
    }
    public function get_table_slots_5()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number', 5);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 5);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_5' => $total_companions + $total_users,
        ];
    }
    public function get_table_slots_6()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number', 6);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 6);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_6' => $total_companions + $total_users,
        ];
    }
    public function get_table_slots_7()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number',7);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 7);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_7' => $total_companions + $total_users,
        ];
    }
    public function get_table_slots_8()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number',8);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 8);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_8' => $total_companions + $total_users,
        ];
    }
    public function get_table_slots_9()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number',9);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 9);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_9' => $total_companions + $total_users,
        ];
    }
    public function get_table_slots_10()
    {
        $builderUsers = $this->db->table('tbl_users');
        $builderUsers->select('COUNT(tbl_users.id) as total_users');
        $builderUsers->where('tbl_users.table_number',10);

        $builderCompanions = $this->db->table('tbl_companions');
        $builderCompanions->join('tbl_users', 'tbl_companions.user_id = tbl_users.id', 'left');
        $builderCompanions->where('tbl_companions.table_number', 10);

        // Get the count of companions
        $total_companions = $builderCompanions->countAllResults();
        $total_users = $builderUsers->countAllResults();

        return [
            'total_table_slots_10' => $total_companions + $total_users,
        ];
    }
}
