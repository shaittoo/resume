<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="title is-2">Add Skill</h1>
    
    <form action="/admin/skills/add" method="post">
        <?= csrf_field() ?>
        
        <div class="field">
            <label for="name" class="label">Skill Name *</label>
            <div class="control">
                <input type="text" class="input" name="name" id="name" value="<?= old('name') ?>" required>
            </div>
        </div>
        
        <div class="field">
            <label for="category" class="label">Category *</label>
            <div class="control">
                <div class="select">
                    <select name="category" id="category" required>
                        <?php foreach($categories as $category): ?>
                            <option value="<?= esc($category) ?>" <?= old('category') == $category ? 'selected' : '' ?>><?= esc(ucfirst($category)) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label for="proficiency" class="label">Proficiency (1-100) *</label>
            <div class="control">
                <input type="number" class="input" name="proficiency" id="proficiency" value="<?= old('proficiency', 80) ?>" min="1" max="100" required>
            </div>
        </div>

        <div class="field">
            <label for="order_index" class="label">Order</label>
            <div class="control">
                <input type="number" class="input" name="order_index" id="order_index" value="<?= old('order_index', 0) ?>">
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-primary">Add Skill</button>
            </div>
            <div class="control">
                <a href="/admin/skills" class="button is-light">Cancel</a>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?> 