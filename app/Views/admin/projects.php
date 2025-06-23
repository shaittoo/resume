<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="title is-2">Manage Projects</h1>
    <a href="/admin/projects/add" class="button is-primary mb-3">
        <span class="icon"><i class="fas fa-plus"></i></span>
        <span>Add Project</span>
    </a>
    
    <div class="box">
        <table class="table is-fullwidth is-striped is-hoverable">
            <thead>
                <tr>
                    <th>Project Title</th>
                    <th>Technologies</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($projects)): ?>
                    <?php foreach($projects as $project): ?>
                        <tr>
                            <td><?= esc($project['title']) ?></td>
                            <td><?= esc($project['technologies']) ?></td>
                            <td><?= $project['featured'] ? 'Yes' : 'No' ?></td>
                            <td>
                                <a href="/admin/projects/edit/<?= $project['id'] ?>" class="button is-small is-info">
                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="/admin/projects/delete/<?= $project['id'] ?>" class="button is-small is-danger" onclick="return confirm('Are you sure you want to delete this project?')">
                                    <span class="icon"><i class="fas fa-trash"></i></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="has-text-centered">No projects found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?> 