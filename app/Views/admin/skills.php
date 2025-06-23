<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="title is-2">Manage Skills</h1>
    <a href="/admin/skills/add" class="button is-primary mb-3">
        <span class="icon"><i class="fas fa-plus"></i></span>
        <span>Add Skill</span>
    </a>

    <?php foreach($skills as $category => $skill_list): ?>
        <h2 class="title is-4 mt-5"><?= esc(ucfirst($category)) ?></h2>
        <div class="box">
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>Skill Name</th>
                        <th>Proficiency</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($skill_list)): ?>
                        <?php foreach($skill_list as $skill): ?>
                            <tr>
                                <td><?= esc($skill['name']) ?></td>
                                <td>
                                    <progress class="progress is-info" value="<?= esc($skill['proficiency']) ?>" max="100"><?= esc($skill['proficiency']) ?>%</progress>
                                </td>
                                <td>
                                    <a href="/admin/skills/edit/<?= $skill['id'] ?>" class="button is-small is-info">
                                        <span class="icon"><i class="fas fa-edit"></i></span>
                                    </a>
                                    <a href="/admin/skills/delete/<?= $skill['id'] ?>" class="button is-small is-danger" onclick="return confirm('Are you sure you want to delete this skill?')">
                                        <span class="icon"><i class="fas fa-trash"></i></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="has-text-centered">No skills found in this category.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?> 