<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RoleController extends BaseController
{
    /**
     * @checkClient
     */
    public function admin()
    {
        return view('admin/dashboard');
    }

    public function client()
    {
        return view('client/dashboard');
    }
}