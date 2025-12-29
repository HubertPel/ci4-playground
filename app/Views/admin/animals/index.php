<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<h1>Zwierzęta</h1>

<div class="page-actions">
    <a href="/admin/animals/create" class="btn btn-primary">➕ Dodaj</a>
    <a href="/admin/animals/deleted" class="btn btn-warning">🗑 Usunięte</a>
</div>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nazwa</th>
        <th>Gatunek</th>
        <th>Wiek</th>
        <th>Akcje</th>
    </tr>

    <?php foreach ($animals as $a): ?>
        <tr>
            <td><?= $a['id'] ?></td>
            <td><?= esc($a['name']) ?></td>
            <td><?= esc($a['species']) ?></td>
            <td><?= esc($a['age']) ?></td>
            <td class="table-actions">
                <a href="/admin/animals/edit/<?= $a['id'] ?>" class="btn btn-sm btn-primary">✏️</a>
                <a href="/admin/animals/delete/<?= $a['id'] ?>" class="btn btn-sm btn-danger">🗑</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->endSection() ?>
