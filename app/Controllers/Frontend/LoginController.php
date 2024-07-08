<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        echo view('login');
    }
    public function auth()
    {
         $session = session();
         $model = new UserModel();
         $email = $this->request->getVar('email');
         $password = $this->request->getVar('password');
         $data = $model->where('email', $email)->first();
         if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
            'id'          =>$data['id'],
            'nama'         =>$data['nama'],
            'email'      =>$data['email'],
            'logged_in'  =>TRUE
         ];
         $session->set($ses_data);
         return redirect()->to('/dashboard');
    }else{
        $session->setFlashdata('msg', 'Wrong Password');
         return redirect()->to('/login');
    }
    }else{
         $session->setFlashdata('msg', 'Email not Found');
         return redirect()->to('/login');
    }
}
    public function logout()
{
    $session = session();
    $session->destory();
    return redirect()->to('/login');
    }
{