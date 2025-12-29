<?php

namespace App\Services;

use App\Models\UserModel;

class AuthService
{
    protected UserModel $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function attempt(string $username, string $password): bool
    {
        $user = $this->users->findByUsername($username);

        if (! $user || ! password_verify($password, $user['password'])) {
            return false;
        }

        session()->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'logged_in' => true,
            'is_admin'  => true,
        ]);

        return true;
    }

    public function logout(): void
    {
        session()->destroy();
    }
}
