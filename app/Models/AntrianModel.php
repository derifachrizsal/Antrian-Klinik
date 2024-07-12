<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianModel extends Model {
    protected $table = 'tbl_antrian';
    protected $primaryKey   = 'id_antrian';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_pasien',
        'id_dokter',
        'poli',
        'tanggal_pendaftaran',
        'status_antrian',
        'no_antrian',
    ];
}