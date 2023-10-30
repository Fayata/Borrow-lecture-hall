<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        return view('user/Register');
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
            return redirect()->to('user/login')->with('success', 'Akun Anda telah berhasil dibuat. Silakan masuk.');
        } else {
            return redirect()->to('user/register')->with('error', 'Terjadi kesalahan saat mencoba mendaftar.');
        }
    }
}