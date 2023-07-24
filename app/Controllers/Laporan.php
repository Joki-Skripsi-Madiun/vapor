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
            'active'  => 'Laporan'
        ];
        return view('laporan/index', $data);
    }
    public function print_tanggal()
    {
        $session = session();
        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        $data = [
            'session' => $session,
            'active'  => 'Laporan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kategori' => $this->kategoriModel->getkategori(),
            'user' => $this->userModel->getuser(),
            'jointransaksi' => $this->detailModel->joinDetailTransaksi(),
            'jointransaksibulan' => $this->detailModel->joinDetailTransaksiBulan($bulan, $tahun),
            'joinbarang' => $this->barangModel->joinbarang(),
        ];
        return view('laporan/print', $data);
    }
}
