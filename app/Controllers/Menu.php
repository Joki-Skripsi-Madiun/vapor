<?php

namespace App\Controllers;



class Menu extends BaseController
{
    public function index()
    {
        $session = session();

        $data = [
            'session' => $session,
            'active'  => 'menu'
        ];
        return view('menu/index', $data);
    }
}
