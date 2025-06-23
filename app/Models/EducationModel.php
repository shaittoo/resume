<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationModel extends Model
{
    protected $table = 'education';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id', 'institution', 'degree', 'field_of_study', 'location', 
        'start_date', 'end_date', 'current', 'description', 'order_index'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'user_id' => 'required|integer',
        'institution' => 'required|min_length[2]|max_length[255]',
        'degree' => 'required|min_length[2]|max_length[255]',
        'field_of_study' => 'required|min_length[2]|max_length[255]',
        'start_date' => 'required|valid_date',
        'end_date' => 'permit_empty|valid_date',
    ];

    protected $validationMessages = [
        'institution' => [
            'required' => 'Institution name is required',
            'min_length' => 'Institution name must be at least 2 characters long',
        ],
        'degree' => [
            'required' => 'Degree is required',
            'min_length' => 'Degree must be at least 2 characters long',
        ],
        'field_of_study' => [
            'required' => 'Field of study is required',
            'min_length' => 'Field of study must be at least 2 characters long',
        ],
        'start_date' => [
            'required' => 'Start date is required',
            'valid_date' => 'Please enter a valid start date',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('order_index', 'ASC')
                    ->orderBy('start_date', 'DESC')
                    ->findAll();
    }

    public function formatDate($date)
    {
        if (!$date) return 'Present';
        return date('M Y', strtotime($date));
    }

} 