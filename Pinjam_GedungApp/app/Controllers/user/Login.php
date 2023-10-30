<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
        helper("cookie");
    }

    public function index()
    {
        return view('user/login');
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
        $remember_me = $this->request->getVar('remember_me');

        if ($remember_me == '1') {
            set_cookie('cookie_email', $email, 3600 * 24 * 30);
            set_cookie('cookie_password', $password, 3600 * 24 * 30);
        }

        // pencocokan password
        if ($user and md5($password) == $user['password']) {
            // set session
            session()->set([
                'email' => $user['email']
            ]);
            // baru redirect to home
            return redirect()->to('user/home')->withCookies();
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