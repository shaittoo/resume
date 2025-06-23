<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ShainaPortfolioSeeder extends Seeder
{
    public function run()
    {
        // Create user profile
        $userData = [
            'name' => 'Shaina Marie D. Talisay',
            'email' => 'talisayshaina@gmail.com', // You can update this
            'password' => password_hash('password123', PASSWORD_DEFAULT), // Change this password
            'title' => 'Software Engineer',
            'phone' => '+63 9454038207', // Update with your actual phone
            'location' => 'Philippines',
            'summary' => 'Third-year computer science student and aspiring software engineer with three years of experience in web development. My passion for computer science brought me to the University of the Philippines Visayas, where I am pursuing my bachelor\'s degree. My primary focus is developing web projects, utilizing technologies such as HTML, CSS, JavaScript, PHP, SQL, and Java. Always eager to expand my skill set, I am currently delving into React and am open to learning new programming languages and frameworks.',
            'profile_image' => '1718773443997.jpg',
            'linkedin' => 'https://www.linkedin.com/in/shainatalisay/',
            'github' => 'https://github.com/shaittoo', 
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
                'company' => 'Ganaby Delivery',
                'position' => 'IT Support Specialist',
                'location' => 'Philippines',
                'start_date' => '2025-06-01',
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
                'company' => 'BlastAsia Inc.',
                'position' => 'Frontend Developer Intern',
                'location' => 'Philippines',
                'start_date' => '2024-07-01',
                'end_date' => '2024-08-31',
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
                'start_date' => '2022-06-01',
                'end_date' => '2026-05-31',
                'current' => 0,
                'description' => 'Studied computer science with focus on software engineering, algorithms, and web development.',
                'order_index' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'institution' => 'Mindanao State University - General Santos City',
                'degree' => 'Senior High School',
                'field_of_study' => 'STEM',
                'location' => 'Philippines',
                'start_date' => '2020-06-01',
                'end_date' => '2022-05-31',
                'current' => 0,
                'description' => 'Studied Science, Technology, Engineering and Mathematics.',
                'order_index' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'institution' => 'Mindanao State University - CETD',
                'degree' => 'Junior High School',
                'field_of_study' => 'STEM',
                'location' => 'Philippines',
                'start_date' => '2016-06-01',
                'end_date' => '2020-05-31',
                'current' => 0,
                'description' => 'Studied Science, Technology, Engineering and Mathematics.',
                'order_index' => 3,
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
            ['user_id' => $userId, 'name' => 'Dart', 'category' => 'Programming', 'proficiency' => 80, 'order_index' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Java', 'category' => 'Programming', 'proficiency' => 80, 'order_index' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Flutter', 'category' => 'Programming', 'proficiency' => 80, 'order_index' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Frameworks & Libraries
            ['user_id' => $userId, 'name' => 'React.js', 'category' => 'Framework', 'proficiency' => 85, 'order_index' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Node.js', 'category' => 'Framework', 'proficiency' => 80, 'order_index' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Typescript', 'category' => 'Framework', 'proficiency' => 75, 'order_index' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Bootstrap', 'category' => 'Framework', 'proficiency' => 90, 'order_index' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Bulma CSS', 'category' => 'Framework', 'proficiency' => 85, 'order_index' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Databases
            ['user_id' => $userId, 'name' => 'MySQL', 'category' => 'Database', 'proficiency' => 80, 'order_index' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'MongoDB', 'category' => 'Database', 'proficiency' => 75, 'order_index' => 11, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Firebase', 'category' => 'Database', 'proficiency' => 75, 'order_index' => 12, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // Tools & Technologies
            ['user_id' => $userId, 'name' => 'Git/GitHub', 'category' => 'Tools', 'proficiency' => 85, 'order_index' => 12, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'VS Code', 'category' => 'Tools', 'proficiency' => 90, 'order_index' => 13, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Figma', 'category' => 'Tools', 'proficiency' => 70, 'order_index' => 15, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Soft Skills
            ['user_id' => $userId, 'name' => 'Problem Solving', 'category' => 'Soft', 'proficiency' => 90, 'order_index' => 16, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Team Collaboration', 'category' => 'Soft', 'proficiency' => 85, 'order_index' => 17, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Communication', 'category' => 'Soft', 'proficiency' => 80, 'order_index' => 18, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Time Management', 'category' => 'Soft', 'proficiency' => 85, 'order_index' => 19, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Project Management', 'category' => 'Soft', 'proficiency' => 80, 'order_index' => 20, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // Languages
            ['user_id' => $userId, 'name' => 'English', 'category' => 'Language', 'proficiency' => 95, 'order_index' => 20, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Filipino', 'category' => 'Language', 'proficiency' => 100, 'order_index' => 21, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ];

        $this->db->table('skills')->insertBatch($skillsData);

        // Add projects
        $projectsData = [
            
            [
                'user_id' => $userId,
                'title' => 'OMS',
                'description' => 'The Organization Management System (OMS) is a comprehensive web-based platform designed to streamline and manage the operations of organizations, clubs, or institutions. It integrates various features to enhance organizational efficiency, foster collaboration, and simplify administrative tasks.',
                'technologies' => 'React.js, Node.js, Express.js, Sprint Planning, Project Management, Task Management, Kanban Board, Gantt Chart, FullStack, MongoDB, Firebase, MySQL, Git/GitHub, VS Code, Figma, Problem Solving, Team Collaboration, Communication, Time Management, Project Management',
                'image' => 'oms.jpg',
                'live_url' => 'https://omsapp.vercel.app/',
                'github_url' => 'https://github.com/shaittoo/OMS',
                'start_date' => '2023-03-01',
                'end_date' => '2023-04-30',
                'featured' => 1,
                'order_index' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'AIdentify',
                'description' => 'The game mimics a social media platform where players will be able to scroll through the feed and encounter various posts typically seen in social media such as text, videos, photos, and advertisements.

Each post will include a button to report the post as AI or not, or swipe left/right, depending on their answer. The game options, notifications, etc will blend together on the mimicked platform.

Tabs will be included, which will allow the user to navigate among the screens of the game. The screens of the game will include a feed, which contains the social media posts, the news, which will display the current events on the game.',
                'technologies' => 'UI/UX Design, Figma, QA',
                'image' => 'aidentify.jpg',
                'live_url' => 'https://www.figma.com/design/3M8N1zlgJnwB4qrxnJAFrg/Design-Components?node-id=0-1&p=f&t=2WdGo7hx8gfEKV50-0',
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
                'title' => 'BackinUP',
                'description' => 'BackinUP is a platform for alumni to maintain a relationship with the university. This will facilitate communication, networking, and collaboration between alumni, current students, facility, and staff.',
                'technologies' => 'PHP, HTML5, CSS3, SQL, Figma, UI/UX Design',
                'image' => 'backinup.jpg',
                'live_url' => 'http://localhost:8080',
                'github_url' => 'https://github.com/shaittoo/alumnirelations',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'featured' => 1,
                'order_index' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'Miagao Service Finder',
                'description' => 'Miagao Service Finder is a platform to help people to locate a wide range of services in Miagao, Iloilo.',
                'technologies' => 'PHP, CodeIgniter 4, MySQL, JavaScript',
                'image' => 'servicefinder.jpg',
                'live_url' => 'https://miservicefinder.000webhostapp.com/',
                'github_url' => 'https://github.com/shaittoo/servicefinder',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'featured' => 1,
                'order_index' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'TedX UPV',
                'description' => 'Welcome to TedX UPV! We unite innovators, thinkers, and leaders to share inspiring ideas. Our events feature speakers like Luke Espiritu, Dr. Majid Fotuhi, and Sha Nacino, covering topics from technology and education to culture and creativity. Visit our website to explore past talks, discover upcoming events, and join us in spreading ideas that matter.',
                'technologies' => 'React Typescript, Tailwind CSS, Figma, UI/UX Design, Next.js, Node.js, Express.js, MongoDB, Firebase, MySQL, Git/GitHub, VS Code, Figma, Problem Solving, Team Collaboration, Communication, Time Management, Project Management',
                'image' => 'tedx.jpg',
                'live_url' => 'https://shainaportfolio.000webhostapp.com/',
                'github_url' => 'https://github.com/ezerssss/tedxupv',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'featured' => 1,
                'order_index' => 6, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'UPV DPSM',
                'description' => 'The official website of the University of the Philippines Visayas\' Division of Physical Sciences and Mathematics, designed to provide students, faculty, and staff with easy access to essential information, resources, and updates.',
                'technologies' => 'PHP, CodeIgniter 4, MySQL, JavaScript',
                'image' => 'upvdpsm.jpg',
                'live_url' => 'https://shainaportfolio.000webhostapp.com/',
                'github_url' => 'https://github.com/shaittoo/shainaportfolio',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'featured' => 1,
                'order_index' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'WakeApp',
                'description' => 'A mobile app that helps users avoid missing their stop by setting an alarm based on a destination.
The app uses GPS to track the user\'s location and triggers a custom alert when they are close to
their selected stop or location.',
                'technologies' => 'Dart, Flutter, Hive, Google Maps API, Figma, UI/UX Design',
                'image' => 'wakeapp.jpg',
                'live_url' => 'https://shainaportfolio.000webhostapp.com/',
                'github_url' => 'https://github.com/shaittoo/wakeapp',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'featured' => 1,
                'order_index' => 8, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'PlanIt',
                'description' => 'PlanIt is a minimalist mobile application built with Flutter, designed to help students easily create their college schedules. By inputting course details such as name, type, start and end times, weekly frequency, location, or instructor, users can easily visualize and organize their class timetable once it is reflected on the customizable schedule table.

Students often struggle to share their timetables in a visually engaging format, often resorting to manually designing schedules using generic tools like Excel or Canva. This process can be time-consuming and inefficient, especially when changes occur, requiring them to update and redistribute their schedules repeatedly.

With PlanIt, schedule making is more accessible than ever with just a simple tap on your mobile phones.',
                'technologies' => 'Flutter, Hive, Figma, UI/UX Design, Dart',
                'image' => 'planit.jpg',
                'live_url' => 'https://drive.google.com/file/d/1UJtmlKGkie6wQC-HZbIwy-p7t9DsgmOR/view',
                'github_url' => 'https://github.com/shaittoo/PlanIt',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'featured' => 1,
                'order_index' => 9,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s') 
            ],
            [
                'user_id' => $userId,
                'title' => 'eHalalan',
                'description' => 'eHalalan is a decentralized voting system designed specifically for Philippine national and senatorial elections. The goal of this project is to provide a more secure, transparent, and efficient way for citizens to cast their votes.

eHalalan introduces a blockchain-powered voting system designed to solve the challenges faced by traditional election processes. By leveraging blockchain technology, eHalalan ensures that every vote cast is tamper-proof and transparent. Using smart contracts, the system automates vote counting and ensures accurate, real-time results. This eliminates manual errors and speeds up result reporting.',
                'technologies' => 'Tailwind CSS, React.js, Solidity, Web3.js, Next.js, Node.js, Express.js, MongoDB, Firebase, MySQL, Git/GitHub, VS Code, Figma, Problem Solving, Team Collaboration, Communication, Time Management, Project Management',
                'image' => 'eHalalan.jpg',
                'live_url' => 'https://ehalalan.vercel.app/',
                'github_url' => 'https://github.com/eHalalan/ehalalan',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'featured' => 1,
                'order_index' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'Kuseena',
                'description' => 'Kuseena is a mobile application that helps you find a recipe easier.',
                'technologies' => 'UI/UX Design, Figma, QA',
                'image' => 'kuseena.jpg',
                'live_url' => 'https://shainaportfolio.000webhostapp.com/',     
                'github_url' => 'https://www.figma.com/design/gCrqehdSEvOXKpLMlE1lwx/Kuseena?node-id=237-2386&p=f&t=lTqcHs9BE1f6a1x7-0',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'featured' => 1,
                'order_index' => 11,
                'created_at' => date('Y-m-d H:i:s'),        
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('projects')->insertBatch($projectsData);
    }
} 