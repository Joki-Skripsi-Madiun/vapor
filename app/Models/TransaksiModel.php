<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_barang',  'id_pembayaran', 'id_user', 'tgl', 'ekspedisi', 'no_resi', 'keterangan', 'bukti_pembayaran'];
    // protected $useTimestamps = true;


    public function getTransaksi($id_transaksi = false)
    {
        if ($id_transaksi == false) {
            return $this->findAll();
        }
        return $this->where(['id_transaksi' => $id_transaksi])->first();
    }

    public function hitungTransaksi()
    {
        $db = \Config\Database::connect();
        $query = $db->table('transaksi');
        $query->selectCount('id_transaksi');
        $result = $query->countAllResults();
        return $result;
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

    public function joinTransaksiUsers($id_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('*');
        $builder->join('user', 'user.id_user = transaksi.id_user');
        $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
        $builder->where('transaksi.id_user', $id_user);
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function joinTransaksiBulan($bulan, $tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('*');
        $builder->join('user', 'user.id_user = transaksi.id_user');
        $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
        $builder->where('MONT(transaksi.tgl)', $bulan);
        $builder->where('YEAR(transaksi.tgl)', $tahun);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
