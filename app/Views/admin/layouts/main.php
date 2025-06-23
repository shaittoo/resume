<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? esc($title) : 'Portfolio Admin' ?></title>
    
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), #1d4ed8);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .navbar-item, .navbar-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .navbar-item:hover, .navbar-link:hover {
            color: white !important;
        }

        .main-content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            flex-grow: 1;
        }

        .box {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border: 1px solid var(--border-color);
        }

        .title {
            color: var(--text-dark);
        }

        .button.is-primary {
            background-color: var(--primary-color);
        }
        .button.is-primary:hover {
            background-color: #1d4ed8;
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/admin">
                    <i class="fas fa-user-cog mr-2"></i> Portfolio Admin
                </a>
                 <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarAdminMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarAdminMenu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="/admin/profile">Profile</a>
                    <a class="navbar-item" href="/admin/experience">Experience</a>
                    <a class="navbar-item" href="/admin/education">Education</a>
                    <a class="navbar-item" href="/admin/skills">Skills</a>
                    <a class="navbar-item" href="/admin/projects">Projects</a>
                </div>
                <div class="navbar-end">
                    <a class="navbar-item" href="/" target="_blank">
                        <span class="icon">
                            <i class="fas fa-eye"></i>
                        </span>
                        <span>View Portfolio</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="notification is-success is-light">
                <button class="delete"></button>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="notification is-danger is-light">
                 <button class="delete"></button>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
          // Get all "navbar-burger" elements
          const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

          // Check if there are any navbar burgers
          if ($navbarBurgers.length > 0) {
            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
              el.addEventListener('click', () => {
                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
              });
            });
          }
          
          // Script for closable notifications
          (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            const $notification = $delete.parentNode;
            $delete.addEventListener('click', () => {
              $notification.parentNode.removeChild($notification);
            });
          });
        });
    </script>
</body>
</html> 