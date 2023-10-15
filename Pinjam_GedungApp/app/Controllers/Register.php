<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Register extends Controller
{
    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }
    public function index()
    {
        return view('register');
    }

    public function processRegister()
    {
        if (
            !$this->validate([
                'email' => "required|valid_email|is_unique[users.email]", //aturan is_unique
                'password' => 'required|min_length[4]',
            ])
        ) {
            return redirect()->back()->with('error_validasi', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Simpan data ke database
        $data = [
            'email' => $email,
            'password' => md5($password),
        ];

        $this->userModel->insert($data);

        // set session
        session()->setFlashdata('success', 'Data berhasil disimpan.');

        // Redirect ke halaman
        return redirect()->to('/login');
    }

}