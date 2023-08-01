<?php

namespace App\Controllers;



class Akun extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $session = session();
        $data = [
            'session' => $session,
            'user' => $this->userModel->getuser(),
        ];
        return view('user/index', $data);
    }

    public function save()
    {
        if (!$this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ],
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Harus Diisi.',
                    ]
                ],
                'role' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Harus Diisi.',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Harus Diisi.',
                    ]
                ],
                'tlp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'No Telepon Harus Diisi.',
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Telepon Harus Diisi.',
                    ]
                ]


            ]

        )) {
            return redirect()->to('user')->withInput();
        }

        $this->userModel->save([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'role' => $this->request->getVar('role'),
            'tlp' => $this->request->getVar('tlp'),
            'alamat' => $this->request->getVar('alamat'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('user');
    }

    public function edit($id_user)
    {
        $user = $this->userModel->getUser($id_user);
        if (empty($user)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $data = [

            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->getuser($id_user),

        ];
        return view('user/edit', $data);
    }
    public function update($id_user)
    {


        if (!$this->validate(

            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ],
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Harus Diisi.',
                    ]
                ],
                'role' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Harus Diisi.',
                    ]
                ],
                'tlp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'No Telepon Harus Diisi.',
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Harus Diisi.',
                    ]
                ]


            ]

        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $password = $this->request->getVar('password');
        if ($password == "") {
            $passwordLama = $this->request->getVar('passwordLama');
        } else {
            $passwordLama = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->save([
            'id_user' => $id_user,
            'nama' => $this->request->getVar('nama'),
            'role' => $this->request->getVar('role'),
            'username' => $this->request->getVar('username'),
            'tlp' => $this->request->getVar('tlp'),
            'alamat' => $this->request->getVar('alamat'),
            'password' => $passwordLama,
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('user');
    }
    public function deleteAkun($id_user)
    {
        $this->userModel->delete($id_user);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('user');
    }
}
