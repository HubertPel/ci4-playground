<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f4f6f8;
            font-family: Arial, sans-serif;
        }

        .login-box {
            width: 360px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,.1);
        }

        .login-box h2 {
            margin: 0 0 20px;
            text-align: center;
            color: #111827;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #374151;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Logowanie</h2>

    <?php if (!empty($error)): ?>
        <div class="error">
            <?= esc($error) ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="username">Login</label>
            <input id="username" name="username" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Hasło</label>
            <input id="password" type="password" name="password" required>
        </div>

        <button type="submit">Zaloguj się</button>
    </form>
</div>

</body>
</html>
