<?php

namespace App\Controllers\users;

use App\Controllers\BaseController;
use App\Models\GedungModel;

class Gedung extends BaseController
{
    protected $gedung;

    public function __construct()
    {
        $this->gedung = new GedungModel();
    }

    public function index()
    {
        $data['Gedung'] = $this->gedung->getAllDataJoin();
        return view("gedung/table", $data);
    }

    public function all()
    {
        $data['gedung'] = $this->gedung->getAllDataJoin();
        return view("gedung/index", $data);
    }
}