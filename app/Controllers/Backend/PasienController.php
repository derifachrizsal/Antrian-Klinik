<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\PasienModel;

class PasienController extends BaseController
{
    public function index()
    {
        $pasien = new PasienModel();
        $data['kat'] = $pasien->findAll();
        echo view('Backend/part/header');
        echo view('Backend/part/top_menu', $data);
        echo view('Backend/part/side_menu', $data);
        echo view('Backend/pasien', $data);
        echo view('Backend/part/footer');
    }

    // Tambah Data
    public function tambah() 
    {
        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules(['nama_pasien' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        // valid ?
        if ($isDataValid) {
            $kat = new PasienModel();
            $kat->insert([
                'nama_pasien' => $this->request->getPost('nama_pasien')
            ]);

            return redirect('pasien');
        }

        // Menampilkan Halaman Tambah Data
        echo view('Backend/part/header');
        echo view('Backend/part/top_menu');
        echo view('Backend/part/side_menu');
        echo view('Backend/pasien_add');
        echo view('Backend/part/footer');
    }

    // Edit Data
    public function edit($id) 
    {
        // Artikel yang di edit
        $kat = new PasienModel();
        $data['kategori'] = $kat->where('id_kategori', $id)->first();

        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules(['nama_kategori' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if ($isDataValid) {
            $kat->update($id, [
                'nama_kategori' => $this->request->getPost('nama_kategori')
            ]);

            return redirect('kategori');
        }

        // Menampilkan Halaman Edit Data
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('kategori_edit', $data);
        echo view('part_adm/footer');
    }

    // Hapus Data
    public function delete($id) 
    {
        $kat = new KategoriModel();
        $kat->delete($id);
        return redirect('kategori');
    }
}
