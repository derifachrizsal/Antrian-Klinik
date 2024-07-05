<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class RegisterController extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }
    public function save()
    {
         //include helper form
         helper(['form']);
         //set rules validation form
         $rules = [
            'nama'          =>'required|min_length[3]|max)_length[20]',
            'email'         =>'required|min_length[3]|max)_length[20]',
            'password'      =>'required|min_length[3]|max)_length[20]',
            'confpassword'  =>'required|min_length[3]|max)_length[20]',
         ];
         if($this->validate($rules)){
            $model = new UserModel();
            $data  =[
                'nama'      => $this->request->getVar('nama'),
                'email'     => $this->request->getVar('email'),
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
     }
    }
}
