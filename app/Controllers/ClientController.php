<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;


class ClientController extends Controller
{
    public function index()
    {
        // Tampilkan halaman dashboard admin
        return view('client/dashboard');
    }

    public function client()
    {
        $userModel = new UserModel();

        // Ambil data pengguna dengan peran "users"
        $client = $userModel->where('role', 'client')->findAll();

        return view('client/list', ['client' => $client]);
    }
}
