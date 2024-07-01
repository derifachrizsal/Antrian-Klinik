<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DaftarController extends BaseController
{
    public function index()
    {
        echo view('Frontend/part/header');
        echo view('Frontend/daftar');
        echo view('Frontend/part/footer');
    }
}
