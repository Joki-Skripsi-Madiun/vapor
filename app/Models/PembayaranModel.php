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

    public function hitungPembayaran()
    {
        $db = \Config\Database::connect();
        $query = $db->table('pembayaran');
        $query->selectCount('id_pembayaran');
        $result = $query->countAllResults();
        return $result;
    }
}
