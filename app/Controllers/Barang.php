<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Barang extends BaseController
{
    public function index()
    {
        $session = session();

        $data = [
            'session' => $session,
            'active'  => 'Barang',
            'barang' => $this->barangModel->getbarang(),
            'kategori' => $this->kategoriModel->getkategori(),
            'joinbarang' => $this->barangModel->joinbarang(),
        ];
        return view('barang/index', $data);
    }
    public function save()
    {
        if (!$this->validate(
            [
                'nama_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ],
                'jumlah_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'jumlah Harus Diisi.',
                    ]
                ], 'harga_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'harga Harus Diisi.',
                    ]
                ],
                'id_kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kategori Harus Diisi.',
                    ]
                ],
                'foto' => [
                    'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                    'errors' => [
                        'is_image' => 'File yang anda upload bukan gambar',
                        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]
                ],


            ]

        )) {
            return redirect()->to('/barang')->withInput();
        }
        // ambil gambar
        $fileFoto = $this->request->getFile('foto');

        //apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            // $namaFoto = 'default-akun.png';
            $namaFoto = 'default-barang.png';
        } else {
            //generate nama 

            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('img', $namaFoto);
        }

        $this->barangModel->save([
            'nama_barang' => $this->request->getVar('nama_barang'),
            'jumlah_barang' => $this->request->getVar('jumlah_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'foto' => $namaFoto

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/barang');
    }
    public function edit($id_barang)
    {
        $barang = $this->barangModel->getBarang($id_barang);
        if (empty($barang)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $data = [

            'validation' => \Config\Services::validation(),
            'barang' => $this->barangModel->getbarang($id_barang),
            'kategori' => $this->kategoriModel->getkategori(),
            'joinbarang' => $this->barangModel->joinbarang($id_barang),

        ];
        return view('barang/edit', $data);
    }
    public function update($id_barang)
    {


        if (!$this->validate(

            [
                'nama_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ],
                'jumlah_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'jumlah Harus Diisi.',
                    ]
                ], 'harga_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'harga Harus Diisi.',
                    ]
                ],
                'id_kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kategori Harus Diisi.',
                    ]
                ],
                'foto' => [
                    'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                    'errors' => [
                        'is_image' => 'File yang anda upload bukan gambar',
                        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]
                ],

            ]

        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }


        // ambil foto
        $fileFoto = $this->request->getFile('foto');
        $fotoLama = $this->request->getVar('oldfoto');
        //apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('oldfoto');
        } elseif ($fotoLama == 'default-barang.png') {
            //generate nama gambar
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('img', $namaFoto);
        } else {
            //generate nama gambar
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('img', $namaFoto);
            // hapus file nama
            unlink('img/' . $this->request->getVar('oldfoto'));
        }
        $this->barangModel->save([
            'id_barang' => $id_barang,
            'nama_barang' => $this->request->getVar('nama_barang'),
            'jumlah_barang' => $this->request->getVar('jumlah_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'foto' => $namaFoto


        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('barang');
    }
    public function delete($id_barang)
    {
        // cari gambar berdasarkan id
        $barang = $this->barangModel->find($id_barang);

        // cek jika gambar default-barang.png
        if ($barang['foto'] != 'default-barang.png') {
            //hapus gambar
            unlink('img/' . $barang['foto']);
        }
        $this->barangModel->delete($id_barang);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('barang');
    }
}
