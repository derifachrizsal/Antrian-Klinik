<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\PasienModel;

class DaftarPasienController extends BaseController
{
    public function index()
    {
        $data = array();
        $session = session();
        $pasien = new PasienModel();
        
        $data['id_user'] = $session->get('id');
        $data['pasien'] = $pasien->where("id_user", $data['id_user'])->get()->getResultArray();

        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' =>'required',
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
            'id_user' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost())) {
            if ($isDataValid){
                // echo "<pre>";print_r($this->request->getPost());die;
                $pasien = new PasienModel();
                $pasien->insert([
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
                    'id_user' => $this->request->getPost('id_user'),
                ]);

                return redirect('daftar_pasien');
            }
        }
        echo view('Frontend/part/header');
        echo view('Frontend/daftar_pasien', $data);
        echo view('Frontend/part/footer');
    }
}
