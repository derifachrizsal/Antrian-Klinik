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
        'alamat_lengkap',
        'kelurahan',
        'kecamatan',
        'kode_pos',
        'no_telp',
        'email',
        'pekerjaan',
        'pendidikan_terakhir',
        'no_bpjs',
        'nik',
    ];
}