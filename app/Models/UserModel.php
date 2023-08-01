<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama',  'username', 'password', 'role', 'tlp', 'alamat'];
    // protected $useTimestamps = true;


    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $id_user])->first();
    }

    public function hitungUsers()
    {
        $db = \Config\Database::connect();
        $query = $db->table('user');
        $query->selectCount('id_user');
        $result = $query->countAllResults();
        return $result;
    }
}
