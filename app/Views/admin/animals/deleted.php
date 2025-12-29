<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<h1>Usunięte zwierzęta</h1>

<div class="page-actions">
    <a href="/admin/animals" class="btn btn-primary">⬅ Powrót</a>
</div>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nazwa</th>
        <th>Gatunek</th>
        <th>Akcja</th>
    </tr>

    <?php foreach ($animals as $a): ?>
        <tr>
            <td><?= $a['id'] ?></td>
            <td><?= esc($a['name']) ?></td>
            <td><?= esc($a['species']) ?></td>
            <td>
                <a href="/admin/animals/restore/<?= $a['id'] ?>" class="btn btn-sm btn-success">
                    ♻️ Przywróć
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->endSection() ?>
