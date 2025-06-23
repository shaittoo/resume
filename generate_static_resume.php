<?php
// Database configuration
$host = 'localhost';
$dbname = 'shainaresume_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get user data
    $stmt = $pdo->query("SELECT * FROM users LIMIT 1");
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        die("No user data found in database");
    }
    
    // Get experience data
    $stmt = $pdo->prepare("SELECT * FROM experience WHERE user_id = ? ORDER BY order_index ASC, start_date DESC");
    $stmt->execute([$user['id']]);
    $experience = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get education data
    $stmt = $pdo->prepare("SELECT * FROM education WHERE user_id = ? ORDER BY order_index ASC, start_date DESC");
    $stmt->execute([$user['id']]);
    $education = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get skills data
    $stmt = $pdo->prepare("SELECT * FROM skills WHERE user_id = ? ORDER BY order_index ASC, proficiency DESC");
    $stmt->execute([$user['id']]);
    $skills = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get projects data
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = ? ORDER BY order_index ASC, featured DESC");
    $stmt->execute([$user['id']]);
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Group skills by category
    $skillsByCategory = [];
    foreach ($skills as $skill) {
        $category = $skill['category'] ?? 'Other';
        if (!isset($skillsByCategory[$category])) {
            $skillsByCategory[$category] = [];
        }
        $skillsByCategory[$category][] = $skill;
    }
    
    // Generate HTML
    $html = generateHTML($user, $experience, $education, $skillsByCategory, $projects);
    
    // Save to file
    file_put_contents('index.html', $html);
    
    echo "Static resume generated successfully! Check index.html\n";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

