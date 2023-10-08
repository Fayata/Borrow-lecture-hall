<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LoginController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }

    public function index()
    {
        return view('login');
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->findByUsername($username);

        // pencocokan password
        if ($user and md5($password) == $user->password) {
            return redirect()->to('/Home');
        } else {
            return redirect()->back()->with('error', 'login gagal');
        }
    }

    public function logout()
    {
        // clear session
    }
}
