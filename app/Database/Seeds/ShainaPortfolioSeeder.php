<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ShainaPortfolioSeeder extends Seeder
{
    public function run()
    {
        // Create user profile
        $userData = [
            'name' => 'Shaina Talisay',
            'email' => 'talisayshaina@gmail.com', // You can update this
            'password' => password_hash('password123', PASSWORD_DEFAULT), // Change this password
            'title' => 'Software Engineer',
            'phone' => '+1 (555) 123-4567', // Update with your actual phone
            'location' => 'Philippines',
            'summary' => 'Passionate Software Engineer with expertise in web development, specializing in modern technologies and creating efficient, scalable solutions. Experienced in full-stack development with a focus on user experience and clean code practices.',
            'linkedin' => 'https://www.linkedin.com/in/shainatalisay/',
            'github' => 'https://github.com/shainatalisay', // Update with your GitHub
            'facebook' => 'https://www.facebook.com/shainamarietalisay/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('users')->insert($userData);
        $userId = $this->db->insertID();

        // Add experience
        $experienceData = [
            [
                'user_id' => $userId,
                'company' => 'Freelance',
                'position' => 'Software Engineer',
                'location' => 'Philippines',
                'start_date' => '2023-01-01',
                'end_date' => null,
                'current' => 1,
                'description' => 'Working on various web development projects, specializing in modern frameworks and technologies. Collaborating with clients to deliver high-quality, scalable solutions.',
                'achievements' => "• Developed responsive web applications using modern JavaScript frameworks\n• Implemented RESTful APIs and database integrations\n• Collaborated with cross-functional teams to deliver projects on time\n• Maintained and optimized existing codebases for better performance",
                'order_index' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'company' => 'Previous Company',
                'position' => 'Junior Developer',
                'location' => 'Philippines',
                'start_date' => '2022-01-01',
                'end_date' => '2022-12-31',
                'current' => 0,
                'description' => 'Started career in software development, working on web applications and learning modern development practices.',
                'achievements' => "• Assisted in developing web applications using HTML, CSS, and JavaScript\n• Learned modern development frameworks and tools\n• Participated in code reviews and team collaboration\n• Contributed to bug fixes and feature implementations",
                'order_index' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('experience')->insertBatch($experienceData);

        // Add education
        $educationData = [
            [
                'user_id' => $userId,
                'institution' => 'University of the Philippines',
                'degree' => 'Bachelor of Science',
                'field_of_study' => 'Computer Science',
                'location' => 'Philippines',
                'start_date' => '2018-06-01',
                'end_date' => '2022-05-31',
                'current' => 0,
                'description' => 'Studied computer science with focus on software engineering, algorithms, and web development.',
                'order_index' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('education')->insertBatch($educationData);

        // Add skills
        $skillsData = [
            // Programming Languages
            ['user_id' => $userId, 'name' => 'JavaScript', 'category' => 'Programming', 'proficiency' => 90, 'order_index' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Python', 'category' => 'Programming', 'proficiency' => 85, 'order_index' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'PHP', 'category' => 'Programming', 'proficiency' => 80, 'order_index' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'HTML/CSS', 'category' => 'Programming', 'proficiency' => 95, 'order_index' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Frameworks & Libraries
            ['user_id' => $userId, 'name' => 'React.js', 'category' => 'Framework', 'proficiency' => 85, 'order_index' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Node.js', 'category' => 'Framework', 'proficiency' => 80, 'order_index' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Express.js', 'category' => 'Framework', 'proficiency' => 75, 'order_index' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Bootstrap', 'category' => 'Framework', 'proficiency' => 90, 'order_index' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Bulma CSS', 'category' => 'Framework', 'proficiency' => 85, 'order_index' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Databases
            ['user_id' => $userId, 'name' => 'MySQL', 'category' => 'Database', 'proficiency' => 80, 'order_index' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'MongoDB', 'category' => 'Database', 'proficiency' => 75, 'order_index' => 11, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Tools & Technologies
            ['user_id' => $userId, 'name' => 'Git/GitHub', 'category' => 'Tools', 'proficiency' => 85, 'order_index' => 12, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'VS Code', 'category' => 'Tools', 'proficiency' => 90, 'order_index' => 13, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Postman', 'category' => 'Tools', 'proficiency' => 80, 'order_index' => 14, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Figma', 'category' => 'Tools', 'proficiency' => 70, 'order_index' => 15, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Soft Skills
            ['user_id' => $userId, 'name' => 'Problem Solving', 'category' => 'Soft', 'proficiency' => 90, 'order_index' => 16, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Team Collaboration', 'category' => 'Soft', 'proficiency' => 85, 'order_index' => 17, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Communication', 'category' => 'Soft', 'proficiency' => 80, 'order_index' => 18, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Time Management', 'category' => 'Soft', 'proficiency' => 85, 'order_index' => 19, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Languages
            ['user_id' => $userId, 'name' => 'English', 'category' => 'Language', 'proficiency' => 95, 'order_index' => 20, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Filipino', 'category' => 'Language', 'proficiency' => 100, 'order_index' => 21, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ];

        $this->db->table('skills')->insertBatch($skillsData);

        // Add projects
        $projectsData = [
            [
                'user_id' => $userId,
                'title' => 'E-Commerce Platform',
                'description' => 'A full-stack e-commerce platform built with React.js and Node.js. Features include user authentication, product management, shopping cart, and payment integration.',
                'technologies' => 'React.js, Node.js, Express.js, MongoDB, Stripe API',
                'live_url' => 'https://ecommerce-demo.com',
                'github_url' => 'https://github.com/shainatalisay/ecommerce-platform',
                'start_date' => '2023-06-01',
                'end_date' => '2023-08-31',
                'featured' => 1,
                'order_index' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'Task Management App',
                'description' => 'A responsive task management application with drag-and-drop functionality, user authentication, and real-time updates.',
                'technologies' => 'JavaScript, HTML5, CSS3, Local Storage, Bootstrap',
                'live_url' => 'https://task-manager-demo.com',
                'github_url' => 'https://github.com/shainatalisay/task-manager',
                'start_date' => '2023-03-01',
                'end_date' => '2023-04-30',
                'featured' => 1,
                'order_index' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'Weather Dashboard',
                'description' => 'A weather application that displays current weather and forecasts using external APIs. Features include location-based weather and 7-day forecasts.',
                'technologies' => 'JavaScript, Weather API, HTML5, CSS3, Fetch API',
                'live_url' => 'https://weather-dashboard-demo.com',
                'github_url' => 'https://github.com/shainatalisay/weather-app',
                'start_date' => '2023-01-01',
                'end_date' => '2023-02-28',
                'featured' => 0,
                'order_index' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'Portfolio Website',
                'description' => 'A modern, responsive portfolio website built with CodeIgniter 4 and Bulma CSS. Features include dynamic content management and admin panel.',
                'technologies' => 'PHP, CodeIgniter 4, Bulma CSS, MySQL, JavaScript',
                'live_url' => 'http://localhost:8080',
                'github_url' => 'https://github.com/shainatalisay/portfolio-website',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'featured' => 1,
                'order_index' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('projects')->insertBatch($projectsData);
    }
} 