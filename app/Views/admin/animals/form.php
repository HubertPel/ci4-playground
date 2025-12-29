<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<h1><?= isset($animal) ? 'Edytuj' : 'Dodaj' ?> zwierzę</h1>

<div class="form-card">
    <form method="post"
          action="<?= isset($animal)
              ? '/admin/animals/update/'.$animal['id']
              : '/admin/animals/store' ?>">

        <?= csrf_field() ?>

        <div class="form-group">
            <label>Nazwa</label>
            <input name="name"
                   value="<?= old('name', $animal['name'] ?? '') ?>"
                   class="<?= isset($validation) && $validation->hasError('name') ? 'is-invalid' : '' ?>">

            <?php if (isset($validation) && $validation->hasError('name')): ?>
                <div class="form-error">
                    <?= $validation->getError('name') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Gatunek</label>
            <input name="species"
                   value="<?= old('species', $animal['species'] ?? '') ?>"
                   class="<?= isset($validation) && $validation->hasError('species') ? 'is-invalid' : '' ?>">

            <?php if (isset($validation) && $validation->hasError('species')): ?>
                <div class="form-error">
                    <?= $validation->getError('species') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Wiek</label>
            <input type="number" name="age"
                   value="<?= old('age', $animal['age'] ?? '') ?>">

            <?php if (isset($validation) && $validation->hasError('age')): ?>
                <div class="form-error">
                    <?= $validation->getError('age') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary">💾 Zapisz</button>
            <a href="/admin/animals" class="btn btn-warning">Anuluj</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
