<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori'];
    // protected $useTimestamps = true;


    public function getKategori($id_kategori = false)
    {
        if ($id_kategori == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori' => $id_kategori])->first();
    }

    public function hitungKategori()
    {
        $db = \Config\Database::connect();
        $query = $db->table('kategori');
        $query->selectCount('id_kategori');
        $result = $query->countAllResults();
        return $result;
    }
}
