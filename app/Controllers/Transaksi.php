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
            'transaksi' => $this->transaksiModel->getTransaksi(),
            'barang' => $this->barangModel->getbarang(),
            'kategori' => $this->kategoriModel->getkategori(),
            'user' => $this->userModel->getuser(),
            'jointransaksi' => $this->transaksiModel->joinTransaksi(),
            'joinbarang' => $this->barangModel->joinbarang(),
        ];
        return view('transaksi/index', $data);
    }


    public function create()
    {
        $session = session();

        $data = [
            'session' => $session,
            'active'  => 'Transaksi',
            'cart'  => $this->cart->contents(),
            'transaksi' => $this->transaksiModel->gettransaksi(),
            'pembayaran' => $this->pembayaranModel->getPembayaran(),
            'barang' => $this->barangModel->getbarang(),
            'kategori' => $this->kategoriModel->getkategori(),
            'user' => $this->userModel->getuser(),
            'jointransaksi' => $this->transaksiModel->jointransaksi(),
            'joinbarang' => $this->barangModel->joinbarang(),
        ];
        return view('transaksi/create', $data);
    }
    public function save()
    {
        $data_produk = [
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('nama'),
            'price' => $this->request->getVar('harga'),
            'gambar' => $this->request->getVar('gambar'),
            'qty' => $this->request->getVar('qty')
        ];
        $this->cart->insert($data_produk);
        // $this->cart->destroy();
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('transaksi/create');
    }

    function hapus($rowid)
    {
        if ($rowid == "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        return redirect()->to('transaksi/create');
    }

    function ubah_cart()
    {
        $cart_info = $_POST['cart'];
        foreach ($cart_info as $id => $cart) {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $gambar = $cart['gambar'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'gambar' => $gambar,
                'amount' => $amount,
                'qty' => $qty
            );
            $this->cart->update($data);
        }
        return redirect()->to('transaksi/create');
    }

    public function proses_order()
    {
        //-------------------------Input data order------------------------------
        $data_transaksi = array(
            'tgl' => date('Y-m-d'),
            'id_user' => $this->request->getVar('id_user'),
            'id_pembayaran' => $this->request->getVar('id_pembayaran'),
            'keterangan' => $this->request->getVar('keterangan')
        );
        $id_transaksi = $this->transaksiModel->insert($data_transaksi);
        //-------------------------Input data detail order-----------------------
        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $data_detail = array(
                    'id_transaksi' => $id_transaksi,
                    'id_barang' => $item['id'],
                    'qty' => $item['qty']
                );

                $proses = $this->detailModel->insert($data_detail);
            }
        }
        //-------------------------Hapus shopping cart--------------------------
        $this->cart->destroy();
        return redirect()->to('transaksi');
    }

    public function edit($id_transaksi)
    {
        $transaksi = $this->transaksiModel->getTransaksi($id_transaksi);
        if (empty($transaksi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $data = [

            'validation' => \Config\Services::validation(),
            'transaksi' => $this->transaksiModel->getTransaksi($id_transaksi),
            'jointransaksi' => $this->transaksiModel->joinTransaksi($id_transaksi),
            'pembayaran' => $this->pembayaranModel->getPembayaran(),
            'user' => $this->userModel->getUser(),

        ];
        return view('transaksi/edit', $data);
    }
    public function update($id_transaksi)
    {
        if (!$this->validate(

            [
                'id_pembayaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pembayaran Harus Diisi.',
                    ]
                ],
                'id_user' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pembeli Harus Diisi'
                    ]
                ]


            ]

        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->transaksiModel->save([
            'id_transaksi' => $id_transaksi,
            'id_pembayaran' => $this->request->getVar('id_pembayaran'),
            'id_user' => $this->request->getVar('id_user'),
            'keterangan' => $this->request->getVar('keterangan'),

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('transaksi');
    }
    public function delete($id_transaksi)
    {
        $this->detailModel->where('id_transaksi', $id_transaksi)->delete();
        $this->transaksiModel->delete($id_transaksi);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('transaksi');
    }
}
