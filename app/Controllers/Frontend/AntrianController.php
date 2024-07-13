<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\PasienModel;
use App\Models\DokterModel;
use App\Models\AntrianModel;

class AntrianController extends BaseController
{
    public function index($type)
    {
        // echo '<pre>';print_r(session()->get());die;

        $data = array();
        $pasien = new PasienModel();
        $dokter = new DokterModel();
        $antrian = new AntrianModel();

        $antrian_hari_ini = $antrian->where([
            'poli' => $type,
            'tanggal_pendaftaran' => date('Y-m-d')
        ])->first();

        if (!empty($antrian_hari_ini)) {
            $antrian_aktif = $antrian->where([
                'poli' => $type,
                'tanggal_pendaftaran' => date('Y-m-d'),
                'status_antrian' => 2
            ])->first();

            if (!empty($antrian_aktif)) {
                $data['dokter_terdaftar'] = $dokter->where('id_dokter', $antrian_aktif['id_dokter'])->first();
                $data['pasien_terdaftar'] = $pasien->where('id_pasien', $antrian_aktif['id_pasien'])->first();
                $data['nomor_saat_ini'] = $antrian_aktif['no_antrian'];
            }

            $nomor_selesai = $antrian->where([
                'poli' => $type,
                'tanggal_pendaftaran' => date('Y-m-d'),
                'status_antrian' => 0
            ])->countAllResults();

            $total_antrian = $antrian->where([
                'poli' => $type,
                'tanggal_pendaftaran' => date('Y-m-d')
            ])->countAllResults();

            $data['nomor_selesai'] = $this->hurufAntrian($type) . ($nomor_selesai);
            $data['total_antrian'] = $this->hurufAntrian($type) . ($total_antrian);
        }

        
        return view('Frontend/antrian', $data);

        echo view('Frontend/part/header');
        echo view('Frontend/antrian');
        echo view('Frontend/part/footer');
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
}
