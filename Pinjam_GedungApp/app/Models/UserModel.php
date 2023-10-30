<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowsField = ['username', 'email', 'password'];

    public function get_data($email, $password)
    {
        return $this->db->table('users')
            ->where(array('email' => $email, 'password' => $password))
            ->get()->getRowArray();
    }


    // findByUsername
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }


}