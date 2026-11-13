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
            'email' => 'talisayshaina8@gmail.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT), // Change this password
            'title' => 'Software Engineer',
            'phone' => '+63 9283051386',
            'location' => 'Philippines',
            'summary' => 'Software Engineer with a BS in Computer Science from the University of the Philippines Visayas. Most recently I rebuilt bettarservices.com as the sole developer (Next.js, TypeScript, Tailwind CSS, Firestore on Vercel), covering the product catalog, lead capture, and technical SEO. My work spans full-stack web development, blockchain systems (Hyperledger Fabric), and applied AI (retrieval-augmented generation), and I have led small teams as project manager on several builds.',
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
                'company' => 'Bettar Appliance Master',
                'position' => 'Software Developer',
                'location' => 'Philippines',
                'start_date' => '2025-10-01',
                'end_date' => '2026-11-30',
                'current' => 0,
                'description' => 'Sole developer for bettarservices.com, an appliance sales, service, and home repair business.',
                'achievements' => "Rebuilt bettarservices.com as the only developer using Next.js, TypeScript, and Tailwind CSS on Vercel; the site had about 5,800 users from January to September 2026\nBuilt a Firestore-backed appliance catalog and project gallery with an admin interface, rendering product pages server-side through the Firestore REST API\nIntegrated lead capture (EmailJS contact form, Jobber service-request embed) and a live Google reviews carousel via the Places API\nImplemented technical SEO (next-sitemap, canonical URLs, 301 redirects, JSON-LD Article schema) and managed domains, DNS (EasyDNS), and hosting migrations across multiple business sites",
                'order_index' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'company' => 'Ganaby Delivery',
                'position' => 'IT Support Intern',
                'location' => 'Philippines',
                'start_date' => '2025-06-01',
                'end_date' => '2025-08-31',
                'current' => 0,
                'description' => 'IT support for staff across internal systems.',
                'achievements' => "Resolved software, hardware, and network issues for staff across internal systems",
                'order_index' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'company' => 'Department of Science and Technology - Region VI',
                'position' => 'Full Stack Developer Intern',
                'location' => 'Philippines',
                'start_date' => '2025-06-06',
                'end_date' => '2025-07-18',
                'current' => 0,
                'description' => 'Built a Client Satisfaction Measurement (CSM) system used across DOST Region VI provincial offices.',
                'achievements' => "Architected the backend and database layer (CodeIgniter 4, MySQL) for the Client Satisfaction Measurement system\nBuilt multi-step service feedback forms, service CRUD with filtering, and target-transaction tracking by office, section, and type, with Postman test suites covering all endpoints\nDeveloped the reporting suite: automated ARTA-compliant CSM scoring across 8 Service Quality Dimensions, Citizen's Charter compliance tracking, demographic breakdowns, and PDF/Excel/print export",
                'order_index' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'company' => 'BlastAsia, Inc.',
                'position' => 'Frontend Developer Intern',
                'location' => 'Philippines',
                'start_date' => '2024-07-01',
                'end_date' => '2024-08-31',
                'current' => 0,
                'description' => 'Frontend development on client web applications.',
                'achievements' => "Built responsive web interfaces and integrated backend APIs using React, TypeScript, and Xamun\nTranslated Figma mockups from the UI/UX team into reusable components",
                'order_index' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('experience')->insertBatch($experienceData);

        // Add education
        $educationData = [
            [
                'user_id' => $userId,
                'institution' => 'University of the Philippines Visayas',
                'degree' => 'Bachelor of Science',
                'field_of_study' => 'Computer Science',
                'location' => 'Miagao, Iloilo',
                'start_date' => '2022-08-01',
                'end_date' => '2026-07-31',
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
                'location' => 'General Santos City, South Cotabato',
                'start_date' => '2020-06-01',
                'end_date' => '2022-05-31',
                'current' => 0,
                'description' => 'Science, Technology, Engineering, and Mathematics strand. Graduated With Honors.',
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
            // Languages
            ['user_id' => $userId, 'name' => 'TypeScript', 'category' => 'Languages', 'proficiency' => 85, 'order_index' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'JavaScript', 'category' => 'Languages', 'proficiency' => 90, 'order_index' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Python', 'category' => 'Languages', 'proficiency' => 80, 'order_index' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'PHP', 'category' => 'Languages', 'proficiency' => 80, 'order_index' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'SQL', 'category' => 'Languages', 'proficiency' => 85, 'order_index' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Dart', 'category' => 'Languages', 'proficiency' => 75, 'order_index' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'HTML/CSS', 'category' => 'Languages', 'proficiency' => 95, 'order_index' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // Frameworks & Libraries
            ['user_id' => $userId, 'name' => 'React', 'category' => 'Frameworks & Libraries', 'proficiency' => 90, 'order_index' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Next.js', 'category' => 'Frameworks & Libraries', 'proficiency' => 85, 'order_index' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Node.js/Express', 'category' => 'Frameworks & Libraries', 'proficiency' => 80, 'order_index' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'FastAPI', 'category' => 'Frameworks & Libraries', 'proficiency' => 70, 'order_index' => 11, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Prisma', 'category' => 'Frameworks & Libraries', 'proficiency' => 75, 'order_index' => 12, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Tailwind CSS', 'category' => 'Frameworks & Libraries', 'proficiency' => 90, 'order_index' => 13, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Bootstrap', 'category' => 'Frameworks & Libraries', 'proficiency' => 85, 'order_index' => 14, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Bulma', 'category' => 'Frameworks & Libraries', 'proficiency' => 80, 'order_index' => 15, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'CodeIgniter', 'category' => 'Frameworks & Libraries', 'proficiency' => 80, 'order_index' => 16, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Flutter', 'category' => 'Frameworks & Libraries', 'proficiency' => 75, 'order_index' => 17, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // Databases & Cloud
            ['user_id' => $userId, 'name' => 'MySQL', 'category' => 'Databases & Cloud', 'proficiency' => 80, 'order_index' => 18, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Firebase (Firestore)', 'category' => 'Databases & Cloud', 'proficiency' => 85, 'order_index' => 19, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'SQLite', 'category' => 'Databases & Cloud', 'proficiency' => 75, 'order_index' => 20, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Hive', 'category' => 'Databases & Cloud', 'proficiency' => 75, 'order_index' => 21, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Vercel', 'category' => 'Databases & Cloud', 'proficiency' => 85, 'order_index' => 22, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'AWS SDK', 'category' => 'Databases & Cloud', 'proficiency' => 65, 'order_index' => 23, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // AI/ML
            ['user_id' => $userId, 'name' => 'Retrieval-Augmented Generation (RAG)', 'category' => 'AI/ML', 'proficiency' => 75, 'order_index' => 24, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Embeddings & Vector Search (ChromaDB)', 'category' => 'AI/ML', 'proficiency' => 75, 'order_index' => 25, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Cross-encoder Reranking', 'category' => 'AI/ML', 'proficiency' => 70, 'order_index' => 26, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'RAGAS Evaluation', 'category' => 'AI/ML', 'proficiency' => 65, 'order_index' => 27, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // Blockchain
            ['user_id' => $userId, 'name' => 'Hyperledger Fabric', 'category' => 'Blockchain', 'proficiency' => 75, 'order_index' => 28, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Solidity', 'category' => 'Blockchain', 'proficiency' => 65, 'order_index' => 29, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Hardhat', 'category' => 'Blockchain', 'proficiency' => 65, 'order_index' => 30, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // DevOps & Tools
            ['user_id' => $userId, 'name' => 'Docker / Docker Compose', 'category' => 'DevOps & Tools', 'proficiency' => 75, 'order_index' => 31, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Nginx', 'category' => 'DevOps & Tools', 'proficiency' => 70, 'order_index' => 32, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Linux', 'category' => 'DevOps & Tools', 'proficiency' => 75, 'order_index' => 33, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Git', 'category' => 'DevOps & Tools', 'proficiency' => 85, 'order_index' => 34, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Postman', 'category' => 'DevOps & Tools', 'proficiency' => 80, 'order_index' => 35, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'GA4 & Google Search Console', 'category' => 'DevOps & Tools', 'proficiency' => 75, 'order_index' => 36, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Figma', 'category' => 'DevOps & Tools', 'proficiency' => 80, 'order_index' => 37, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // Soft Skills
            ['user_id' => $userId, 'name' => 'Project Management', 'category' => 'Soft Skills', 'proficiency' => 85, 'order_index' => 38, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Team Leadership', 'category' => 'Soft Skills', 'proficiency' => 80, 'order_index' => 39, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Problem Solving', 'category' => 'Soft Skills', 'proficiency' => 90, 'order_index' => 40, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Communication', 'category' => 'Soft Skills', 'proficiency' => 80, 'order_index' => 41, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            // Spoken Languages
            ['user_id' => $userId, 'name' => 'English', 'category' => 'Spoken Languages', 'proficiency' => 95, 'order_index' => 42, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Filipino', 'category' => 'Spoken Languages', 'proficiency' => 100, 'order_index' => 43, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('skills')->insertBatch($skillsData);

        // Add projects
        $projectsData = [
            [
                'user_id' => $userId,
                'title' => 'eCASVote',
                'description' => 'A hybrid paper-ballot and blockchain election system for the UPV CAS Student Council. I led a 3-person team as project manager and built the full-stack architecture: Hyperledger Fabric chaincode, a Node.js/Express + Prisma gateway API, a Next.js frontend, and a Python/OpenCV OMR service for automated ballot scanning.

The frontend and OMR service are containerized with multi-stage Docker builds and Docker Compose, and the 3-org Fabric network runs on a Debian LAN server behind an Nginx reverse proxy. An automated integrity-verification script checks ledger-database consistency and double-voting prevention against the live network, alongside fault-injection tests (node failures, tampered records).',
                'technologies' => 'Hyperledger Fabric, Node.js, Express, Prisma, Next.js, Python, OpenCV, Docker, Nginx',
                'image' => null,
                'live_url' => null,
                'github_url' => null,
                'start_date' => '2025-06-01',
                'end_date' => '2026-06-30',
                'featured' => 1,
                'order_index' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'Manu',
                'description' => 'A two-stage RAG chatbot over product manuals. Uses ChromaDB vector retrieval with MiniLM embeddings and cross-encoder reranking, Phi-3-mini/Qwen-2.5 for generation, and an FFN classifier that routes each query to the right manual.',
                'technologies' => 'Python, RAG, ChromaDB, MiniLM, Cross-encoder Reranking, Phi-3-mini, Qwen-2.5',
                'image' => null,
                'live_url' => null,
                'github_url' => null,
                'start_date' => '2026-05-01',
                'end_date' => '2026-05-31',
                'featured' => 1,
                'order_index' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'Trace',
                'description' => 'A tax-incentive application tracking platform for investors and government offices, built at the 2025 Iloilo Province Startup Hackathon. Features a status-stage dashboard for tracking applications and an OpenAI-powered chatbot.',
                'technologies' => 'Full Stack, OpenAI API, Dashboard, Project Management',
                'image' => null,
                'live_url' => 'https://trace-chi.vercel.app/',
                'github_url' => null,
                'start_date' => '2025-09-01',
                'end_date' => '2025-09-30',
                'featured' => 1,
                'order_index' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'OMS',
                'description' => 'A platform for student organizations covering authentication and roles, organization and member management, events, and tasks. I led end-to-end development.',
                'technologies' => 'Next.js, React, TypeScript, Firebase, AWS SDK',
                'image' => 'oms.jpg',
                'live_url' => 'https://omsapp.vercel.app/',
                'github_url' => 'https://github.com/shaittoo/OMS',
                'start_date' => '2024-09-01',
                'end_date' => '2025-05-31',
                'featured' => 1,
                'order_index' => 5,
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
                'github_url' => null,
                'start_date' => '2024-08-01',
                'end_date' => '2024-09-30',
                'featured' => 0,
                'order_index' => 9,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'BackinUP',
                'description' => 'BackinUP is a platform for alumni to maintain a relationship with the university. This will facilitate communication, networking, and collaboration between alumni, current students, facility, and staff.',
                'technologies' => 'PHP, HTML5, CSS3, SQL, Figma, UI/UX Design',
                'image' => 'backinup.jpg',
                'live_url' => null,
                'github_url' => 'https://github.com/shaittoo/alumnirelations',
                'start_date' => '2024-04-01',
                'end_date' => '2024-05-31',
                'featured' => 1,
                'order_index' => 11,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'Miagao Service Finder',
                'description' => 'Miagao Service Finder is a platform to help people to locate a wide range of services in Miagao, Iloilo.',
                'technologies' => 'PHP, CodeIgniter 4, MySQL, JavaScript',
                'image' => 'servicefinder.jpg',
                'live_url' => null,
                'github_url' => 'https://github.com/shaittoo/servicefinder',
                'start_date' => '2024-04-01',
                'end_date' => '2024-05-31',
                'featured' => 1,
                'order_index' => 12,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'TedX UPV',
                'description' => 'Welcome to TedX UPV! We unite innovators, thinkers, and leaders to share inspiring ideas. Our events feature speakers like Luke Espiritu, Dr. Majid Fotuhi, and Sha Nacino, covering topics from technology and education to culture and creativity. Visit our website to explore past talks, discover upcoming events, and join us in spreading ideas that matter.',
                'technologies' => 'React Typescript, Tailwind CSS, Figma, UI/UX Design, Next.js, Node.js, Express.js, MongoDB, Firebase, MySQL, Git/GitHub, VS Code, Figma, Problem Solving, Team Collaboration, Communication, Time Management, Project Management',
                'image' => 'tedx.jpg',
                'live_url' => null,
                'github_url' => 'https://github.com/ezerssss/tedxupv',
                'start_date' => '2023-09-01',
                'end_date' => '2023-11-30',
                'featured' => 1,
                'order_index' => 13, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'UPV DPSM',
                'description' => 'The official website of the University of the Philippines Visayas\' Division of Physical Sciences and Mathematics, designed to provide students, faculty, and staff with easy access to essential information, resources, and updates.',
                'technologies' => 'PHP, CodeIgniter 4, MySQL, JavaScript',
                'image' => 'upvdpsm.jpg',
                'live_url' => 'https://upvdpsm.com/',
                'github_url' => 'https://github.com/shaittoo/shainaportfolio',
                'start_date' => '2024-02-01',
                'end_date' => '2024-04-30',
                'featured' => 1,
                'order_index' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'WakeApp',
                'description' => 'A mobile app that helps users avoid missing their stop by setting an alarm based on a destination.
The app uses GPS to track the user\'s location and triggers a custom alert when they are close to
their selected stop or location.',
                'technologies' => 'Flutter, Dart, Hive, Google Maps API, GPS',
                'image' => 'wakeapp.jpg',
                'live_url' => 'https://drive.google.com/file/d/1k7oNZYxs8SShbb6h__YZ_lf7Cnhu_mlk/view',
                'github_url' => 'https://github.com/shaittoo/wakeapp',
                'start_date' => '2025-05-01',
                'end_date' => '2025-05-31',
                'featured' => 1,
                'order_index' => 4, 
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
                'start_date' => '2025-03-01',
                'end_date' => '2025-04-30',
                'featured' => 1,
                'order_index' => 7,
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
                'start_date' => '2025-04-01',
                'end_date' => '2025-04-30',
                'featured' => 1,
                'order_index' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'title' => 'Kuseena',
                'description' => 'Kuseena is a mobile application that helps you find a recipe easier.',
                'technologies' => 'UI/UX Design, Figma, QA',
                'image' => 'kuseena.jpg',
                'live_url' => 'https://www.figma.com/design/gCrqehdSEvOXKpLMlE1lwx/Kuseena?node-id=237-2386&p=f&t=lTqcHs9BE1f6a1x7-0',
                'github_url' => null,
                'start_date' => '2024-09-01',
                'end_date' => '2024-12-31',
                'featured' => 1,
                'order_index' => 8,
                'created_at' => date('Y-m-d H:i:s'),        
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('projects')->insertBatch($projectsData);

        // Add certifications
        $certificationsData = [
            ['user_id' => $userId, 'name' => 'Google AI Essentials Specialization', 'issuer' => 'Coursera', 'issue_date' => '2026-11-01', 'credential_url' => null, 'order_index' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Google AI Professional Certificate', 'issuer' => 'Coursera', 'issue_date' => '2026-09-01', 'credential_url' => null, 'order_index' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['user_id' => $userId, 'name' => 'Google Project Management Professional Certificate', 'issuer' => 'Coursera', 'issue_date' => '2026-07-01', 'credential_url' => null, 'order_index' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('certifications')->insertBatch($certificationsData);
    }
} 