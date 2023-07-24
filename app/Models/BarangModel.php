<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['nama_barang',  'id_kategori', 'jumlah_barang', 'harga_barang', 'foto'];
    // protected $useTimestamps = true;


    public function getBarang($id_barang = false)
    {
        if ($id_barang == false) {
            return $this->findAll();
        }
        return $this->where(['id_barang' => $id_barang])->first();
    }

    public function hitungJumlahUsers()
    {
        $akun = $this->query('SELECT * FROM user');
        return $akun->getNumRows();
    }
    public function joinBarang($id_barang = false)
    {
        if ($id_barang == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('barang');
            $builder->select('*');
            $builder->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $query = $builder->get();
            return $query->getResultArray();
        }
        $db      = \Config\Database::connect();
        $builder = $db->table('barang');
        $builder->select('*');
        $builder->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $builder->where('id_barang', $id_barang);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function decreaseStock($id_barang, $qty)
    {
        $barang = $this->find($id_barang);
        if ($barang) {
            $newStock = $barang['jumlah_barang'] - $qty;
            $this->update($id_barang, ['jumlah_barang' => $newStock]);
        }
    }
}
