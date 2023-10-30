<?php

namespace App\Models;

use CodeIgniter\Model;

class GedungModel extends Model
{
    protected $table = 'gedung';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowsField = ['nama_gedung', 'kapasitas', 'rincian', 'foto', 'status'];



}