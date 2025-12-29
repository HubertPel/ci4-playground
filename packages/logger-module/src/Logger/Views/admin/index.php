<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<h1>Logi systemowe</h1>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Level</th>
        <th>Request</th>
        <th>GET</th>
        <th>POST</th>
        <th>Data</th>
    </tr>

    <?php foreach ($logs as $log): ?>
        <tr>
            <td><?= $log['id'] ?></td>
            <td>
                <span class="badge badge-info">
                    <?= esc($log['level']) ?>
                </span>
            </td>
            <td><?= esc($log['message']) ?></td>
            <td><small><?= esc($log['get']) ?></small></td>
            <td><small><?= esc($log['post']) ?></small></td>
            <td><?= esc($log['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->endSection() ?>
