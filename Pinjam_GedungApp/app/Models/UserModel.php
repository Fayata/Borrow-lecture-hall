<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowsField = [username, email, password];

    public function get_data($username, $password)
    {
        return $this->db->table('users')
            ->where(array('username' => $username, 'user_pass' => $password))
            ->get()->getRowArray();
    }


}