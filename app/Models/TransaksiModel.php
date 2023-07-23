<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_barang',  'id_pembayaran', 'id_user', 'tgl', 'keterangan'];
    // protected $useTimestamps = true;


    public function getTransaksi($id_transaksi = false)
    {
        if ($id_transaksi == false) {
            return $this->findAll();
        }
        return $this->where(['id_transaksi' => $id_transaksi])->first();
    }

    public function hitungJumlahUsers()
    {
        $akun = $this->query('SELECT * FROM user');
        return $akun->getNumRows();
    }
    public function joinTransaksi($id_transaksi = false)
    {
        if ($id_transaksi == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('transaksi');
            $builder->select('*');

            $builder->join('user', 'user.id_user = transaksi.id_user');
            $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
            $query = $builder->get();
            return $query->getResultArray();
        }
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('*');

        $builder->join('user', 'user.id_user = transaksi.id_user');
        $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
        $builder->where('id_transaksi', $id_transaksi);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
