<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="title is-2">Manage Experience</h1>
    <a href="/admin/experience/add" class="button is-primary mb-3">
        <span class="icon"><i class="fas fa-plus"></i></span>
        <span>Add Experience</span>
    </a>
    
    <div class="box">
        <table class="table is-fullwidth is-striped is-hoverable">
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Company</th>
                    <th>Dates</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($experiences)): ?>
                    <?php foreach($experiences as $exp): ?>
                        <tr>
                            <td><?= esc($exp['position']) ?></td>
                            <td><?= esc($exp['company']) ?></td>
                            <td><?= esc($exp['start_date']) ?> to <?= esc($exp['end_date'] ?? 'Present') ?></td>
                            <td>
                                <a href="/admin/experience/edit/<?= $exp['id'] ?>" class="button is-small is-info">
                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="/admin/experience/delete/<?= $exp['id'] ?>" class="button is-small is-danger" onclick="return confirm('Are you sure you want to delete this entry?')">
                                    <span class="icon"><i class="fas fa-trash"></i></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="has-text-centered">No experience entries found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?> 