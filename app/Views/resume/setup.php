<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    
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
            --error-color: #ef4444;
            --success-color: #10b981;
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
            background: linear-gradient(135deg, var(--primary-color), #1d4ed8);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }

        .setup-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            margin: 0 1rem;
        }

        .setup-header {
            background: linear-gradient(135deg, var(--primary-color), #1d4ed8);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .setup-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .setup-header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .setup-form {
            padding: 2rem;
        }

        .form-section {
            margin-bottom: 2rem;
        }

        .form-section h3 {
            color: var(--primary-color);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
        }

        .form-label {
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-control.is-invalid {
            border-color: var(--error-color);
        }

        .invalid-feedback {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
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

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .progress-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .progress-step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--border-color);
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin: 0 0.5rem;
            position: relative;
        }

        .progress-step.active {
            background: var(--primary-color);
            color: white;
        }

        .progress-step.completed {
            background: var(--success-color);
            color: white;
        }

        .progress-step:not(:last-child)::after {
            content: '';
            position: absolute;
            right: -1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 2px;
            background: var(--border-color);
        }

        .progress-step.completed:not(:last-child)::after {
            background: var(--success-color);
        }

        @media (max-width: 768px) {
            .setup-container {
                margin: 0 0.5rem;
            }

            .setup-header {
                padding: 1.5rem;
            }

            .setup-header h1 {
                font-size: 1.5rem;
            }

            .setup-form {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="setup-container">
        <div class="setup-header">
            <h1><i class="fas fa-user-plus"></i> Setup Your Portfolio</h1>
            <p>Create your professional portfolio in minutes</p>
        </div>

        <div class="setup-form">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="/setup">
                <!-- Personal Information -->
                <div class="form-section">
                    <h3><i class="fas fa-user"></i> Personal Information</h3>
                    <div class="columns">
                        <div class="column">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" class="input <?= $validation->hasError('name') ? 'is-danger' : '' ?>" 
                                   id="name" name="name" value="<?= old('name') ?>" required>
                            <?php if ($validation->hasError('name')): ?>
                                <p class="help is-danger"><?= $validation->getError('name') ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="column">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="input <?= $validation->hasError('email') ? 'is-danger' : '' ?>" 
                                   id="email" name="email" value="<?= old('email') ?>" required>
                            <?php if ($validation->hasError('email')): ?>
                                <p class="help is-danger"><?= $validation->getError('email') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <label for="title" class="form-label">Professional Title *</label>
                            <input type="text" class="input <?= $validation->hasError('title') ? 'is-danger' : '' ?>" 
                                   id="title" name="title" value="<?= old('title') ?>" 
                                   placeholder="e.g., Senior Software Engineer" required>
                            <?php if ($validation->hasError('title')): ?>
                                <p class="help is-danger"><?= $validation->getError('title') ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="column">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="input" id="phone" name="phone" 
                                   value="<?= old('phone') ?>" placeholder="+1 (555) 123-4567">
                        </div>
                    </div>
                    <div class="field">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="input" id="location" name="location" 
                               value="<?= old('location') ?>" placeholder="e.g., San Francisco, CA">
                    </div>
                </div>

                <!-- Professional Summary -->
                <div class="form-section">
                    <h3><i class="fas fa-file-alt"></i> Professional Summary</h3>
                    <div class="field">
                        <label for="summary" class="form-label">Professional Summary *</label>
                        <textarea class="textarea <?= $validation->hasError('summary') ? 'is-danger' : '' ?>" 
                                  id="summary" name="summary" rows="4" 
                                  placeholder="Write a compelling summary of your professional background, skills, and career objectives..." required><?= old('summary') ?></textarea>
                        <?php if ($validation->hasError('summary')): ?>
                            <p class="help is-danger"><?= $validation->getError('summary') ?></p>
                        <?php endif; ?>
                        <p class="help">This will be the first thing visitors see about you.</p>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="form-section">
                    <h3><i class="fas fa-share-alt"></i> Social Links</h3>
                    <div class="columns">
                        <div class="column">
                            <label for="linkedin" class="form-label">LinkedIn Profile</label>
                            <input type="url" class="input" id="linkedin" name="linkedin" 
                                   value="<?= old('linkedin') ?>" placeholder="https://linkedin.com/in/yourprofile">
                        </div>
                        <div class="column">
                            <label for="github" class="form-label">GitHub Profile</label>
                            <input type="url" class="input" id="github" name="github" 
                                   value="<?= old('github') ?>" placeholder="https://github.com/yourusername">
                        </div>
                        <div class="column">
                            <label for="email" class="form-label">Personal Website</label>
                            <input type="url" class="input" id="email" name="email" 
                                   value="<?= old('email') ?>" placeholder="https://yourwebsite.com">
                        </div>
                        <div class="column">
                            <label for="facebook" class="form-label">Facebook Profile</label>
                            <input type="url" class="input" id="facebook" name="facebook" 
                                   value="<?= old('facebook') ?>" placeholder="https://www.facebook.com/shainamarietalisay/">
                        </div>
                    </div>
                </div>

                <!-- Security -->
                <div class="form-section">
                    <h3><i class="fas fa-lock"></i> Security</h3>
                    <div class="columns">
                        <div class="column">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="input <?= $validation->hasError('password') ? 'is-danger' : '' ?>" 
                                   id="password" name="password" required>
                            <?php if ($validation->hasError('password')): ?>
                                <p class="help is-danger"><?= $validation->getError('password') ?></p>
                            <?php endif; ?>
                            <p class="help">Minimum 6 characters</p>
                        </div>
                        <div class="column">
                            <label for="confirm_password" class="form-label">Confirm Password *</label>
                            <input type="password" class="input <?= $validation->hasError('confirm_password') ? 'is-danger' : '' ?>" 
                                   id="confirm_password" name="confirm_password" required>
                            <?php if ($validation->hasError('confirm_password')): ?>
                                <p class="help is-danger"><?= $validation->getError('confirm_password') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-primary is-fullwidth is-large">
                            <span class="icon">
                                <i class="fas fa-rocket"></i>
                            </span>
                            <span>Create My Portfolio</span>
                        </button>
                    </div>
                </div>

                <div class="has-text-centered mt-4">
                    <p class="help">
                        You can add experience, education, skills, and projects after creating your account.
                    </p>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Password confirmation validation
        document.getElementById('confirm_password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (password !== confirmPassword) {
                this.setCustomValidity('Passwords do not match');
            } else {
                this.setCustomValidity('');
            }
        });

        // Real-time validation feedback
        document.querySelectorAll('.input, .textarea').forEach(input => {
            input.addEventListener('blur', function() {
                if (this.checkValidity()) {
                    this.classList.remove('is-danger');
                    this.classList.add('is-success');
                } else {
                    this.classList.remove('is-success');
                    this.classList.add('is-danger');
                }
            });
        });
    </script>
</body>
</html> 