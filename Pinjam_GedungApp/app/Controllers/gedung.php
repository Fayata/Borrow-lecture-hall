<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilmModel;

class Gedung extends BaseController
{
    protected $film;

    public function __construct()
    {
        $this->film = new GedungModel();
    }

    public function index()
    {
        $data['dataGedung'] = $this->film->getAllDataJoin();
        return view("film/table", $data);
    }

    public function all()
    {
        $data['data_gedung'] = $this->film->getAllDataJoin();
        return view("gedung/index", $data);
    }
}