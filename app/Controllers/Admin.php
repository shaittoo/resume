<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ExperienceModel;
use App\Models\EducationModel;
use App\Models\SkillsModel;
use App\Models\ProjectsModel;

class Admin extends BaseController
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
        // Assuming user ID 1 for a single-user portfolio
        $userId = 1;
        $user = $this->userModel->getWithRelations($userId);

        if (!$user) {
            // If no user exists, redirect to setup page
            return redirect()->to('/setup');
        }

        $data = [
            'title' => 'Admin Dashboard',
            'user' => $user,
            'stats' => [
                'experience_count' => count($user['experience']),
                'education_count' => count($user['education']),
                'skills_count' => count($user['skills']),
                'projects_count' => count($user['projects'])
            ]
        ];

        return view('admin/dashboard', $data);
    }

    public function profile()
    {
        // Assuming user ID 1
        $userId = 1;
        $user = $this->userModel->find($userId);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[2]|max_length[255]',
                'email' => 'required|valid_email|is_unique[users.email,id,' . $userId . ']',
                'title' => 'required|min_length[2]|max_length[255]',
                'summary' => 'required|min_length[10]',
                'linkedin' => 'permit_empty|valid_url_strict',
                'github' => 'permit_empty|valid_url_strict',
                'email' => 'permit_empty|valid_url_strict',
                'facebook' => 'permit_empty|valid_url_strict',
                'profile_image' => 'permit_empty|uploaded[profile_image]|max_size[profile_image,2048]|is_image[profile_image]'
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
                    'facebook' => $this->request->getPost('facebook')
                ];

                $img = $this->request->getFile('profile_image');
                if ($img && $img->isValid() && !$img->hasMoved()) {
                    // Delete old image if it exists
                    if (!empty($user['profile_image'])) {
                        $oldImagePath = FCPATH . 'uploads/profile_images/' . $user['profile_image'];
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $newName = $img->getRandomName();
                    $img->move(FCPATH . 'uploads/profile_images', $newName);
                    $userData['profile_image'] = $newName;
                }

                if ($this->userModel->update($userId, $userData)) {
                    session()->setFlashdata('success', 'Profile updated successfully!');
                    return redirect()->to('/admin/profile');
                } else {
                    session()->setFlashdata('error', 'Failed to update profile. Please try again.');
                }
            } else {
                session()->setFlashdata('error', 'Please correct the errors below.');
            }
        }

        $data = [
            'title' => 'Edit Profile',
            'user' => $user,
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('admin/profile', $data);
    }

    public function experience()
    {
        // Assuming user ID 1
        $userId = 1;
        $experiences = $this->experienceModel->getByUserId($userId);

        $data = [
            'title' => 'Manage Experience',
            'experiences' => $experiences
        ];

        return view('admin/experience', $data);
    }

    public function addExperience()
    {
        if ($this->request->getMethod() === 'post') {
            // Assuming user ID 1
            $userId = 1;
            
            $experienceData = [
                'user_id' => $userId,
                'company' => $this->request->getPost('company'),
                'position' => $this->request->getPost('position'),
                'location' => $this->request->getPost('location'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'current' => $this->request->getPost('current') ? 1 : 0,
                'description' => $this->request->getPost('description'),
                'achievements' => $this->request->getPost('achievements'),
                'order_index' => $this->request->getPost('order_index') ?? 0
            ];

            if ($this->experienceModel->insert($experienceData)) {
                session()->setFlashdata('success', 'Experience added successfully!');
                return redirect()->to('/admin/experience');
            } else {
                session()->setFlashdata('error', 'Failed to add experience. Please try again.');
            }
        }

        $data = [
            'title' => 'Add Experience',
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('admin/add_experience', $data);
    }

    public function editExperience($id)
    {
        // Assuming user ID 1
        $userId = 1;
        $experience = $this->experienceModel->where('id', $id)->where('user_id', $userId)->first();

        if (!$experience) {
            return redirect()->to('/admin/experience');
        }

        if ($this->request->getMethod() === 'post') {
            $experienceData = [
                'company' => $this->request->getPost('company'),
                'position' => $this->request->getPost('position'),
                'location' => $this->request->getPost('location'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'current' => $this->request->getPost('current') ? 1 : 0,
                'description' => $this->request->getPost('description'),
                'achievements' => $this->request->getPost('achievements'),
                'order_index' => $this->request->getPost('order_index') ?? 0
            ];

            if ($this->experienceModel->update($id, $experienceData)) {
                session()->setFlashdata('success', 'Experience updated successfully!');
                return redirect()->to('/admin/experience');
            } else {
                session()->setFlashdata('error', 'Failed to update experience. Please try again.');
            }
        }

        $data = [
            'title' => 'Edit Experience',
            'experience' => $experience,
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('admin/edit_experience', $data);
    }

    public function deleteExperience($id)
    {
        // Assuming user ID 1
        $userId = 1;
        $experience = $this->experienceModel->where('id', $id)->where('user_id', $userId)->first();

        if ($experience && $this->experienceModel->delete($id)) {
            session()->setFlashdata('success', 'Experience deleted successfully!');
        } else {
            session()->setFlashdata('error', 'Failed to delete experience.');
        }

        return redirect()->to('/admin/experience');
    }

    public function education()
    {
        // Assuming user ID 1
        $userId = 1;
        $education = $this->educationModel->getByUserId($userId);

        $data = [
            'title' => 'Manage Education',
            'education' => $education
        ];

        return view('admin/education', $data);
    }

    public function addEducation()
    {
        if ($this->request->getMethod() === 'post') {
            $educationData = [
                'user_id' => 1,
                'institution' => $this->request->getPost('institution'),
                'degree' => $this->request->getPost('degree'),
                'field_of_study' => $this->request->getPost('field_of_study'),
                'location' => $this->request->getPost('location'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'current' => $this->request->getPost('current') ? 1 : 0,
                'gpa' => $this->request->getPost('gpa'),
                'description' => $this->request->getPost('description'),
                'order_index' => $this->request->getPost('order_index') ?? 0
            ];

            if ($this->educationModel->insert($educationData)) {
                session()->setFlashdata('success', 'Education added successfully!');
                return redirect()->to('/admin/education');
            } else {
                session()->setFlashdata('error', 'Failed to add education. Please try again.');
            }
        }

        $data = [
            'title' => 'Add Education',
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('admin/add_education', $data);
    }

    public function editEducation($id)
    {
        $education = $this->educationModel->where('id', $id)->where('user_id', 1)->first();

        if (!$education) {
            return redirect()->to('/admin/education');
        }

        if ($this->request->getMethod() === 'post') {
            $educationData = [
                'institution' => $this->request->getPost('institution'),
                'degree' => $this->request->getPost('degree'),
                'field_of_study' => $this->request->getPost('field_of_study'),
                'location' => $this->request->getPost('location'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'current' => $this->request->getPost('current') ? 1 : 0,
                'gpa' => $this->request->getPost('gpa'),
                'description' => $this->request->getPost('description'),
                'order_index' => $this->request->getPost('order_index') ?? 0
            ];

            if ($this->educationModel->update($id, $educationData)) {
                session()->setFlashdata('success', 'Education updated successfully!');
                return redirect()->to('/admin/education');
            } else {
                session()->setFlashdata('error', 'Failed to update education. Please try again.');
            }
        }

        $data = [
            'title' => 'Edit Education',
            'education' => $education,
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('admin/edit_education', $data);
    }

    public function deleteEducation($id)
    {
        $education = $this->educationModel->where('id', $id)->where('user_id', 1)->first();

        if ($education && $this->educationModel->delete($id)) {
            session()->setFlashdata('success', 'Education deleted successfully!');
        } else {
            session()->setFlashdata('error', 'Failed to delete education.');
        }

        return redirect()->to('/admin/education');
    }

    public function skills()
    {
        // Assuming user ID 1
        $userId = 1;
        $skills = $this->skillsModel->getByCategory($userId);

        $data = [
            'title' => 'Manage Skills',
            'skills' => $skills,
            'categories' => $this->skillsModel->getCategories()
        ];

        return view('admin/skills', $data);
    }

    public function addSkill()
    {
        if ($this->request->getMethod() === 'post') {
            $skillData = [
                'user_id' => 1,
                'name' => $this->request->getPost('name'),
                'category' => $this->request->getPost('category'),
                'proficiency' => $this->request->getPost('proficiency'),
                'order_index' => $this->request->getPost('order_index') ?? 0
            ];

            if ($this->skillsModel->insert($skillData)) {
                session()->setFlashdata('success', 'Skill added successfully!');
                return redirect()->to('/admin/skills');
            } else {
                session()->setFlashdata('error', 'Failed to add skill. Please try again.');
            }
        }

        $data = [
            'title' => 'Add Skill',
            'categories' => $this->skillsModel->getCategories(),
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('admin/add_skill', $data);
    }

    public function editSkill($id)
    {
        $skill = $this->skillsModel->where('id', $id)->where('user_id', 1)->first();

        if (!$skill) {
            return redirect()->to('/admin/skills');
        }

        if ($this->request->getMethod() === 'post') {
            $skillData = [
                'name' => $this->request->getPost('name'),
                'category' => $this->request->getPost('category'),
                'proficiency' => $this->request->getPost('proficiency'),
                'order_index' => $this->request->getPost('order_index') ?? 0
            ];

            if ($this->skillsModel->update($id, $skillData)) {
                session()->setFlashdata('success', 'Skill updated successfully!');
                return redirect()->to('/admin/skills');
            } else {
                session()->setFlashdata('error', 'Failed to update skill. Please try again.');
            }
        }

        $data = [
            'title' => 'Edit Skill',
            'skill' => $skill,
            'categories' => $this->skillsModel->getCategories(),
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('admin/edit_skill', $data);
    }

    public function deleteSkill($id)
    {
        $skill = $this->skillsModel->where('id', $id)->where('user_id', 1)->first();

        if ($skill && $this->skillsModel->delete($id)) {
            session()->setFlashdata('success', 'Skill deleted successfully!');
        } else {
            session()->setFlashdata('error', 'Failed to delete skill.');
        }

        return redirect()->to('/admin/skills');
    }

    public function projects()
    {
        // Assuming user ID 1
        $userId = 1;
        $projects = $this->projectsModel->getByUserId($userId);

        $data = [
            'title' => 'Manage Projects',
            'projects' => $projects
        ];

        return view('admin/projects', $data);
    }

    public function addProject()
    {
        if ($this->request->getMethod() === 'post') {
            $projectData = [
                'user_id' => 1,
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'technologies' => $this->request->getPost('technologies'),
                'live_url' => $this->request->getPost('live_url'),
                'github_url' => $this->request->getPost('github_url'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'featured' => $this->request->getPost('featured') ? 1 : 0,
                'order_index' => $this->request->getPost('order_index') ?? 0
            ];

            if ($this->projectsModel->insert($projectData)) {
                session()->setFlashdata('success', 'Project added successfully!');
                return redirect()->to('/admin/projects');
            } else {
                session()->setFlashdata('error', 'Failed to add project. Please try again.');
            }
        }

        $data = [
            'title' => 'Add Project',
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('admin/add_project', $data);
    }

    public function editProject($id)
    {
        $project = $this->projectsModel->where('id', $id)->where('user_id', 1)->first();

        if (!$project) {
            return redirect()->to('/admin/projects');
        }

        if ($this->request->getMethod() === 'post') {
            $projectData = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'technologies' => $this->request->getPost('technologies'),
                'live_url' => $this->request->getPost('live_url'),
                'github_url' => $this->request->getPost('github_url'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'featured' => $this->request->getPost('featured') ? 1 : 0,
                'order_index' => $this->request->getPost('order_index') ?? 0
            ];

            if ($this->projectsModel->update($id, $projectData)) {
                session()->setFlashdata('success', 'Project updated successfully!');
                return redirect()->to('/admin/projects');
            } else {
                session()->setFlashdata('error', 'Failed to update project. Please try again.');
            }
        }

        $data = [
            'title' => 'Edit Project',
            'project' => $project,
            'validation' => $this->validator ?? \Config\Services::validation()
        ];

        return view('admin/edit_project', $data);
    }

    public function deleteProject($id)
    {
        $project = $this->projectsModel->where('id', $id)->where('user_id', 1)->first();

        if ($project && $this->projectsModel->delete($id)) {
            session()->setFlashdata('success', 'Project deleted successfully!');
        } else {
            session()->setFlashdata('error', 'Failed to delete project.');
        }

        return redirect()->to('/admin/projects');
    }
} 