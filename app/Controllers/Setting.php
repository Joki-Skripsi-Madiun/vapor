<?php

namespace App\Controllers;



class Setting extends BaseController
{

    public function edit($id_user)
    {
        $tb_users = $this->datausersModel->getUsers($id_user);
        if (empty($tb_users)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $data = [

            'validation' => \Config\Services::validation(),
            'tb_users' => $this->datausersModel->getusers($id_user),
        ];
        return view('setting', $data);
    }
    public function update($id_user)
    {
        $this->datausersModel->save([
            'id_user' => $id_user,
            'nama' => $this->request->getVar('nama'),
            'no_induk' => $this->request->getVar('no_induk'),
            'kelas' => $this->request->getVar('kelas'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'foto' => $this->request->getVar('foto'),

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('dashboard');
    }
}
