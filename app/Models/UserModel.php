<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'name', 'email', 'password', 'title', 'phone', 'location', 
        'summary', 'profile_image', 'linkedin', 'github', 'email', 'facebook'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'name' => 'required|min_length[2]|max_length[255]',
        'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
        'title' => 'required|min_length[2]|max_length[255]',
        'phone' => 'permit_empty|min_length[10]|max_length[20]',
        'location' => 'permit_empty|max_length[255]',
        'summary' => 'required|min_length[10]',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Name is required',
            'min_length' => 'Name must be at least 2 characters long',
        ],
        'email' => [
            'required' => 'Email is required',
            'valid_email' => 'Please enter a valid email address',
            'is_unique' => 'This email is already registered',
        ],
        'title' => [
            'required' => 'Professional title is required',
        ],
        'summary' => [
            'required' => 'Professional summary is required',
            'min_length' => 'Summary must be at least 10 characters long',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Relationships
    public function getWithRelations($id = null)
    {
        $builder = $this->builder();
        
        if ($id) {
            $builder->where('id', $id);
        }
        
        $user = $builder->get()->getRowArray();
        
        if ($user) {
            $user['experience'] = $this->getExperience($user['id']);
            $user['education'] = $this->getEducation($user['id']);
            $user['skills'] = $this->getSkills($user['id']);
            $user['projects'] = $this->getProjects($user['id']);
        }
        
        return $user;
    }

    public function getExperience($userId)
    {
        $experienceModel = new ExperienceModel();
        return $experienceModel->where('user_id', $userId)
                              ->orderBy('order_index', 'ASC')
                              ->orderBy('start_date', 'DESC')
                              ->findAll();
    }

    public function getEducation($userId)
    {
        $educationModel = new EducationModel();
        return $educationModel->where('user_id', $userId)
                             ->orderBy('order_index', 'ASC')
                             ->orderBy('start_date', 'DESC')
                             ->findAll();
    }

    public function getSkills($userId)
    {
        $skillsModel = new SkillsModel();
        return $skillsModel->where('user_id', $userId)
                          ->orderBy('order_index', 'ASC')
                          ->orderBy('proficiency', 'DESC')
                          ->findAll();
    }

    public function getProjects($userId)
    {
        $projectsModel = new ProjectsModel();
        return $projectsModel->where('user_id', $userId)
                            ->orderBy('order_index', 'ASC')
                            ->orderBy('featured', 'DESC')
                            ->findAll();
    }

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
} 