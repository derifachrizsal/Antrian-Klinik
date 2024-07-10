<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\DokterModel;

class DokterController extends BaseController
{
    public function index()
    {
        $dokter = new DokterModel();
        $data['dokter'] = $dokter->findAll();
        return view('Backend/dokter/index', $data);
    }

    public function tambah() 
    {
        $data = array();
        $data['list_poli'] = $this->list_poli();

        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_dokter' => 'required',
            'jk_dokter' => 'required',
            'alamat' => 'required',
            'np_dokter' => 'required',
            'poli_dokter' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost()) && $isDataValid) {
            $dokter = new DokterModel();
            $dokter->insert([
                'nama' => $this->request->getPost('nama_dokter'),
                'jenis_kelamin' => $this->request->getPost('jk_dokter'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telp' => $this->request->getPost('np_dokter'),
                'poli' => $this->request->getPost('poli_dokter')
            ]);

            return redirect('adm/dokter');
        }

        return view('Backend/dokter/add', $data);
    }

    public function edit($id) 
    {
        // Artikel yang di edit
        $data = array();
        $dokter = new DokterModel();
        $data['dokter'] = $dokter->where('id_dokter', $id)->first();        
        $data['list_poli'] = $this->list_poli();
        
        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_dokter' => 'required',
            'jk_dokter' => 'required',
            'alamat' => 'required',
            'np_dokter' => 'required',
            'poli_dokter' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost()) && $isDataValid) {
            $dokter->update($id, [
                'nama' => $this->request->getPost('nama_dokter'),
                'jenis_kelamin' => $this->request->getPost('jk_dokter'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telp' => $this->request->getPost('np_dokter'),
                'poli' => $this->request->getPost('poli_dokter')
            ]);

            return redirect('adm/dokter');
        }

        return view('Backend/dokter/edit', $data);
    }

    public function delete($id) 
    {
        $dokter = new DokterModel();
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