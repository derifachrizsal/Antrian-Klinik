<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
class LoginController extends BaseController
{
    public function index()
    {
        $data = array();
        echo view('Frontend/login', $data);
    }

    public function login()
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

            $user = new UserModel();

            $active_user = $user->where('username', $this->request->getPost('username'))->first();

            if (!empty($active_user)){
                if ($isDataValid){
                    $session = session();
                    $pass = $active_user['password'];
                    $verify_pass = password_verify($this->request->getPost('password'), $pass);
                    $is_admin = $active_user['is_admin'];
                    if($verify_pass){
                        $ses_data = [
                            'id' => $active_user['id_user'],
                            'username' => $active_user['username'],
                            'logged_in'  =>TRUE,
                            'is_user' => !$is_admin,
                            'is_admin' => $is_admin
                        ];
                        $session->set($ses_data);
                    }

                    if ($is_admin == 1) {
                        return redirect('adm');
                    } else{
                        return redirect('daftar');
                    }
                    
                } else {
                    return redirect('login');
                }
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
            'confirmpassword' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost())) {
            if ($isDataValid){
                if ($this->request->getPost('password') == $this->request->getPost('confirmpassword')) {
                    $user = new UserModel();
                    $user->insert([
                        'username' => $this->request->getPost('username'),
                        'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                    ]);

                    return redirect('login');
                } else {
                    return redirect('login');
                }
            }
        }
        echo view('Frontend/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect('/');
    }
}

