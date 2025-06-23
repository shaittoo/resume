<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --accent-color: #f59e0b;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --bg-light: #f8fafc;
            --border-color: #e2e8f0;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --info-color: #3b82f6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-light);
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), #1d4ed8);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: white !important;
        }

        .main-content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .welcome-section {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .welcome-section h1 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
        }

        .stat-icon.experience {
            background: var(--primary-color);
        }

        .stat-icon.education {
            background: var(--success-color);
        }

        .stat-icon.skills {
            background: var(--warning-color);
        }

        .stat-icon.projects {
            background: var(--info-color);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
        }

        .stat-label {
            color: var(--text-light);
            font-weight: 500;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .action-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
        }

        .action-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: inherit;
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: white;
            margin-bottom: 1rem;
        }

        .action-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .action-description {
            color: var(--text-light);
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 500;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .alert {
            border-radius: 8px;
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    
    <!-- Welcome Section -->
    <div class="welcome-section">
        <h1 class="title is-2">Welcome back, <?= esc($user['name']) ?>!</h1>
        <p class="subtitle is-6 has-text-grey">Manage your professional portfolio and keep it up to date.</p>
    </div>

    <!-- Statistics -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon experience">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="stat-number"><?= $stats['experience_count'] ?></div>
            <div class="stat-label">Experience Entries</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon education">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="stat-number"><?= $stats['education_count'] ?></div>
            <div class="stat-label">Education Entries</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon skills">
                <i class="fas fa-tools"></i>
            </div>
            <div class="stat-number"><?= $stats['skills_count'] ?></div>
            <div class="stat-label">Skills</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon projects">
                <i class="fas fa-code"></i>
            </div>
            <div class="stat-number"><?= $stats['projects_count'] ?></div>
            <div class="stat-label">Projects</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <h2 class="title is-3">Quick Actions</h2>
    <div class="actions-grid">
        <a href="/admin/profile" class="action-card">
            <div class="action-icon experience">
                <i class="fas fa-user-edit"></i>
            </div>
            <div class="action-title">Edit Profile</div>
            <div class="action-description">Update your personal information, contact details, and professional summary.</div>
            <button class="button is-outlined is-primary is-small">Manage Profile</button>
        </a>

        <a href="/admin/experience" class="action-card">
            <div class="action-icon experience">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="action-title">Manage Experience</div>
            <div class="action-description">Add, edit, or remove your work experience entries.</div>
            <button class="button is-outlined is-primary is-small">Manage Experience</button>
        </a>

        <a href="/admin/education" class="action-card">
            <div class="action-icon education">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="action-title">Manage Education</div>
            <div class="action-description">Update your educational background and qualifications.</div>
            <button class="button is-outlined is-primary is-small">Manage Education</button>
        </a>

        <a href="/admin/skills" class="action-card">
            <div class="action-icon skills">
                <i class="fas fa-tools"></i>
            </div>
            <div class="action-title">Manage Skills</div>
            <div class="action-description">Add or update your technical and soft skills with proficiency levels.</div>
            <button class="button is-outlined is-primary is-small">Manage Skills</button>
        </a>

        <a href="/admin/projects" class="action-card">
            <div class="action-icon projects">
                <i class="fas fa-code"></i>
            </div>
            <div class="action-title">Manage Projects</div>
            <div class="action-description">Showcase your portfolio projects with descriptions and links.</div>
            <button class="button is-outlined is-primary is-small">Manage Projects</button>
        </a>

        <a href="/" target="_blank" class="action-card">
            <div class="action-icon info-color" style="background: var(--info-color);">
                <i class="fas fa-eye"></i>
            </div>
            <div class="action-title">Preview Portfolio</div>
            <div class="action-description">View your portfolio as it appears to visitors and potential employers.</div>
            <button class="button is-outlined is-primary is-small">View Portfolio</button>
        </a>
    </div>

<?= $this->endSection() ?> 