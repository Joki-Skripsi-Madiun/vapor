<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Laporan extends BaseController
{
    public function index()
    {
        $session = session();

        $data = [
            'session' => $session,
            'active'  => 'Laporan',
            'transaksi' => $this->transaksiModel->gettransaksi(),
            'barang' => $this->barangModel->getbarang(),
            'kategori' => $this->kategoriModel->getkategori(),
            'user' => $this->userModel->getuser(),
            'jointransaksi' => $this->transaksiModel->jointransaksi(),
            'joinbarang' => $this->barangModel->joinbarang(),
        ];
        return view('laporan/index', $data);
    }
}
