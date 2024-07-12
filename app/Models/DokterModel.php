<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model 
{
    protected $table        = 'tbl_dokter';
    protected $primaryKey   = 'id_dokter';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nama',
        'poli',
        'alamat',
        'jenis_kelamin',
        'no_telp',
        'image_dokter'
    ];
}