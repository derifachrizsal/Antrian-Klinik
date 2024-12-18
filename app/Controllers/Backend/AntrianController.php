<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

use App\Models\AntrianModel;
use App\Models\DokterModel;
use App\Models\PasienModel;
use App\Models\UserModel;

class AntrianController extends BaseController
{
    public function index()
    {
        if (session()->get('is_admin') == 1) {
            $antrian = new AntrianModel();
            $data['antrian'] = $antrian->select('id_antrian, tbl_pasien.nama as nama_pasien, tbl_dokter.nama as nama_dokter, no_antrian, status_antrian, tbl_antrian.poli, tanggal_pendaftaran, status_antrian')
                            ->join('tbl_pasien', 'tbl_antrian.id_pasien = tbl_pasien.id_pasien')
                            ->join('tbl_dokter', 'tbl_antrian.id_dokter = tbl_dokter.id_dokter')
                            ->where([
                                'status_antrian' => 2,
                                'tanggal_pendaftaran' => date('Y-m-d'),
                            ])->get()->getResultArray();
            return view('Backend/antrian/index', $data);
        } else {
            return redirect('/');
        }    
    }

    public function indexAll()
    {
        if (session()->get('is_admin') == 1) {
            $antrian = new AntrianModel();
            $data['antrian'] = $antrian->select('id_antrian, tbl_pasien.nama as nama_pasien, tbl_dokter.nama as nama_dokter, no_antrian, status_antrian, tbl_antrian.poli, tanggal_pendaftaran, status_antrian')
                            ->join('tbl_pasien', 'tbl_antrian.id_pasien = tbl_pasien.id_pasien')
                            ->join('tbl_dokter', 'tbl_antrian.id_dokter = tbl_dokter.id_dokter')
                            ->get()->getResultArray();
            return view('Backend/antrian/index_all', $data);
        } else {
            return redirect('/');
        }    
    }

    public function detail($id)
    {
        if (session()->get('is_admin') == 1) {
            $antrian = new AntrianModel();
            $data['antrian'] = $antrian->where('id_antrian', $id)->first();

            $dokter = new DokterModel();
            $data['dokter'] = $dokter->where('id_dokter', $data['antrian']['id_dokter'])->first();

            $pasien = new PasienModel();
            $data['pasien'] = $pasien->where('id_pasien', $data['antrian']['id_pasien'])->first();
            
            $user = new UserModel();
            $data['user'] = $user->where('id_user', $data['pasien']['id_user'])->first();
            
            if (!empty($data['antrian'])) {
                return view('Backend/antrian/detail', $data);
            } else {
                return redirect('adm/antrian');
            }
        } else {
            return redirect('/');
        }    
    }

    public function approve($id) 
    {
        if (session()->get('is_admin') == 1) {
            $antrian = new AntrianModel();
            
            // update antrian saat ini
            $antrian->update($id, [
                'status_antrian' => 0,
            ]);

            // cek poli
            $poli = $antrian->find($id)['poli'];

            // cek antrian selanjutnya
            $antrian_aktif = $antrian->where([
                'poli' => $poli,
                'tanggal_pendaftaran' => date('Y-m-d'),
                'status_antrian' => 1
            ])->first();

            // dijadikan aktif
            if (!empty($antrian_aktif)){
                $antrian->update($antrian_aktif['id_antrian'], [
                    'status_antrian' => 2,
                ]);
            }

            return redirect('adm/antrian');
        } else {
            return redirect('/');
        }
    }
}
