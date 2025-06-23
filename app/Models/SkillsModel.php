<?php

namespace App\Models;

use CodeIgniter\Model;

class SkillsModel extends Model
{
    protected $table = 'skills';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id', 'name', 'category', 'proficiency', 'order_index'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'user_id' => 'required|integer',
        'name' => 'required|min_length[2]|max_length[255]',
        'category' => 'required|max_length[100]',
        'proficiency' => 'required|integer|greater_than[0]|less_than_equal_to[100]',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Skill name is required',
            'min_length' => 'Skill name must be at least 2 characters long',
        ],
        'category' => [
            'required' => 'Skill category is required',
        ],
        'proficiency' => [
            'required' => 'Proficiency level is required',
            'integer' => 'Proficiency must be a number',
            'greater_than' => 'Proficiency must be greater than 0',
            'less_than_equal_to' => 'Proficiency cannot exceed 100',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('order_index', 'ASC')
                    ->orderBy('proficiency', 'DESC')
                    ->findAll();
    }

    public function getByCategory($userId)
    {
        $skills = $this->getByUserId($userId);
        $categorized = [];
        
        foreach ($skills as $skill) {
            $category = $skill['category'];
            if (!isset($categorized[$category])) {
                $categorized[$category] = [];
            }
            $categorized[$category][] = $skill;
        }
        
        return $categorized;
    }

    public function getCategories()
    {
        return [
            'Technical' => 'Technical Skills',
            'Programming' => 'Programming Languages',
            'Framework' => 'Frameworks & Libraries',
            'Database' => 'Databases',
            'Tools' => 'Tools & Technologies',
            'Soft' => 'Soft Skills',
            'Language' => 'Languages',
        ];
    }
} 