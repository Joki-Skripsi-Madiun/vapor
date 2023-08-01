<?php

namespace App\Controllers;



class Setting extends BaseController
{

    public function edit($id_user)
    {
        $tb_users = $this->userModel->getUser($id_user);
        if (empty($tb_users)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $data = [

            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->getUser($id_user),
        ];
        return view('setting', $data);
    }
    public function update($id_user)
    {
        $password = $this->request->getVar('password');
        if ($password == "") {
            $passwordLama = $this->request->getVar('passwordLama');
        } else {
            $passwordLama = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->save([
            'id_user' => $id_user,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'tlp' => $this->request->getVar('tlp'),
            'alamat' => $this->request->getVar('alamat'),
            'password' => $passwordLama,
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('dashboard');
    }
}
