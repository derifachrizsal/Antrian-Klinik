<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    public function index()
    {
        $session = session(); 
        // print_r($session->get());
        echo view('Frontend/part/header');
        echo view('Frontend/home');
        echo view('Frontend/part/footer');
    }
    
}
