<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table      = 'detail_transaksi';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['id_barang',  'id_transaksi', 'qty'];
    // protected $useTimestamps = true;


    public function getDetail($id_detail = false)
    {
        if ($id_detail == false) {
            return $this->findAll();
        }
        return $this->where(['id_detail' => $id_detail])->first();
    }

    public function hitungJumlahUsers()
    {
        $akun = $this->query('SELECT * FROM user');
        return $akun->getNumRows();
    }
    public function joinDetail($id_detail = false)
    {
        if ($id_detail == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('detail_transaksi');
            $builder->select('*');
            $builder->join('barang', 'barang.id_barang = detail.id_barang');
            $builder->join('user', 'user.id_user = transaksi.id_user');
            $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
            $query = $builder->get();
            return $query->getResultArray();
        }
        $db      = \Config\Database::connect();
        $builder = $db->table('detail_transaksi');
        $builder->select('*');
        $builder->join('barang', 'barang.id_barang = transaksi.id_barang');
        $builder->join('user', 'user.id_user = transaksi.id_user');
        $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
        $builder->where('id_detail', $id_detail);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function joinDetailTransaksi($id_detail = false)
    {
        if ($id_detail == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('detail_transaksi');
            $builder->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi');
            $builder->join('barang', 'barang.id_barang = detail_transaksi.id_barang');
            $builder->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $builder->join('user', 'user.id_user = transaksi.id_user');
            $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
            $query = $builder->get();
            return $query->getResultArray();
        }
        $db      = \Config\Database::connect();
        $builder = $db->table('detail_transaksi');

        $builder->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi');
        $builder->join('barang', 'barang.id_barang = transaksi.id_barang');
        $builder->join('user', 'user.id_user = transaksi.id_user');
        $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
        $builder->where('id_detail', $id_detail);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function joinDetailTransaksiBulan($bulan, $tahun)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('detail_transaksi');
        $builder->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi');
        $builder->join('barang', 'barang.id_barang = detail_transaksi.id_barang');
        $builder->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $builder->join('user', 'user.id_user = transaksi.id_user');
        $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
        $builder->where('MONTH(transaksi.tgl)', $bulan);
        $builder->where('YEAR(transaksi.tgl)', $tahun);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function joinDetailTransaksiDetail($id_transaksi)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('detail_transaksi');
        $builder->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi');
        $builder->join('barang', 'barang.id_barang = detail_transaksi.id_barang');
        $builder->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $builder->join('user', 'user.id_user = transaksi.id_user');
        $builder->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran');
        $builder->where('detail_transaksi.id_transaksi', $id_transaksi);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function PesananMobilSum($id_mobil, $proses, $bulan, $tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('order');
        $builder->selectSum('harga');
        $builder->where('id_mobil', $id_mobil);
        $builder->where('proses', $proses);
        $builder->where('MONTH(order.tgl_pinjam)', $bulan);
        $builder->where('YEAR(order.tgl_pinjam)', $tahun);
        $query = $builder->get();
        return $query->getRow()->harga;
    }
    // public function tambah_order($data)
    // {
    //     $db      = \Config\Database::connect();
    //     $db->insert('detail_transaksi', $data);
    //     $id = $db->insert_id();
    //     return (isset($id)) ? $id : FALSE;
    // }
}
