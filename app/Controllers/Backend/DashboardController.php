<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\AntrianModel;

class DashboardController extends BaseController
{
    public function index()
    {
        if (session()->get('is_admin') == 1) {

            $data = array();
            $antrian = new AntrianModel();
            $data['total_pasien'] = $antrian->where([
                'tanggal_pendaftaran' => date('Y-m-d')
            ])->countAllResults();
            $data['total_selesai'] = $antrian->where([
                'tanggal_pendaftaran' => date('Y-m-d'),
                'status_antrian' => 0
            ])->countAllResults();

            echo view('Backend/part/header');
            echo view('Backend/part/top_menu');
            echo view('Backend/part/side_menu');
            echo view('Backend/dashboard', $data);
            echo view('Backend/part/footer');
        } else {
            return redirect('/');
        }
        
    }
}
