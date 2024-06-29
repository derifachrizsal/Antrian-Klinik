<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DokterController extends BaseController
{
    public function index()
    {
        echo view('Frontend/part/header');
        echo view('Frontend/dokter');
        echo view('Frontend/part/footer');
    }
}
