<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $data=[
            'title' => 'Dashboard'
        ];

        echo view('templates/header1',$data);
        echo view('Admin/Dashboard');
        echo view('templates/footer1');
    }
    public function kelola_pengajuan()
    {
        $data=[
            'title' => 'Kelola Pengajuan'
        ];

        echo view('templates/header1',$data);
        echo view('Admin/kelola_pengajuan');
        echo view('templates/footer1');
    }
}
