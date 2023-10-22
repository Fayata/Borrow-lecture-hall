<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Register extends BaseController
{
    public function index()
    {
        return view('Register');
    }

    public function processRegister()
    {
        $model = new \App\Models\UserModel();

        $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        if ($model->save($data)) {
            return redirect()->to('/login')->with('success', 'Akun Anda telah berhasil dibuat. Silakan masuk.');
        } else {
            return redirect()->to('/register')->with('error', 'Terjadi kesalahan saat mencoba mendaftar.');
        }
    }
}