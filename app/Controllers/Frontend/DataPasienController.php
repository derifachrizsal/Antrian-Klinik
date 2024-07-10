<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PasienModel;
class DataPasienController extends BaseController
{
    public function index()
    {
        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama'         =>'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'goldar' => 'required',
            'alamat_lengkap' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'pendidikan_terakhir' => 'required',
            'pekerjaan' => 'required',
            'NIK' => 'required',
            'No_BPJS' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost()) && $isDataValid) {
            $pasien = new PasienModel();
            $pasien->insert([
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'gol_darah' => $this->request->getPost('goldar'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
                'no_telp' => $this->request->getPost('no_telp'),
                'email' => $this->request->getPost('email'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'no_BPJS' => $this->request->getPost('no_BPJS'),
                'NIK' => $this->request->getPost('NIK'),
                'kelurahan' => $this->request->getPost('kelurahan'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kode_pos' => $this->request->getPost('kode_pos'),
                'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
            ]);

            return redirect('datapasien');
        }
        echo view('Frontend/datapasien');
    }
}
