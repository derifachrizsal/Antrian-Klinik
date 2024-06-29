<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        echo view('Backend/part/header');
        echo view('Backend/part/top_menu');
        echo view('Backend/part/side_menu');
        echo view('Backend/dashboard');
        echo view('Backend/part/footer');
    }
}
