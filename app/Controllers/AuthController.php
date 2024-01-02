<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;


class AuthController extends Controller
{
    private function createUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ];

        if ($user['role'] == 'admin') {
            session()->set('admin', $data);
        } elseif ($user['role'] == 'anggota') {
            session()->set('anggota', $data);
        }
    }

    public function login()
    {
        helper('form');
        return view('auth/login');
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        if ($user) {
            if ($user['status_akun'] === 'aktif' && password_verify($password, $user['password'])) {
                $this->createUserSession($user);
                session()->set('user', $user);

                $successMessage = 'Login berhasil';
                if ($user['role'] == 'admin') {
                    return redirect()->to('/AdminController')->with('success', $successMessage);
                } elseif ($user['role'] == 'anggota') {
                    return redirect()->to('/AnggotaController')->with('success', $successMessage);
                }
            } elseif ($user['status_akun'] === 'nonaktif') {
                // Akun nonaktif, tampilkan pesan error
                return redirect()->back()->with('error', 'Akun tidak aktif');
            } else {
                // Password tidak cocok
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            // Pengguna tidak ditemukan
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function register()
    {
        helper('form');
        return view('auth/register');
    }

    public function processRegister()
    {
        $anggotaModel = new UserModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'nomor_telepon' => $this->request->getPost('nohp'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'anggota',
            'status_akun' => 'nonaktif' 
        ];

        $anggotaModel->addUser($data);

        if ($anggotaModel->db->affectedRows() > 0) {
            // Jika berhasil, set pesan sukses menggunakan flash session
            return redirect()->to('/')->with('success', 'Registrasi berhasil, tunggu konfirmasi admin');
        } else {
            // Jika gagal, set pesan error menggunakan flash session
            return redirect()->back()->with('error', 'Data gagal disimpan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
