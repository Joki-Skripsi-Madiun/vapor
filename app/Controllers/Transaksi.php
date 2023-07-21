<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Transaksi extends BaseController
{
    public function index()
    {
        $session = session();

        $data = [
            'session' => $session,
            'active'  => 'Transaksi',
            'transaksi' => $this->transaksiModel->gettransaksi(),
            'barang' => $this->barangModel->getbarang(),
            'kategori' => $this->kategoriModel->getkategori(),
            'user' => $this->userModel->getuser(),
            'jointransaksi' => $this->transaksiModel->jointransaksi(),
            'joinbarang' => $this->barangModel->joinbarang(),
        ];
        return view('transaksi/index', $data);
    }
    public function save()
    {
        if (!$this->validate(
            [
                'nama_pembayaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ],
                'nomer' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomer Harus Diisi'
                    ]
                ]


            ]

        )) {
            return redirect()->to('pembayaran')->withInput();
        }

        $this->pembayaranModel->save([
            'nama_pembayaran' => $this->request->getVar('nama_pembayaran'),
            'nomer' => $this->request->getVar('nomer'),

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('pembayaran');
    }
    public function edit($id_pembayaran)
    {
        $pembayaran = $this->pembayaranModel->getPembayaran($id_pembayaran);
        if (empty($pembayaran)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $data = [

            'validation' => \Config\Services::validation(),
            'pembayaran' => $this->pembayaranModel->getpembayaran($id_pembayaran),

        ];
        return view('pembayaran/edit', $data);
    }
    public function update($id_pembayaran)
    {


        if (!$this->validate(

            [
                'nama_pembayaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ],
                'nomer' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomer Harus Diisi'
                    ]
                ]


            ]

        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->pembayaranModel->save([
            'id_pembayaran' => $id_pembayaran,
            'nama_pembayaran' => $this->request->getVar('nama_pembayaran'),
            'nomer' => $this->request->getVar('nomer'),

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('pembayaran');
    }
    public function delete($id_pembayaran)
    {
        $this->pembayaranModel->delete($id_pembayaran);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('pembayaran');
    }
}
