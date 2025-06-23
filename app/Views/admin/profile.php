<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="title is-2">Edit Profile</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="notification is-danger">
            <?= session()->getFlashdata('error') ?>
            <?php if (isset($validation)): ?>
                <ul>
                    <?php foreach ($validation->getErrors() as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form action="/admin/profile" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="field">
            <label for="name" class="label">Name *</label>
            <div class="control">
                <input type="text" class="input" name="name" id="name" value="<?= old('name', $user['name']) ?>" required>
            </div>
        </div>

        <div class="field">
            <label for="email" class="label">Email *</label>
            <div class="control">
                <input type="email" class="input" name="email" id="email" value="<?= old('email', $user['email']) ?>" required>
            </div>
        </div>

        <div class="field">
            <label for="title" class="label">Professional Title *</label>
            <div class="control">
                <input type="text" class="input" name="title" id="title" value="<?= old('title', $user['title']) ?>" required>
            </div>
        </div>

        <div class="field">
            <label for="summary" class="label">Summary *</label>
            <div class="control">
                <textarea name="summary" id="summary" class="textarea" rows="6" required><?= old('summary', $user['summary']) ?></textarea>
            </div>
        </div>

        <hr>
        <h2 class="title is-4">Contact & Links</h2>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="phone" class="label">Phone</label>
                    <div class="control">
                        <input type="tel" class="input" name="phone" id="phone" value="<?= old('phone', $user['phone']) ?>">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label for="location" class="label">Location</label>
                    <div class="control">
                        <input type="text" class="input" name="location" id="location" value="<?= old('location', $user['location']) ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="field">
            <label for="email" class="label">Website/Portfolio URL</label>
            <div class="control">
                <input type="url" class="input" name="email" id="email" value="<?= old('email', $user['email']) ?>">
            </div>
        </div>

        <div class="field">
            <label for="linkedin" class="label">LinkedIn URL</label>
            <div class="control">
                <input type="url" class="input" name="linkedin" id="linkedin" value="<?= old('linkedin', $user['linkedin']) ?>">
            </div>
        </div>

        <div class="field">
            <label for="github" class="label">GitHub URL</label>
            <div class="control">
                <input type="url" class="input" name="github" id="github" value="<?= old('github', $user['github']) ?>">
            </div>
        </div>

        <div class="field">
            <label for="facebook" class="label">Facebook URL</label>
            <div class="control">
                <input type="url" class="input" name="facebook" id="facebook" value="<?= old('facebook', $user['facebook'] ?? '') ?>">
            </div>
        </div>

        <div class="field">
            <label for="profile_image" class="label">Profile Image</label>
            <div class="control">
                <div class="file has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="profile_image" id="profile_image">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a file…
                            </span>
                        </span>
                        <span class="file-name">
                            No file uploaded
                        </span>
                    </label>
                </div>
            </div>
            <?php if ($user['profile_image']): ?>
                <figure class="image is-128x128 mt-4">
                    <img src="/uploads/profile_images/<?= esc($user['profile_image']) ?>" alt="Profile Image">
                </figure>
            <?php endif; ?>
        </div>

        <div class="field is-grouped mt-5">
            <div class="control">
                <button type="submit" class="button is-primary">Update Profile</button>
            </div>
            <div class="control">
                <a href="/admin" class="button is-light">Cancel</a>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.querySelector('.file-input');
    if (fileInput) {
        fileInput.addEventListener('change', () => {
            const fileName = document.querySelector('.file-name');
            if (fileInput.files.length > 0) {
                fileName.textContent = fileInput.files[0].name;
            } else {
                fileName.textContent = 'No file uploaded';
            }
        });
    }
});
</script>

<?= $this->endSection() ?> 