<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root {
            --font-main: 'Poppins', sans-serif;

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
            content: '';
            position: absolute;
            top: 50%;
            left: -10%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(138, 43, 226, 0.1) 0%, rgba(138, 43, 226, 0) 70%);
            transform: translateY(-50%);
        }

        .hero-container::after {
            content: '';
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
            content: '';
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
            top: 0; right: 0; bottom: 0; left: 0;
        }


        @media (max-width: 992px) {
            .hero-name {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 768px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-summary {
                margin-left: auto;
                margin-right: auto;
            }

            .social-cubes {
                justify-content: center;
            }

            .hero-image {
                grid-row: 1;
                margin-bottom: 2rem;
            }
        }
        
        /* --- Content Sections --- */
        .content-container {
            padding: 3rem 2rem;
            z-index: 1;
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section {
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 600;
            color: var(--gradient-start); /* Gradient color */
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
        }

        /* Summary Section */
        .summary {
            background: var(--bg-secondary);
            padding: 1.5rem;
            border-radius: 8px;
            border-left: 4px solid var(--gradient-start);
            color: var(--text-secondary);
            line-height: 1.8;
            font-size: 1rem;
        }

        /* Experience & Education Section */
        .experience-item, .education-item {
            margin-bottom: 2rem;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            background: var(--bg-secondary);
            border-radius: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .experience-item:hover, .education-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px var(--shadow-color);
        }

        .experience-header, .education-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .experience-title, .education-degree {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--gradient-start);
        }

        .experience-company, .education-institution {
            font-weight: 500;
            color: var(--text-primary);
        }

        .experience-date, .education-date, .experience-location {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .experience-description {
            color: var(--text-secondary);
        }

        .experience-achievements {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .achievements-list {
            list-style: none;
            padding-left: 0;
        }

        .achievements-list li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .achievements-list li::before {
            content: '▸';
            position: absolute;
            left: 0;
            color: var(--gradient-start);
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
            padding: 1.5rem;
            border-radius: 8px;
        }
        .skill-category h4 {
            color: var(--gradient-start);
            margin-bottom: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .skill-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }
        .skill-name {
            font-weight: 500;
            color: var(--text-primary);
        }
        .skill-bar {
            width: 100px;
            height: 8px;
            background: rgba(0,0,0,0.1);
            border-radius: 4px;
            overflow: hidden;
        }
        body.light-mode .skill-bar {
            background: var(--border-color);
        }
        .skill-progress {
            height: 100%;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            border-radius: 4px;
        }
        .skill-percentage {
            font-size: 0.8rem;
            color: var(--text-muted);
            min-width: 30px;
            text-align: right;
        }

        /* Projects Section */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }
        .project-card {
            border: 1px solid var(--border-color);
            background: var(--bg-secondary);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
        }
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px var(--shadow-color);
        }
        .project-image {
            width: 100%;
            height: 200px;
            background: var(--bg-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 3rem;
            flex-shrink: 0;
        }
        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .project-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .project-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--gradient-start);
            margin-bottom: 0.5rem;
        }
        .project-description {
            color: var(--text-secondary);
            margin-bottom: 1rem;
            flex-grow: 1;
        }
        .project-technologies {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        .technology-tag {
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
            margin-top: auto;
        }
        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gradient-start);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        .project-link:hover {
            color: var(--gradient-end);
        }

        /* --- Navigation --- */
        .main-nav {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem;
            z-index: 1000;
        }
        .nav-logo {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-primary);
        }
        .nav-links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 2rem;
            margin: 0;
            padding: 0;
        }
        .nav-links a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            transition: color 0.3s ease, background-color 0.3s ease;
            padding: 8px 16px;
            position: relative;
            border-radius: 999px;
        }
        .nav-links a:hover {
            color: var(--text-primary);
            background-color: var(--nav-hover-bg);
        }

        /* --- Contact Form --- */
        .contact-section {
            position: relative;
            overflow: hidden;
        }

        .contact-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(138, 43, 226, 0.1) 0%, rgba(138, 43, 226, 0) 70%);
            border-radius: 50%;
            z-index: 0;
        }

        .contact-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -15%;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(70, 130, 180, 0.1) 0%, rgba(70, 130, 180, 0) 70%);
            border-radius: 50%;
            z-index: 0;
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .contact-info {
            padding: 2rem;
        }

        .contact-info h3 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--gradient-start);
            margin-bottom: 1.5rem;
            position: relative;
        }

        .contact-info h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            border-radius: 2px;
        }

        .contact-info p {
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .contact-methods {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .contact-method {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: var(--text-primary);
            animation: slideInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .contact-method:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--shadow-color);
            border-color: var(--gradient-start);
        }

        .contact-method-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .contact-method-content h4 {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--text-primary);
        }

        .contact-method-content p {
            color: var(--text-secondary);
            margin: 0;
            font-size: 0.95rem;
        }

        .contact-social {
            margin-top: 2rem;
        }

        .contact-social h4 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: fadeInScale 0.5s ease forwards;
            opacity: 0;
            transform: scale(0.8);
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .social-link:hover::before {
            left: 100%;
        }

        .social-link:hover {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px var(--shadow-color);
        }

        .contact-form {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px var(--shadow-color);
            position: relative;
            overflow: hidden;
            animation: slideInRight 0.8s ease forwards;
            opacity: 0;
            transform: translateX(50px);
        }

        .contact-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header h3 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: var(--text-secondary);
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            position: absolute;
            top: 1rem;
            left: 1.25rem;
            background: var(--bg-primary);
            padding: 0 0.5rem;
            transition: all 0.3s ease;
            pointer-events: none;
            z-index: 1;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            background: var(--bg-primary);
            border: 2px solid var(--border-color);
            border-radius: 12px;
            color: var(--text-primary);
            font-family: var(--font-main);
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gradient-start);
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
            transform: translateY(-1px);
        }

        .form-input::placeholder {
            color: var(--text-secondary);
            opacity: 0.7;
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .form-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #10b981;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
            animation: slideInDown 0.5s ease;
        }

        .form-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
            animation: slideInDown 0.5s ease;
        }

        @media (max-width: 768px) {
            .contact-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .contact-form {
                padding: 1.5rem;
            }

            .social-links {
                justify-content: center;
            }
        }

        /* --- Back to Top Button --- */
        .back-to-top-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            cursor: pointer;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: opacity 0.3s, visibility 0.3s, transform 0.3s;
        }

        .back-to-top-btn.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px var(--shadow-color);
        }

        /* --- Theme Switcher --- */
        .theme-switcher {
            position: relative;
        }
        .theme-toggle-checkbox {
            display: none;
        }
        .theme-toggle-label {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            cursor: pointer;
            display: block;
            position: relative;
            height: 34px;
            width: 68px;
        }
        .theme-toggle-label i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            transition: opacity 0.2s ease-in-out;
        }
        .theme-toggle-label .fa-moon {
            left: 9px;
            color: #f1c40f;
        }
        .theme-toggle-label .fa-sun {
            right: 9px;
            color: #f39c12;
        }
        .theme-toggle-checkbox:not(:checked) + .theme-toggle-label .fa-sun {
            opacity: 0;
        }
        .theme-toggle-checkbox:checked + .theme-toggle-label .fa-moon {
            opacity: 0;
        }
        .theme-toggle-ball {
            background-color: var(--text-primary);
            border-radius: 50%;
            position: absolute;
            top: 4px;
            left: 5px;
            height: 26px;
            width: 26px;
            z-index: 2;
            transition: transform 0.2s linear;
        }
        .theme-toggle-checkbox:checked + .theme-toggle-label .theme-toggle-ball {
            transform: translateX(34px);
        }

        /* Contact Section Animations */
        .contact-method:nth-child(1) { animation-delay: 0.1s; }
        .contact-method:nth-child(2) { animation-delay: 0.2s; }
        .contact-method:nth-child(3) { animation-delay: 0.3s; }
        .contact-method:nth-child(4) { animation-delay: 0.4s; }

        .social-link:nth-child(1) { animation-delay: 0.5s; }
        .social-link:nth-child(2) { animation-delay: 0.6s; }
        .social-link:nth-child(3) { animation-delay: 0.7s; }
        .social-link:nth-child(4) { animation-delay: 0.8s; }

        .contact-form {
            animation-delay: 0.8s;
        }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Form input focus animations */
        .form-input:focus + .form-label,
        .form-input:not(:placeholder-shown) + .form-label {
            transform: translateY(-25px) scale(0.85);
            color: var(--gradient-start);
        }

        /* Floating label effect */
        .form-group {
            position: relative;
        }

        .form-label {
            position: absolute;
            top: 1rem;
            left: 1.25rem;
            background: var(--bg-primary);
            padding: 0 0.5rem;
            transition: all 0.3s ease;
            pointer-events: none;
            z-index: 1;
        }

        .form-input:focus ~ .form-label,
        .form-input:not(:placeholder-shown) ~ .form-label {
            top: -0.5rem;
            left: 1rem;
            font-size: 0.8rem;
            color: var(--gradient-start);
            font-weight: 600;
        }

        /* Contact method hover effects */
        .contact-method:hover .contact-method-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .contact-method-icon {
            transition: all 0.3s ease;
        }

        /* Success/Error message animations */
        .form-success,
        .form-error {
            animation: slideInDown 0.5s ease;
        }

        /* Submit button loading state */
        .submit-btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .submit-btn.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Form validation states */
        .form-input.valid {
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .form-input.invalid {
            border-color: #ef4444;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .form-input.has-content {
            border-color: var(--gradient-start);
        }

        /* Form input icons */
        .form-group {
            position: relative;
        }

        .form-input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            transition: color 0.3s ease;
        }

        .form-input:focus ~ .form-input-icon {
            color: var(--gradient-start);
        }

        .form-input.valid ~ .form-input-icon {
            color: #10b981;
        }

        .form-input.invalid ~ .form-input-icon {
            color: #ef4444;
        }

        /* Contact section background pattern */
        .contact-section {
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(138, 43, 226, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(70, 130, 180, 0.05) 0%, transparent 50%);
        }

        /* Enhanced contact method styling */
        .contact-method {
            position: relative;
            overflow: hidden;
        }

        .contact-method::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .contact-method:hover::before {
            left: 100%;
        }

        /* Social links enhanced styling */
        .social-link {
            position: relative;
            overflow: hidden;
        }

        .social-link::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s;
        }

        .social-link:hover::after {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <nav class="main-nav">
        <div class="nav-logo">SMDT.</div>
        <ul class="nav-links">
            <?php if (!empty($education)): ?><li><a href="#education">Education</a></li><?php endif; ?>
            <?php if (!empty($projects)): ?><li><a href="#projects">Projects</a></li><?php endif; ?>
            <?php if (!empty($skills)): ?><li><a href="#skills">Skills</a></li><?php endif; ?>
            <li>
                <div class="theme-switcher">
                    <input type="checkbox" id="theme-toggle" class="theme-toggle-checkbox">
                    <label for="theme-toggle" class="theme-toggle-label">
                        <i class="fas fa-moon"></i>
                        <i class="fas fa-sun"></i>
                        <span class="theme-toggle-ball"></span>
                    </label>
                </div>
            </li>
        </ul>
    </nav>

    <div class="hero-container">
        <div class="hero-content">
            <p class="hero-intro">Hello there! I am</p>
            <h1 class="hero-name"><?= esc($user['name']) ?></h1>
            <p class="hero-summary"><?= esc($user['summary']) ?></p>
            
            <div class="social-cubes">
                <?php if (!empty($user['linkedin'])): ?>
                <a href="<?= esc($user['linkedin']) ?>" target="_blank" class="social-cube">
                    <div class="social-cube-inner">
                        <div class="cube-face front"><i class="fab fa-linkedin-in"></i></div>
                        <div class="cube-face top"></div>
                        <div class="cube-face bottom"></div>
                        <div class="cube-face left"></div>
                        <div class="cube-face right"></div>
                        <div class="cube-face back"></div>
                    </div>
                    </a>
                <?php endif; ?>
                
                <?php if (!empty($user['github'])): ?>
                <a href="<?= esc($user['github']) ?>" target="_blank" class="social-cube">
                    <div class="social-cube-inner">
                        <div class="cube-face front"><i class="fab fa-github"></i></div>
                        <div class="cube-face top"></div>
                        <div class="cube-face bottom"></div>
                        <div class="cube-face left"></div>
                        <div class="cube-face right"></div>
                        <div class="cube-face back"></div>
                    </div>
                    </a>
                <?php endif; ?>
                
                <?php if (!empty($user['facebook'])): ?>
                <a href="<?= esc($user['facebook']) ?>" target="_blank" class="social-cube">
                    <div class="social-cube-inner">
                        <div class="cube-face front"><i class="fab fa-facebook-f"></i></div>
                        <div class="cube-face top"></div>
                        <div class="cube-face bottom"></div>
                        <div class="cube-face left"></div>
                        <div class="cube-face right"></div>
                        <div class="cube-face back"></div>
                    </div>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="hero-image">
            <?php if (!empty($user['profile_image'])): ?>
                <img src="/uploads/profile_images/<?= esc($user['profile_image']) ?>" alt="Profile Image">
            <?php else: ?>
                <div style="width:100%; aspect-ratio: 1/1; background: #16213e; border-radius: 20px; display: flex; align-items: center; justify-content:center; font-size: 5rem;"><?= esc(substr($user['name'], 0, 1)) ?></div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content-container">
        <!-- Experience Section -->
        <?php if (!empty($experience)): ?>
            <div class="section" id="experience">
                <h2 class="section-title">Professional Experience</h2>
                <?php foreach ($experience as $exp): ?>
                    <div class="experience-item">
                        <div class="experience-header">
                            <div>
                                <div class="experience-title"><?= esc($exp['position']) ?></div>
                                <div class="experience-company"><?= esc($exp['company']) ?></div>
                                <?php if ($exp['location']): ?>
                                    <div class="experience-location"><?= esc($exp['location']) ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="experience-date">
                                <?= date('M Y', strtotime($exp['start_date'])) ?> - 
                                <?= $exp['current'] ? 'Present' : date('M Y', strtotime($exp['end_date'])) ?>
                            </div>
                        </div>
                        <div class="experience-description">
                            <?= nl2br(esc($exp['description'])) ?>
                        </div>
                        <?php if ($exp['achievements']): ?>
                            <div class="experience-achievements">
                                <ul class="achievements-list">
                                    <?php foreach (explode("\n", $exp['achievements']) as $achievement): ?>
                                        <?php if (trim($achievement)): ?>
                                            <li><?= esc(trim($achievement)) ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Education Section -->
        <?php if (!empty($education)): ?>
            <div class="section" id="education">
                <h2 class="section-title">Education</h2>
                <?php foreach ($education as $edu): ?>
                    <div class="education-item">
                        <div class="education-header">
                            <div>
                                <div class="education-degree"><?= esc($edu['degree']) ?> in <?= esc($edu['field_of_study']) ?></div>
                                <div class="education-institution"><?= esc($edu['institution']) ?></div>
                                <?php if ($edu['location']): ?>
                                    <div class="experience-location"><?= esc($edu['location']) ?></div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <div class="education-date">
                                    <?= date('M Y', strtotime($edu['start_date'])) ?> - 
                                    <?= $edu['current'] ? 'Present' : date('M Y', strtotime($edu['end_date'])) ?>
                                </div>
                            </div>
                        </div>
                        <?php if ($edu['description']): ?>
                            <div class="experience-description">
                                <?= nl2br(esc($edu['description'])) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Skills Section -->
        <?php if (!empty($skills)): ?>
            <div class="section" id="skills">
                <h2 class="section-title">Skills</h2>
                <div class="skills-grid">
                    <?php foreach ($skills as $category => $categorySkills): ?>
                        <div class="skill-category">
                        <h4><?= esc(ucfirst($category)) ?></h4>
                            <?php foreach ($categorySkills as $skill): ?>
                                <div class="skill-item">
                                    <span class="skill-name"><?= esc($skill['name']) ?></span>
                                    <div class="skill-bar">
                                        <div class="skill-progress" style="width: <?= $skill['proficiency'] ?>%"></div>
                                    </div>
                                    <span class="skill-percentage"><?= $skill['proficiency'] ?>%</span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Projects Section -->
        <?php if (!empty($projects)): ?>
            <div class="section" id="projects">
                <h2 class="section-title">Projects</h2>
                <div class="projects-grid">
                    <?php foreach ($projects as $project): ?>
                        <div class="project-card">
                        <?php if (!empty($project['image'])): ?>
                                <div class="project-image">
                                <img src="/uploads/project_images/<?= esc($project['image']) ?>" alt="<?= esc($project['title']) ?>">
                                </div>
                            <?php else: ?>
                                <div class="project-image">
                                    <i class="fas fa-code"></i>
                                </div>
                            <?php endif; ?>
                            
                            <div class="project-content">
                            <h3 class="project-title"><?= esc($project['title']) ?></h3>
                            <p class="project-description">
                                    <?= nl2br(esc($project['description'])) ?>
                            </p>
                                
                                <?php if ($project['technologies']): ?>
                                    <div class="project-technologies">
                                        <?php foreach (explode(',', $project['technologies']) as $tech): ?>
                                            <span class="technology-tag"><?= esc(trim($tech)) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="project-links">
                                    <?php if ($project['live_url']): ?>
                                        <a href="<?= esc($project['live_url']) ?>" target="_blank" class="project-link">
                                            <i class="fas fa-external-link-alt"></i>
                                            Live Demo
                                        </a>
                                    <?php endif; ?>
                                    
                                    <?php if ($project['github_url']): ?>
                                        <a href="<?= esc($project['github_url']) ?>" target="_blank" class="project-link">
                                            <i class="fab fa-github"></i>
                                            Source Code
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <a href="#" id="back-to-top" class="back-to-top-btn">
        <i class="fas fa-arrow-up"></i>
    </a>
    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        // Function to apply theme
        const applyTheme = (theme) => {
            if (theme === 'light') {
                body.classList.add('light-mode');
                themeToggle.checked = true;
            } else {
                body.classList.remove('light-mode');
                themeToggle.checked = false;
            }
        };

        // Check for saved theme in localStorage or user's system preference
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (savedTheme) {
            applyTheme(savedTheme);
        } else if (prefersDark) {
            applyTheme('dark');
        } else {
            applyTheme('light'); // Default to light if no preference
        }
        
        // Event listener for the toggle
        themeToggle.addEventListener('change', () => {
            const newTheme = themeToggle.checked ? 'light' : 'dark';
            body.classList.toggle('light-mode', themeToggle.checked);
            localStorage.setItem('theme', newTheme);
        });

        // Listen for changes in system preference
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (!localStorage.getItem('theme')) { // Only change if user hasn't set a preference
                applyTheme(e.matches ? 'dark' : 'light');
            }
        });

        // Smooth scrolling for nav links
        document.querySelectorAll('.nav-links a').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href.startsWith('#')) {
                    e.preventDefault();
                    const targetId = href;
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Back to top button logic
        const backToTopButton = document.getElementById('back-to-top');

        if (backToTopButton) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopButton.classList.add('show');
                } else {
                    backToTopButton.classList.remove('show');
                }
            });

            backToTopButton.addEventListener('click', (e) => {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // Contact form enhancements
        const contactForm = document.querySelector('.contact-form form');
        const submitBtn = document.querySelector('.submit-btn');

        if (contactForm && submitBtn) {
            contactForm.addEventListener('submit', function(e) {
                // Add loading state
                submitBtn.classList.add('loading');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                
                // Remove loading state after form submission (for demo purposes)
                setTimeout(() => {
                    submitBtn.classList.remove('loading');
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
                }, 2000);
            });

            // Real-time form validation feedback
            const formInputs = contactForm.querySelectorAll('.form-input');
            formInputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.checkValidity()) {
                        this.classList.add('valid');
                        this.classList.remove('invalid');
                    } else {
                        this.classList.add('invalid');
                        this.classList.remove('valid');
                    }
                });

                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.classList.add('has-content');
                    } else {
                        this.classList.remove('has-content');
                    }
                });
            });
        }

        // Intersection Observer for contact section animations
        const contactSection = document.querySelector('.contact-section');
        if (contactSection) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            observer.observe(contactSection);
        }

        // Contact method hover effects
        const contactMethods = document.querySelectorAll('.contact-method');
        contactMethods.forEach(method => {
            method.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
            });

            method.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Social links hover effects
        const socialLinks = document.querySelectorAll('.social-link');
        socialLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.1)';
            });

            link.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html> 