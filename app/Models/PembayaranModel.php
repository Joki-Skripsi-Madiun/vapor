<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table      = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = ['nama_pembayaran', 'nomer'];
    // protected $useTimestamps = true;


    public function getPembayaran($id_pembayaran = false)
    {
        if ($id_pembayaran == false) {
            return $this->findAll();
        }
        return $this->where(['id_pembayaran' => $id_pembayaran])->first();
    }

    public function hitungJumlahUsers()
    {
        $akun = $this->query('SELECT * FROM user');
        return $akun->getNumRows();
    }
    // public function joinMobil($id_akun = false)
    // {
    //     if ($id_akun == false) {
    //         $db      = \Config\Database::connect();
    //         $builder = $db->table('mobil');
    //         $builder->select('*');
    //         $builder->join('merk', 'merk.id_merk = mobil.id_merk');
    //         $query = $builder->get();
    //         return $query;
    //     }
    //     return $this->where(['id_akun' => $id_akun])->first();
    // }



}
