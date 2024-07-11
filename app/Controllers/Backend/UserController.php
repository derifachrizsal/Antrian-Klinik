<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $User = new UserModel();
        $data['user'] = $User->findAll();
        return view('Backend/user/index', $data);
    }

    public function tambah() 
    {
        $data = array();
        $data['list_poli'] = $this->list_poli();

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
                'password' => $this->request->getPost('password'),
            ]);

            return redirect('adm/user');
        }

        return view('Backend/user/add', $data);
    }

    public function edit($id) 
    {
        // Artikel yang di edit
        $data = array();
        $dokter = new UserModel();
        $data['dokter'] = $dokter->where('id_dokter', $id)->first();        
        $data['list_poli'] = $this->list_poli();
        
        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'usernamer' => 'required',
            'password' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost()) && $isDataValid) {
            $dokter->update($id, [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
            ]);

            return redirect('adm/dokter');
        }

        return view('Backend/dokter/edit', $data);
    }

    public function delete($id) 
    {
        $dokter = new UserModel();
        $dokter->delete($id);
        if ($dokter) {
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
        // return redirect('adm/dokter');
    }

    public function list_poli(){
        return array(
            ['value' => 'umum', 'nama' => 'Umum'],
            ['value' => 'gigi', 'nama' => 'Gigi'],
            ['value' => 'anak', 'nama' => 'Anak'],
            ['value' => 'kandungan', 'nama' => 'Kandungan'],
        );
    }
}
