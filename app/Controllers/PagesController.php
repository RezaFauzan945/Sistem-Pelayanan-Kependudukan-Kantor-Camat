<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    public function index()
    {
        $data = 
        [
         'title' => 'Halaman Admin Sistem Pelayanan',   
        ];
        echo view('templates/header',$data);
        echo view('admin/index');
        echo view('templates/footer');
    }
}
