<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowsField = ['username', 'email', 'password'];

    public function get_data($email, $password)
    {
        return $this->db->table('admin')
            ->where(array('email' => $email, 'password' => $password))
            ->get()->getRowArray();
    }


    // findByUsername
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }


}