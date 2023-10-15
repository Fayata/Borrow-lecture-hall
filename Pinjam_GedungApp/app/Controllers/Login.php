<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
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
        // validasi dipanggil pertama kali
        if (
            !$this->validate([
                'email' => "required|valid_email",
                'password' => 'required|min_length[4]',
            ])
        ) {
            return redirect()->back()->with('error_validasi', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->userModel->findByEmail($email);

        // pencocokan password
        if ($user and md5($password) == $user['password']) {
            // set session
            session()->set([
                'email' => $user['email']
            ]);
            // baru redirect to home
            return redirect()->to('/home');
        } else {
            return redirect()->back()->with('error', 'login gagal');
        }
    }

    public function processLogout()
    {
        // clear session
        session()->remove('email');
        return redirect()->to('login');
    }
}