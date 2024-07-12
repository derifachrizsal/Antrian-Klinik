<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AntrianController extends BaseController
{
    public function index()
    {
        echo view('Frontend/part/header');
        echo view('Frontend/antrian');
        echo view('Frontend/part/footer');
    }
}
