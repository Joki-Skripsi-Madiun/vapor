<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();

        $data = [
            'session' => $session,
            'active'  => 'dashboard',
            'pembayaran'  => $this->pembayaranModel->hitungPembayaran(),
            'kategori'  => $this->kategoriModel->hitungKategori(),
            'barang'  => $this->barangModel->hitungBarang(),
            'transaksi'  => $this->transaksiModel->hitungTransaksi(),
            'user'  => $this->userModel->hitungUsers(),
        ];
        return view('dashboard/index', $data);
    }
    public function pembeli()
    {
        $session = session();

        $data = [
            'session' => $session,
            'active'  => 'dashboard'
        ];
        return view('dashboard/pembeli', $data);
    }
}
