<?php
namespace App\Validation;

use App\Models\DokterModel;

class checkNIK{
  public $length = 10;

  public $checkData = false;
  
  public function checkNIK(string $str, string &$error = null){
    $dokter = new DokterModel();
    $this->checkData = $dokter->where('nik_dokter', $str)->first();
    if (!$this->checkData)
    {
        return true;
    }
    //pesan jika gagal validasi
    $error = "Dokter dengan NIK tersebut sudah terdaftar, Mohon untuk gunakan data lain.";
    return false;
  }
}