function generateHTML($user, $experience, $education, $skillsByCategory, $projects) {
    $userName = htmlspecialchars($user['name']);
    $userSummary = htmlspecialchars($user['summary']);
    $userLinkedin = htmlspecialchars($user['linkedin'] ?? '');
    $userGithub = htmlspecialchars($user['github'] ?? '');
    $userFacebook = htmlspecialchars($user['facebook'] ?? '');
    
    // Generate experience HTML
    $experienceHTML = '';
    foreach ($experience as $exp) {
        $startDate = date('M Y', strtotime($exp['start_date']));
        $endDate = $exp['current'] ? 'Present' : date('M Y', strtotime($exp['end_date']));
        $dateRange = "$startDate - $endDate";
        
        $achievements = '';
        if (!empty($exp['achievements'])) {
            $achievementList = explode("\n", $exp['achievements']);
            foreach ($achievementList as $achievement) {
                $achievement = trim($achievement);
                if (!empty($achievement)) {
                    $achievements .= '<li>' . htmlspecialchars($achievement) . '</li>';
                }
            }
        }
        
        $experienceHTML .= '
            <div class="experience-item">
                <div class="experience-header">
                    <div>
                        <h3 class="experience-title">' . htmlspecialchars($exp['position']) . '</h3>
                        <p class="experience-company">' . htmlspecialchars($exp['company']) . '</p>
                    </div>
                    <div class="experience-date">' . $dateRange . '</div>
                </div>
                <p class="experience-description">' . htmlspecialchars($exp['description']) . '</p>';
        
        if (!empty($achievements)) {
            $experienceHTML .= '<ul class="experience-achievements">' . $achievements . '</ul>';
        }
        
        $experienceHTML .= '</div>';
    }
    
    // Generate skills HTML
    $skillsHTML = '';
    foreach ($skillsByCategory as $category => $skills) {
        $skillsHTML .= '
            <div class="skill-category">
                <h3>' . htmlspecialchars($category) . '</h3>';
        
        foreach ($skills as $skill) {
            $skillsHTML .= '
                <div class="skill-item">
                    <span class="skill-name">' . htmlspecialchars($skill['name']) . '</span>
                    <span class="skill-proficiency">' . htmlspecialchars($skill['proficiency']) . '</span>
                </div>';
        }
        
        $skillsHTML .= '</div>';
    }
    
    // Generate projects HTML
    $projectsHTML = '';
    foreach ($projects as $project) {
        $techTags = '';
        if (!empty($project['technologies'])) {
            $technologies = explode(',', $project['technologies']);
            foreach ($technologies as $tech) {
                $tech = trim($tech);
                if (!empty($tech)) {
                    $techTags .= '<span class="tech-tag">' . htmlspecialchars($tech) . '</span>';
                }
            }
        }
        
        $projectLinks = '';
        if (!empty($project['live_url'])) {
            $projectLinks .= '<a href="' . htmlspecialchars($project['live_url']) . '" class="project-link" target="_blank">Live Demo</a>';
        }
        if (!empty($project['github_url'])) {
            if (!empty($projectLinks)) $projectLinks .= ' ';
            $projectLinks .= '<a href="' . htmlspecialchars($project['github_url']) . '" class="project-link" target="_blank">GitHub</a>';
        }
        
        $projectsHTML .= '
            <div class="project-item">
                <h3 class="project-title">' . htmlspecialchars($project['title']) . '</h3>
                <p class="project-description">' . htmlspecialchars($project['description']) . '</p>';
        
        if (!empty($techTags)) {
            $projectsHTML .= '<div class="project-tech">' . $techTags . '</div>';
        }
        
        if (!empty($projectLinks)) {
            $projectsHTML .= '<div class="project-links">' . $projectLinks . '</div>';
        }
        
        $projectsHTML .= '</div>';
    }
    
    // Generate education HTML
    $educationHTML = '';
    foreach ($education as $edu) {
        $startDate = date('Y', strtotime($edu['start_date']));
        $endDate = $edu['current'] ? 'Present' : date('Y', strtotime($edu['end_date']));
        $dateRange = "$startDate - $endDate";
        
        $educationHTML .= '
            <div class="education-item">
                <div class="education-header">
                    <div>
                        <h3 class="education-degree">' . htmlspecialchars($edu['degree']) . '</h3>
                        <p class="education-school">' . htmlspecialchars($edu['school']) . '</p>
                    </div>
                    <div class="education-date">' . $dateRange . '</div>
                </div>
                <p class="education-description">' . htmlspecialchars($edu['description']) . '</p>
            </div>';
    }
    
    // Social links
    $socialLinks = '';
    if (!empty($userLinkedin)) {
        $socialLinks .= '
                <a href="' . $userLinkedin . '" target="_blank" class="social-cube">
                    <div class="social-cube-inner">
                        <div class="cube-face front"><i class="fab fa-linkedin"></i></div>
                        <div class="cube-face back"><i class="fab fa-linkedin"></i></div>
                        <div class="cube-face right"><i class="fab fa-linkedin"></i></div>
                        <div class="cube-face left"><i class="fab fa-linkedin"></i></div>
                        <div class="cube-face top"><i class="fab fa-linkedin"></i></div>
                        <div class="cube-face bottom"><i class="fab fa-linkedin"></i></div>
                    </div>
                </a>';
    }
    
    if (!empty($userGithub)) {
        $socialLinks .= '
                <a href="' . $userGithub . '" target="_blank" class="social-cube">
                    <div class="social-cube-inner">
                        <div class="cube-face front"><i class="fab fa-github"></i></div>
                        <div class="cube-face back"><i class="fab fa-github"></i></div>
                        <div class="cube-face right"><i class="fab fa-github"></i></div>
                        <div class="cube-face left"><i class="fab fa-github"></i></div>
                        <div class="cube-face top"><i class="fab fa-github"></i></div>
                        <div class="cube-face bottom"><i class="fab fa-github"></i></div>
                    </div>
                </a>';
    }
    
    if (!empty($userFacebook)) {
        $socialLinks .= '
                <a href="' . $userFacebook . '" target="_blank" class="social-cube">
                    <div class="social-cube-inner">
                        <div class="cube-face front"><i class="fab fa-facebook"></i></div>
                        <div class="cube-face back"><i class="fab fa-facebook"></i></div>
                        <div class="cube-face right"><i class="fab fa-facebook"></i></div>
                        <div class="cube-face left"><i class="fab fa-facebook"></i></div>
                        <div class="cube-face top"><i class="fab fa-facebook"></i></div>
                        <div class="cube-face bottom"><i class="fab fa-facebook"></i></div>
                    </div>
                </a>';
    }
    
    // Profile image or initial
    $profileImage = '';
    if (!empty($user['profile_image'])) {
        $profileImage = '<img src="/uploads/profile_images/' . htmlspecialchars($user['profile_image']) . '" alt="Profile Image">';
    } else {
        $profileImage = '<div style="width: 100%; height: 400px; background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end)); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 5rem; color: white;">' . substr($userName, 0, 1) . '</div>';
    }
    
    // Return the complete HTML
    return '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $userName . ' - Resume</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap");

        :root {
            --font-main: "Poppins", sans-serif;

            /* Dark Theme (Default) */
            --bg-primary: #0C0C1D;
            --bg-secondary: #05050C;
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.8);
            --text-muted: rgba(255, 255, 255, 0.6);
            --border-color: rgba(255, 255, 255, 0.1);
            --gradient-start: #9D50BB;
            --gradient-end: #6E48AA;
            --cube-bg: rgba(70, 130, 180, 0.3);
            --cube-border: rgba(70, 130, 180, 0.6);
            --hero-image-border: rgba(255,255,255,0.2);
            --shadow-color: rgba(0,0,0,0.2);
            --tag-bg: #6E48AA;
            --nav-hover-bg: rgba(255, 255, 255, 0.07);
        }

        body.light-mode {
            /* Light Theme */
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --text-primary: #1a1a2e;
            --text-secondary: #334155;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --gradient-start: #8B5CF6;
            --gradient-end: #3B82F6;
            --cube-bg: rgba(139, 92, 246, 0.1);
            --cube-border: rgba(139, 92, 246, 0.4);
            --hero-image-border: rgba(26,26,46,0.2);
            --shadow-color: rgba(0,0,0,0.1);
            --tag-bg: #3B82F6;
            --nav-hover-bg: rgba(0, 0, 0, 0.05);
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: var(--font-main);
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
            margin: 0;
            padding: 0;
        }

        .hero-container {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 3rem;
            align-items: center;
            max-width: 1200px;
            width: 100%;
            position: relative;
            padding: 2rem;
            min-height: 100vh;
            margin: 0 auto;
        }

        /* Decorative elements */
        .hero-container::before {
            content: "";
            position: absolute;
            top: 50%;
            left: -10%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(138, 43, 226, 0.1) 0%, rgba(138, 43, 226, 0) 70%);
            transform: translateY(-50%);
        }

        .hero-container::after {
            content: "";
            position: absolute;
            bottom: 5%;
            right: -5%;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(70, 130, 180, 0.1) 0%, rgba(70, 130, 180, 0) 70%);
        }

        .hero-content {
            z-index: 1;
        }

        .hero-intro {
            font-size: 1.25rem;
            font-weight: 300;
            margin-bottom: 0.5rem;
        }

        .hero-name {
            font-size: 4.5rem;
            font-weight: 700;
            line-height: 1.1;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
        }

        .hero-summary {
            font-size: 1rem;
            line-height: 1.8;
            max-width: 500px;
            margin-bottom: 2rem;
            color: var(--text-secondary);
        }

        .social-cubes {
            display: flex;
            gap: 1.5rem;
        }

        .social-cube {
            width: 50px;
            height: 50px;
            perspective: 1000px;
            text-decoration: none;
        }

        .social-cube-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transform: rotateX(-20deg) rotateY(-30deg);
            transition: transform 0.5s;
        }

        .social-cube:hover .social-cube-inner {
            transform: rotateX(0) rotateY(0);
        }

        .cube-face {
            position: absolute;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            color: white;
            background: var(--cube-bg);
            border: 1px solid var(--cube-border);
            backdrop-filter: blur(5px);
        }

        .front  { transform: translateZ(25px); }
        .top    { transform: rotateX(90deg) translateZ(25px); background: var(--cube-bg); }
        .bottom { transform: rotateX(-90deg) translateZ(25px); }
        .left   { transform: rotateY(-90deg) translateZ(25px); }
        .right  { transform: rotateY(90deg) translateZ(25px); background: var(--cube-bg); }
        .back   { transform: rotateY(180deg) translateZ(25px); }

        .hero-image {
            z-index: 1;
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 15px 35px var(--shadow-color);
            object-fit: cover;
        }
        
        .hero-image::before {
            content: "";
            position: absolute;
            top: -15px;
            right: -15px;
            bottom: 15px;
            left: 15px;
            border: 2px solid var(--hero-image-border);
            border-radius: 20px;
            z-index: -1;
            transform: rotate(-5deg);
            transition: all 0.3s ease;
        }

        .hero-image:hover::before {
            transform: rotate(0deg);
        }

        /* Navigation */
        .nav-toggle {
            position: fixed;
            top: 2rem;
            right: 2rem;
            z-index: 1000;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-toggle:hover {
            background: var(--nav-hover-bg);
        }

        .nav-toggle i {
            font-size: 1.5rem;
            color: var(--text-primary);
        }

        .nav-menu {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100vh;
            background: var(--bg-secondary);
            border-left: 1px solid var(--border-color);
            padding: 2rem;
            transition: right 0.3s ease;
            z-index: 999;
        }

        .nav-menu.active {
            right: 0;
        }

        .nav-menu h3 {
            margin-bottom: 2rem;
            color: var(--text-primary);
        }

        .nav-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-menu li {
            margin-bottom: 1rem;
        }

        .nav-menu a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s ease;
            display: block;
            padding: 0.5rem 0;
        }

        .nav-menu a:hover {
            color: var(--text-primary);
        }

        /* Sections */
        .section {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            text-align: center;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Experience Section */
        .experience-grid {
            display: grid;
            gap: 2rem;
        }

        .experience-item {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .experience-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px var(--shadow-color);
        }

        .experience-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .experience-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .experience-company {
            font-size: 1.1rem;
            color: var(--gradient-start);
            font-weight: 500;
        }

        .experience-date {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .experience-description {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .experience-achievements {
            list-style: none;
            padding: 0;
        }

        .experience-achievements li {
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .experience-achievements li::before {
            content: "•";
            color: var(--gradient-start);
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        /* Skills Section */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .skill-category {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            padding: 2rem;
        }

        .skill-category h3 {
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .skill-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .skill-name {
            color: var(--text-secondary);
            font-weight: 500;
        }

        .skill-proficiency {
            color: var(--gradient-start);
            font-weight: 600;
        }

        /* Projects Section */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .project-item {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px var(--shadow-color);
        }

        .project-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .project-description {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .tech-tag {
            background: var(--tag-bg);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .project-links {
            display: flex;
            gap: 1rem;
        }

        .project-link {
            color: var(--gradient-start);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .project-link:hover {
            color: var(--gradient-end);
        }

        /* Education Section */
        .education-grid {
            display: grid;
            gap: 2rem;
        }

        .education-item {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .education-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px var(--shadow-color);
        }

        .education-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .education-degree {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .education-school {
            font-size: 1.1rem;
            color: var(--gradient-start);
            font-weight: 500;
        }

        .education-date {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .education-description {
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }

            .hero-name {
                font-size: 3rem;
            }

            .section {
                padding: 3rem 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .experience-header,
            .education-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .skills-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Theme Toggle */
        .theme-toggle {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .theme-toggle:hover {
            background: var(--nav-hover-bg);
        }

        .theme-toggle i {
            font-size: 1.5rem;
            color: var(--text-primary);
        }
    </style>
</head>
<body>
    <!-- Navigation Toggle -->
    <div class="nav-toggle" onclick="toggleNav()">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Navigation Menu -->
    <div class="nav-menu" id="navMenu">
        <h3>Navigation</h3>
        <ul>
            <li><a href="#home" onclick="closeNav()">Home</a></li>
            <li><a href="#experience" onclick="closeNav()">Experience</a></li>
            <li><a href="#skills" onclick="closeNav()">Skills</a></li>
            <li><a href="#projects" onclick="closeNav()">Projects</a></li>
            <li><a href="#education" onclick="closeNav()">Education</a></li>
        </ul>
    </div>

    <!-- Theme Toggle -->
    <div class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon" id="themeIcon"></i>
    </div>

    <!-- Hero Section -->
    <section id="home" class="hero-container">
        <div class="hero-content">
            <p class="hero-intro">Hello, I\'m</p>
            <h1 class="hero-name">' . $userName . '</h1>
            <p class="hero-summary">' . $userSummary . '</p>
            
            <div class="social-cubes">
                ' . $socialLinks . '
            </div>
        </div>
        
        <div class="hero-image">
            ' . $profileImage . '
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="section">
        <h2 class="section-title">Experience</h2>
        <div class="experience-grid">
            ' . $experienceHTML . '
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="section">
        <h2 class="section-title">Skills</h2>
        <div class="skills-grid">
            ' . $skillsHTML . '
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="section">
        <h2 class="section-title">Projects</h2>
        <div class="projects-grid">
            ' . $projectsHTML . '
        </div>
    </section>

    <!-- Education Section -->
    <section id="education" class="section">
        <h2 class="section-title">Education</h2>
        <div class="education-grid">
            ' . $educationHTML . '
        </div>
    </section>

    <script>
        // Navigation functionality
        function toggleNav() {
            const navMenu = document.getElementById("navMenu");
            navMenu.classList.toggle("active");
        }

        function closeNav() {
            const navMenu = document.getElementById("navMenu");
            navMenu.classList.remove("active");
        }

        // Theme toggle functionality
        function toggleTheme() {
            const body = document.body;
            const themeIcon = document.getElementById("themeIcon");
            
            if (body.classList.contains("light-mode")) {
                body.classList.remove("light-mode");
                themeIcon.className = "fas fa-moon";
                localStorage.setItem("theme", "dark");
            } else {
                body.classList.add("light-mode");
                themeIcon.className = "fas fa-sun";
                localStorage.setItem("theme", "light");
            }
        }

        // Load saved theme
        document.addEventListener("DOMContentLoaded", function() {
            const savedTheme = localStorage.getItem("theme");
            const themeIcon = document.getElementById("themeIcon");
            
            if (savedTheme === "light") {
                document.body.classList.add("light-mode");
                themeIcon.className = "fas fa-sun";
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll("a[href^=\'#\']").forEach(anchor => {
            anchor.addEventListener("click", function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute("href"));
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start"
                    });
                }
            });
        });
    </script>
</body>
</html>';
}
?> 