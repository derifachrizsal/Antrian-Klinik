<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        if (session()->get('is_admin') == 1) {
            $User = new UserModel();
            $data['user'] = $User->findAll();
            return view('Backend/user/index', $data);
        } else {
            return redirect('/');
        }
    }

    public function tambah() 
    {
        if (session()->get('is_admin') == 1) {
            $data = array();

            // validasi 
            $validation = \Config\Services::validation();
            $validation->setRules([
                'username' => 'required',
                'password' => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            // valid ?
            if (!empty($this->request->getPost()) && $isDataValid) {
                $User = new UserModel();
                $User->insert([
                    'username' => $this->request->getPost('username'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                ]);

                return redirect('adm/user');
            }

            return view('Backend/user/add', $data);
        } else {
            return redirect('/');
        }
    }

    public function edit($id) 
    {
        if (session()->get('is_admin') == 1) {

            // Artikel yang di edit
            $data = array();
            $user = new UserModel();
            $data['user'] = $user->where('id_user', $id)->first();
            
            // validasi 
            $validation = \Config\Services::validation();
            $validation->setRules([
                'username' => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            // valid ?
            if (!empty($this->request->getPost()) && $isDataValid) {
                $insert_data = ['username' => $this->request->getPost('username')];

                if (!empty($this->request->getPost('password'))) {
                    $insert_data = [
                        ...$insert_data, 
                        'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                    ];
                }

                $user->update($id, $insert_data);

                return redirect('adm/user');
            }

            return view('Backend/user/edit', $data);

        } else {
            return redirect('/');
        }
    }

    public function delete($id) 
    {
        if (session()->get('is_admin') == 1) {
            $user = new UserModel();
            $user->delete($id);
            if ($user) {
                echo json_encode([
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'Data Berhasil Dihapus'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'code' => 200,
                    'message' => 'Data Gagal Dihapus'
                ]);
            }
        } else {
            return redirect('/');
        }
    }
}
