<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenanggungJawabModel;
use CodeIgniter\Model;

class PenanggungJawabController extends BaseController
{
    protected $penanggungJawab;

    public function __construct()
    {
        $this->penanggungJawab = new PenanggungJawabModel();
    }

    public function index()
    {
        // return tampilan
        return view()
    }

    public function add()
    {
        // tampilan tambah penanggungjawab
    }

    public function insert()
    {
        // aksi menyimpan ke db
    }

    public function edit()
    {
        // tampilan edit
    }

    public function update()
    {
        // update ke database
    }

    public function delete()
    {
        // update ke db
    }
}
