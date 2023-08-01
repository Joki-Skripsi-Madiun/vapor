<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nama'          => 'required|min_length[3]|max_length[50]',
            'tlp' => 'required|max_length[200]',
            'alamat' => 'required|max_length[60]',
            'username'      => 'required|min_length[5]|max_length[50]|is_unique[user.username]',
            'role'          => 'required',
            'password'      => 'required|min_length[5]|max_length[200]',
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();

            $data = [
                'nama'     => $this->request->getVar('nama'),
                'tlp'     => $this->request->getVar('tlp'),
                'alamat'     => $this->request->getVar('alamat'),
                'role' => $this->request->getVar('role'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}
