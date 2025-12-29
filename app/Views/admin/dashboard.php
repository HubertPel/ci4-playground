<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<h1>Dashboard</h1>
<p>Witaj <?= esc(session('username')) ?></p>

<?= $this->endSection() ?>
