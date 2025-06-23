<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="title is-2">Edit Education</h1>
    
    <form action="/admin/education/edit/<?= $education['id'] ?>" method="post">
        <?= csrf_field() ?>
        
        <div class="field">
            <label for="institution" class="label">Institution *</label>
            <div class="control">
                <input type="text" class="input" name="institution" id="institution" value="<?= old('institution', $education['institution']) ?>" required>
            </div>
        </div>
        
        <div class="field">
            <label for="degree" class="label">Degree *</label>
            <div class="control">
                <input type="text" class="input" name="degree" id="degree" value="<?= old('degree', $education['degree']) ?>" required>
            </div>
        </div>

        <div class="field">
            <label for="field_of_study" class="label">Field of Study *</label>
            <div class="control">
                <input type="text" class="input" name="field_of_study" id="field_of_study" value="<?= old('field_of_study', $education['field_of_study']) ?>" required>
            </div>
        </div>

        <div class="field">
            <label for="location" class="label">Location</label>
            <div class="control">
                <input type="text" class="input" name="location" id="location" value="<?= old('location', $education['location']) ?>">
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="start_date" class="label">Start Date *</label>
                    <div class="control">
                        <input type="date" class="input" name="start_date" id="start_date" value="<?= old('start_date', $education['start_date']) ?>" required>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label for="end_date" class="label">End Date</label>
                    <div class="control">
                        <input type="date" class="input" name="end_date" id="end_date" value="<?= old('end_date', $education['end_date']) ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="checkbox">
                <input type="checkbox" name="current" value="1" <?= old('current', $education['current']) ? 'checked' : '' ?>>
                I am currently studying here
            </label>
        </div>


        <div class="field">
            <label for="description" class="label">Description</label>
            <div class="control">
                <textarea name="description" id="description" class="textarea" rows="4"><?= old('description', $education['description']) ?></textarea>
            </div>
        </div>

        <div class="field">
            <label for="order_index" class="label">Order</label>
            <div class="control">
                <input type="number" class="input" name="order_index" id="order_index" value="<?= old('order_index', $education['order_index']) ?>">
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-primary">Update Education</button>
            </div>
            <div class="control">
                <a href="/admin/education" class="button is-light">Cancel</a>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?> 