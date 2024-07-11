<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
class LoginController extends BaseController
{
    public function index()
    {
        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_user'  =>'required',
            'nama' => 'required',
            'password' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost())) {
            if ($isDataValid){
                $pasien = new PasienModel();
                $pasien->insert([
                    'id_user' => $this->request->getPost('id_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                ]);

                return redirect('login');
            }
        }
        echo view('Frontend/login');
    }
    public function register()
    {
        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost())) {
            if ($isDataValid){
                $user = new UserModel();
                $user->insert([
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                ]);

                return redirect('login');
            }
        }
        echo view('Frontend/login');
    }
}

