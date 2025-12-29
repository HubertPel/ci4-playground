<?php

namespace App\Controllers;

use App\Services\AuthService;

class Auth extends BaseController
{
    protected AuthService $auth;

    public function __construct()
    {
        $this->auth = new AuthService();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            if ($this->auth->attempt(
                $this->request->getPost('username'),
                $this->request->getPost('password')
            )) {
                return redirect()->to('/admin');
            }

            return view('auth/login', [
                'error' => 'Nieprawidłowy login lub hasło',
            ]);
        }

        return view('auth/login');
    }

    public function logout()
    {
        $this->auth->logout();
        return redirect()->to('/login');
    }
}
