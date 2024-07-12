<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\PasienModel;
use App\Models\UserModel;

class PasienController extends BaseController
{
    public function index()
    {
        $pasien = new PasienModel();
        $data['pasien'] = $pasien->findAll();
        return view('Backend/pasien/index', $data);
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
        $pasien = new PasienModel();
        $data['pasien'] = $pasien->where('id_pasien', $id)->first();
        
        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama'         =>'required',
            'jeniskelamin' => 'required',
            'Tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'goldar' => 'required',
            'alamatlengkap' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kodepos' => 'required',
            'notelp' => 'required',
            'email' => 'required',
            'pendidikanterakhir' => 'required',
            'pekerjaan' => 'required',
            'NIK' => 'required',
            'nobpjs' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        // valid ?
        if (!empty($this->request->getPost())) {
            if ($isDataValid){
                $pasien->update($id, [
                    'nama' => $this->request->getPost('nama'),
                    'jenis_kelamin' => $this->request->getPost('jeniskelamin'),
                    'gol_darah' => $this->request->getPost('goldar'),
                    'tempat_lahir' => $this->request->getPost('Tempatlahir'),
                    'tanggal_lahir' => $this->request->getPost('tanggallahir'),
                    'alamat_lengkap' => $this->request->getPost('alamatlengkap'),
                    'no_telp' => $this->request->getPost('notelp'),
                    'email' => $this->request->getPost('email'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'no_bpjs' => $this->request->getPost('nobpjs'),
                    'nik' => $this->request->getPost('NIK'),
                    'kelurahan' => $this->request->getPost('kelurahan'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kode_pos' => $this->request->getPost('kodepos'),
                    'pendidikan_terakhir' => $this->request->getPost('pendidikanterakhir'),
                ]);

                return redirect('adm/pasien');
            }
        }

        return view('Backend/pasien/edit', $data);
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
    }

    public function detail($id) 
    {
        // Artikel yang di edit
        $data = array();
        $pasien = new PasienModel();
        $user = new UserModel();
        $data['pasien'] = $pasien->where('id_pasien', $id)->first();
        if (!empty($data['pasien'])) {
            $data['user'] = $user->where('id_user', $data['pasien']['id_user'])->first();

            return view('Backend/pasien/detail', $data);
        } else {
            return redirect('adm/pasien');
        }
        
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
