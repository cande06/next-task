<?php

namespace App\Models;
use CodeIgniter\Model;

class TaskModel extends Model{
    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'idUser', 'title', 'description', 'priority', 'status',
                'exp_date', 'reminder', 'color', 'assigned', 'archived',];
    protected $useTimestamps = false; // Dates
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = []; // Validation
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}
