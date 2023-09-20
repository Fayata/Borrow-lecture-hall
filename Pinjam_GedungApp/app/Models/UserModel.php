<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nama tabel user
    protected $primaryKey = 'id'; // Kolom primary key

    // Tambahkan method untuk mengambil data user, melakukan validasi login, dsb.
}