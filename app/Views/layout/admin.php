<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Admin Panel') ?></title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .navbar {
            height: 50px;
            background: #111827;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .navbar a {
            color: #93c5fd;
            text-decoration: none;
            margin-left: 10px;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 50px);
        }

        .sidebar {
            width: 220px;
            background: #1f2937;
            padding: 15px 0;
        }

        .sidebar a {
            display: block;
            padding: 10px 20px;
            color: #d1d5db;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #374151;
            color: #fff;
        }

        .content {
            flex: 1;
            padding: 25px;
            background: #fff;
        }

        h1 {
            margin-top: 0;
        }
    </style>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>

<?= $this->include('partials/navbar') ?>

<div class="layout">
    <?= $this->include('partials/sidebar') ?>

    <main class="content">
        <?= $this->renderSection('content') ?>
    </main>
</div>

</body>
</html>
