<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model 
{
    protected $table        = 'tbl_pasien';
    protected $primaryKey   = 'id_pasien';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nama',
        'jenis_kelamin',
        'gol_darah',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telp',
        'email',
        'pekerjaan',
        'no_bpjs',
        'nik',
    ];
}