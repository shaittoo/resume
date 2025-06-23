<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ExperienceModel;
use App\Models\EducationModel;
use App\Models\SkillsModel;
use App\Models\ProjectsModel;

class Resume extends BaseController
{
    protected $userModel;
    protected $experienceModel;
    protected $educationModel;
    protected $skillsModel;
    protected $projectsModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->experienceModel = new ExperienceModel();
        $this->educationModel = new EducationModel();
        $this->skillsModel = new SkillsModel();
        $this->projectsModel = new ProjectsModel();
    }

    public function index()
    {
        return 'Hello World';
    }

    public function setup()
    {
        // Check if user already exists
        $existingUser = $this->userModel->first();
        
        if ($existingUser) {
            return redirect()->to('/admin');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[2]|max_length[255]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'title' => 'required|min_length[2]|max_length[255]',
                'summary' => 'required|min_length[10]',
                'password' => 'required|min_length[6]',
                'confirm_password' => 'required|matches[password]'
            ];

            if ($this->validate($rules)) {
                $userData = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'title' => $this->request->getPost('title'),
                    'phone' => $this->request->getPost('phone'),
                    'location' => $this->request->getPost('location'),
                    'summary' => $this->request->getPost('summary'),
                    'linkedin' => $this->request->getPost('linkedin'),
                    'github' => $this->request->getPost('github'),
                    'email' => $this->request->getPost('email'),
                    'facebook' => $this->request->getPost('facebook'),
                    'password' => $this->userModel->hashPassword($this->request->getPost('password'))
                ];

                $userId = $this->userModel->insert($userData);
                
                if ($userId) {
                    session()->setFlashdata('success', 'Resume setup completed successfully! You can now log in to manage your resume.');
                    return redirect()->to('/admin/login');
                } else {
                    session()->setFlashdata('error', 'Failed to create user. Please try again.');
                }
            } else {
                session()->setFlashdata('error', 'Please correct the errors below.');
            }
        }

        $data = [
            'title' => 'Setup Your Resume',
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('resume/setup', $data);
    }

    public function download()
    {
        $user = $this->userModel->getWithRelations(1);
        
        if (!$user) {
            return redirect()->to('/');
        }

        $data = [
            'user' => $user,
            'experience' => $user['experience'],
            'education' => $user['education'],
            'skills' => $this->skillsModel->getByCategory($user['id']),
            'projects' => $user['projects']
        ];

        // Generate PDF (you'll need to implement PDF generation)
        // For now, we'll just show a print-friendly version
        return view('resume/print', $data);
    }
} 