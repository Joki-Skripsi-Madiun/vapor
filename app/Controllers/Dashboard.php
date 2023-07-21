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
            'active'  => 'dashboard'
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
