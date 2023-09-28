<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login');

    }
    public function processLogin()
    {
        $userModel = new \App\Models\UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        return redirect()->to('/Home');
    }
}