<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="title is-2">Manage Education</h1>
    <a href="/admin/education/add" class="button is-primary mb-3">
        <span class="icon"><i class="fas fa-plus"></i></span>
        <span>Add Education</span>
    </a>

    <div class="box">
        <table class="table is-fullwidth is-striped is-hoverable">
            <thead>
                <tr>
                    <th>Degree</th>
                    <th>Institution</th>
                    <th>Dates</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($education)): ?>
                    <?php foreach($education as $edu): ?>
                        <tr>
                            <td><?= esc($edu['degree']) ?></td>
                            <td><?= esc($edu['institution']) ?></td>
                            <td><?= esc($edu['start_date']) ?> to <?= esc($edu['end_date'] ?? 'Present') ?></td>
                            <td>
                                <a href="/admin/education/edit/<?= $edu['id'] ?>" class="button is-small is-info">
                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="/admin/education/delete/<?= $edu['id'] ?>" class="button is-small is-danger" onclick="return confirm('Are you sure you want to delete this entry?')">
                                    <span class="icon"><i class="fas fa-trash"></i></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="has-text-centered">No education entries found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?> 