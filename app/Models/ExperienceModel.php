<?php

namespace App\Models;

use CodeIgniter\Model;

class ExperienceModel extends Model
{
    protected $table = 'experience';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id', 'company', 'position', 'location', 'start_date', 
        'end_date', 'current', 'description', 'achievements', 'order_index'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'user_id' => 'required|integer',
        'company' => 'required|min_length[2]|max_length[255]',
        'position' => 'required|min_length[2]|max_length[255]',
        'start_date' => 'required|valid_date',
        'end_date' => 'permit_empty|valid_date',
        'description' => 'required|min_length[10]',
    ];

    protected $validationMessages = [
        'company' => [
            'required' => 'Company name is required',
            'min_length' => 'Company name must be at least 2 characters long',
        ],
        'position' => [
            'required' => 'Position title is required',
            'min_length' => 'Position title must be at least 2 characters long',
        ],
        'start_date' => [
            'required' => 'Start date is required',
            'valid_date' => 'Please enter a valid start date',
        ],
        'description' => [
            'required' => 'Job description is required',
            'min_length' => 'Description must be at least 10 characters long',
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

    public function getDuration($startDate, $endDate = null, $current = false)
    {
        if ($current || !$endDate) {
            $endDate = date('Y-m-d');
        }
        
        $start = new \DateTime($startDate);
        $end = new \DateTime($endDate);
        $interval = $start->diff($end);
        
        $years = $interval->y;
        $months = $interval->m;
        
        if ($years > 0 && $months > 0) {
            return "{$years} year" . ($years > 1 ? 's' : '') . " {$months} month" . ($months > 1 ? 's' : '');
        } elseif ($years > 0) {
            return "{$years} year" . ($years > 1 ? 's' : '');
        } elseif ($months > 0) {
            return "{$months} month" . ($months > 1 ? 's' : '');
        } else {
            return "Less than 1 month";
        }
    }
} 