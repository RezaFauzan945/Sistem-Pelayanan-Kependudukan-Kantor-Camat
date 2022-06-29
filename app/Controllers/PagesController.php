<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    protected $galeryModel;
    protected $Pengajuan_track_model;
    protected $M_Penduduk;

    public function __construct()
    {
        // parent::__construct();
        // $this->galeryModel = new Galery_model();
        // $this->Pengajuan_track_model = new Pengajuan_track_model;
        // $this->M_Penduduk = new M_Penduduk;
        helper('form');
    }
    // public function pendaftaran()
    // {
    //     $data = [
    //         'title' => 'Sistem Pelayanan | Halaman Pendaftaran',
    //     ];
    //     echo view('templates/header', $data);
    //     echo view('auth/register');
    //     echo view('templates/footer');
    // }
    public function form_pengajuan()
    {
        $data = [
            'title' => 'Sistem Pelayanan | Halaman Pengajuan',
            'options' => [
                null => 'Pilih',
                'Kartu Keluarga (KK):' => [
                    'KKB' => 'Kartu Keluarga Baru',
                    'KKU' => 'Ubah Anggota Keluarga',
                ],
                'Kartu Tanda Penduduk(KTP):' => [
                    'KTPB' => 'Kartu Tanda Penduduk Baru',
                    'KTPU' => 'Ubah Kartu Tanda Penduduk',
                ],
                'Akta Kelahiran:' => [
                    'AKB' => 'Akta Kelahiran Baru',
                    'AKU' => 'Ubah Akta Kelahiran',
                ],
            ],
            'user' => $this->UserModel->where('id', session()->get('id'))->first(),
        ];
        echo view('templates/header1', $data);
        echo view('pages/form_pengajuan', $data);
        echo view('templates/footer1');
    }
    public function tracking_pengajuan()
    {
        $data = [
            'title' => 'Sistem Pelayanan | Tracking Pengajuan'
        ];
        echo view('templates/header1', $data);
        echo view('pages/tracking_pengajuan');
        echo view('templates/footer1');
    }
    public function pengajuan_tracked()
    {
        $data = [
            'title' => 'Sistem Pelayanan | Hasil Tracking Pengajuan'
        ];
        echo view('templates/header1', $data);
        echo view('pages/pengajuan_tracked');
        echo view('templates/footer1');
    }
}
