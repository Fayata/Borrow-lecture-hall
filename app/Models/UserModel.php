<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'nama', 'email', 'role','nomor_telepon','status_akun'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getUsers()
    {
        return $this->findAll();
    }

    public function getUser($id)
    {
        return $this->find($id);
    }

    public function addUser($data)
    {
        $this->insert($data);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }

    public function activateUser($id)
    {
        $this->update($id, ['status_akun' => 'aktif']);
    }

    public function deactivateUser($id)
    {
        $this->update($id, ['status_akun' => 'nonaktif']);
    }
}
