<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="title is-2">Add Project</h1>
    
    <form action="/admin/projects/add" method="post">
        <?= csrf_field() ?>
        
        <div class="field">
            <label for="title" class="label">Project Title *</label>
            <div class="control">
                <input type="text" class="input" name="title" id="title" value="<?= old('title') ?>" required>
            </div>
        </div>
        
        <div class="field">
            <label for="description" class="label">Description *</label>
            <div class="control">
                <textarea name="description" id="description" class="textarea" rows="5" required><?= old('description') ?></textarea>
            </div>
        </div>

        <div class="field">
            <label for="technologies" class="label">Technologies (comma-separated) *</label>
            <div class="control">
                <input type="text" class="input" name="technologies" id="technologies" value="<?= old('technologies') ?>" required>
            </div>
        </div>
        
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="live_url" class="label">Live URL</label>
                    <div class="control">
                        <input type="url" class="input" name="live_url" id="live_url" value="<?= old('live_url') ?>">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label for="github_url" class="label">GitHub URL</label>
                    <div class="control">
                        <input type="url" class="input" name="github_url" id="github_url" value="<?= old('github_url') ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="start_date" class="label">Start Date</label>
                    <div class="control">
                        <input type="date" class="input" name="start_date" id="start_date" value="<?= old('start_date') ?>">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label for="end_date" class="label">End Date</label>
                    <div class="control">
                        <input type="date" class="input" name="end_date" id="end_date" value="<?= old('end_date') ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="checkbox">
                <input type="checkbox" name="featured" value="1" <?= old('featured') ? 'checked' : '' ?>>
                Featured Project
            </label>
        </div>

        <div class="field">
            <label for="order_index" class="label">Order</label>
            <div class="control">
                <input type="number" class="input" name="order_index" id="order_index" value="<?= old('order_index', 0) ?>">
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-primary">Add Project</button>
            </div>
            <div class="control">
                <a href="/admin/projects" class="button is-light">Cancel</a>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?> 