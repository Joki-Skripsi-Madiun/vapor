<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Kategori extends BaseController
{
    public function index()
    {
        $session = session();

        $data = [
            'session' => $session,
            'active'  => 'Kategori',
            'kategori' => $this->kategoriModel->getkategori(),
            
        ];
        return view('kategori/index', $data);
    }
    public function save()
    {
        if (!$this->validate(
            [
                'nama_kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ]


            ]

        )) {
            return redirect()->to('/kategori')->withInput();
        }

        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori'),


        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/kategori');
    }
    public function edit($id_kategori)
    {
        $kategori = $this->kategoriModel->getKategori($id_kategori);
        if (empty($kategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $data = [

            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategoriModel->getkategori($id_kategori),

        ];
        return view('kategori/edit', $data);
    }
    public function update($id_kategori)
    {


        if (!$this->validate(

            [
                'nama_kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ]


            ]

        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->kategoriModel->save([
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getVar('nama_kategori'),


        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('kategori');
    }
    public function delete($id_kategori)
    {
        $this->kategoriModel->delete($id_kategori);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('kategori');
    }
}
