<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class Utama extends BaseController
{

    public function index()
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
        return view('utama', $data);
    }
}
