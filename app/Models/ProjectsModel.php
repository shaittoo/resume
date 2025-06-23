<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectsModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id', 'title', 'description', 'technologies', 'image', 
        'live_url', 'github_url', 'start_date', 'end_date', 'featured', 'order_index'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'user_id' => 'required|integer',
        'title' => 'required|min_length[2]|max_length[255]',
        'description' => 'required|min_length[10]',
        'technologies' => 'permit_empty',
        'live_url' => 'permit_empty|valid_url',
        'github_url' => 'permit_empty|valid_url',
        'start_date' => 'permit_empty|valid_date',
        'end_date' => 'permit_empty|valid_date',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Project title is required',
            'min_length' => 'Project title must be at least 2 characters long',
        ],
        'description' => [
            'required' => 'Project description is required',
            'min_length' => 'Description must be at least 10 characters long',
        ],
        'live_url' => [
            'valid_url' => 'Please enter a valid URL for the live project',
        ],
        'github_url' => [
            'valid_url' => 'Please enter a valid GitHub URL',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('order_index', 'ASC')
                    ->orderBy('featured', 'DESC')
                    ->findAll();
    }

    public function getFeatured($userId)
    {
        return $this->where('user_id', $userId)
                    ->where('featured', 1)
                    ->orderBy('order_index', 'ASC')
                    ->findAll();
    }

    public function formatTechnologies($technologies)
    {
        if (!$technologies) return [];
        return explode(',', $technologies);
    }

    public function formatDate($date)
    {
        if (!$date) return '';
        return date('M Y', strtotime($date));
    }
} 