<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\PasienModel;
use App\Models\DokterModel;
use App\Models\AntrianModel;

class DaftarController extends BaseController
{
    public function index()
    {
        echo view('Frontend/part/header');
        echo view('Frontend/daftar');
        echo view('Frontend/part/footer');
    }

    public function daftarPasien()
    {
        $data = array();
        $session = session();
        $pasien = new PasienModel();
        
        $data['id_user'] = $session->get('id');
        $data['pasien'] = $pasien->where("id_user", $data['id_user'])->get()->getResultArray();
        $data['list_poli'] = $this->list_poli();

        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_pasien' =>'required',
            'poli' => 'required',
            'id_dokter' => 'required',
            'tanggal' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost())) {
            if ($isDataValid){

                $antrian = new AntrianModel();

                $nomorTerakhir = $antrian->where([
                    'poli' => $this->request->getPost('poli'),
                    'tanggal_pendaftaran' => date('Y-m-d', strtotime($this->request->getPost('tanggal')))
                ])->countAllResults();

                // Ditambahin huruf depannya biar ga bingung
                $nomor = $this->hurufAntrian($this->request->getPost('poli')) . ($nomorTerakhir + 1);

                $antrian->insert([
                    'id_pasien' => $this->request->getPost('id_pasien'),
                    'id_dokter' => $this->request->getPost('id_dokter'),
                    'poli' => $this->request->getPost('poli'),
                    'tanggal_pendaftaran' => date('Y-m-d', strtotime($this->request->getPost('tanggal'))),
                    'status_antrian' => 1, // 1 berarti aktif
                    'no_antrian' => $nomor
                ]);

                $dokter = new DokterModel();

                $data['dokter_terdaftar'] = $dokter->where('id_dokter', $this->request->getPost('id_dokter'))->first();
                $data['pasien_terdaftar'] = $pasien->where('id_pasien', $this->request->getPost('id_pasien'))->first();
                $data['nomor'] = $nomor;

                $nomor_aktif = $antrian->where([
                    'poli' => $this->request->getPost('poli'),
                    'tanggal_pendaftaran' => date('Y-m-d', strtotime($this->request->getPost('tanggal'))),
                    'status_antrian' => 0
                ])->countAllResults();

                $data['nomor_saat_ini'] = $this->hurufAntrian($this->request->getPost('poli')) . ($nomor_aktif + 1);

                return view('Frontend/daftar_pasien_berhasil', $data);
            }
        }

        echo view('Frontend/daftar_pasien', $data);
    }

    public function daftarAntrian()
    {
        // validasi 
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_pasien' =>'required',
            'poli' => 'required',
            'id_dokter' => 'required',
            'tanggal' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // valid ?
        if (!empty($this->request->getPost())) {
            if ($isDataValid){

                $antrian = new AntrianModel();

                $nomorTerakhir = $antrian->where([
                    'poli' => $this->request->getPost('poli'),
                    'tanggal_pendaftaran' => $this->request->getPost('tanggal')
                ])->countAll();

                // Ditambahin huruf depannya biar ga bingung
                switch ($this->request->getPost('poli')) {
                    case 'umum':
                        $nomor = 'A' . ($nomorTerakhir + 1);
                        break;

                    case 'gigi':
                        $nomor = 'G' . ($nomorTerakhir + 1);
                        break;

                    case 'anak':
                        $nomor = 'C' . ($nomorTerakhir + 1);
                        break;

                    case 'kandungan':
                        $nomor = 'D' . ($nomorTerakhir + 1);
                        break;
                    
                    default:
                        $nomor = $nomorTerakhir + 1;
                        break;
                }

                $antrian->insert([
                    'id_pasien' => $this->request->getPost('id_pasien'),
                    'id_dokter' => $this->request->getPost('id_dokter'),
                    'poli' => $this->request->getPost('poli'),
                    'tanggal_pendaftaran' => date('Y-m-d', strtotime($this->request->getPost('tanggal'))),
                    'status_antrian' => 1, // 1 berarti aktif
                    'no_antrian' => $nomor
                ]);

                return redirect('daftar/daftarpasien');
            }
        }
    }

    public function getDokter($poli) 
    {
        $dokter = new DokterModel();
        $data = $dokter->where('poli', $poli)->get()->getResultArray();
        // echo '<pre>';print_r($data);die;
        if ($dokter) {
            echo json_encode([
                'status' => 'success',
                'code' => 200,
                'message' => 'Dokter Ditemukan',
                'data' => $data
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'code' => 200,
                'message' => 'Dokter Tidak Ditemukan'
            ]);
        }
    }

    public function hurufAntrian($poli) {
        switch ($poli) {
            case 'umum':
                $huruf = 'A';
                break;

            case 'gigi':
                $huruf = 'G';
                break;

            case 'anak':
                $huruf = 'C';
                break;

            case 'kandungan':
                $huruf = 'D';
                break;
            
            default:
                $huruf = "";
                break;
        }

        return $huruf;
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
