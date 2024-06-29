<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PoliController extends BaseController
{
    public function index()
    {
        echo view('Frontend/part/header');
        echo view('Frontend/poli');
        echo view('Frontend/part/footer');
    }
}
