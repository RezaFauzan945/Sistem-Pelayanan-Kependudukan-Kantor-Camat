<?php

namespace App\Controllers;

use App\Models\PengajuanModel;
use App\Models\MasyarakatModel;

class PagesController extends BaseController
{
    protected $MasyarakatModel;
    protected $PengajuanModel;

    public function __construct()
    {
        $this->MasyarakatModel = new MasyarakatModel();
        $this->PengajuanModel  = new PengajuanModel();
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
            'user'       => $this->UserModel->where('id', session()->get('id'))->first(),
            'validation' => \Config\Services::validation(),
        ];
        echo view('templates/header1', $data);
        echo view('pages/form_pengajuan', $data);
        echo view('templates/footer1');
    }

    public function pengajuan()
    {
        $data = [
            'nik'                => $this->request->getPost('nik'),
            'nama'               => $this->request->getPost('nama'),
            'alamat'             => $this->request->getPost('alamat'),
            'jenis_kelamin'      => $this->request->getPost('jenis_kelamin'),
            'no_hp'              => $this->request->getPost('no_hp'),
            'jenis_pengajuan'    => $this->request->getPost('jenis_pengajuan'),
            'file'               => $this->request->getFile('file')
        ];

        $status = [
            1 => 1,  // Pending
            2 => 2,  // Diterima dan Dilanjutkan
            3 => 3,  // Sudah Diketik dan Diparaf
            4 => 4,  // Sudah Ditandatangani Lurah dan Selesai
        ];

        $ceknik = $this->MasyarakatModel->where('nik', $data['nik'])->countAllResults();

        if ($ceknik <= 0) {
            $save = [
                'NIK'   => $data['nik'],
                'nama'  => $data['nama'],
                'alamat'   => $data['alamat'],
                'jenis_kelamin'   => $data['jenis_kelamin'],
                'no_hp' => $data['no_hp'],
            ];
            $this->MasyarakatModel->insert($save);
        }


        //Output a v4 UUID 
        $rid       = uniqid($data['jenis_pengajuan'], TRUE);
        $rid2      = str_replace('.', '', $rid);
        $rid3      = substr(str_shuffle($rid2), 0, 3);
        $cc        = $this->PengajuanModel->countAllResults() + 1;
        $count     = str_pad($cc, 3, STR_PAD_LEFT);
        $id        = $data['jenis_pengajuan'] . "-";
        $d         = date('d');
        $y         = date('y');
        $mnth      = date("m");
        $s         = date('s');
        $randomize = $d + $y + $mnth + $s;
        $id        = $id . $rid3 . $randomize . $count . $y;

        if (!$this->validate([
            'nik'  => [
                'rules' => 'required|trim|is_natural_no_zero|min_length[16]',
                'errors' => [
                    'required' => '{field} Harus diisi!',
                    'is_natural_no_zero' => '{field} Tolong hanya isi dengan angka Yang Benar!',
                    'min_length' => '{field} minimal 16 Angka'
                ],
            ],
            'nama'  => [
                'rules' => 'required|trim|alpha_space',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'alpha_space' => '{field} Tolong Isi hanya dengan huruf dan nama yang benar'
                ],
            ],
            'alamat'  => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ],
            ],
            'no_hp'  => [
                'rules' => 'required|trim|is_natural|min_length[10]',
                'errors' => [
                    'required'   => 'No Handphone harus diisi!',
                    'is_natural' => 'No Handphone Tolong hanya isi dengan angka Yang Benar!',
                    'min_length' => 'No Handphone minimal 10 Angka'
                ],
            ],
            'jenis_kelamin'  => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Jenis Kelamin harus dipilih!'
                ],
            ],
            'jenis_pengajuan'  => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Jenis Pengajuan harus dipilih!'
                ],
            ],
            'file' => [
                'rules' => 'uploaded[file]|max_size[file,5120]|ext_in[file,png,jpg,gif,rar,zip,pdf]',
                'errors' => [
                    'uploaded' => '{field} harus Unggah Persyaratan dan pastikan sesuai dengan persyaratan sesuai jenis Pengajuan!',
                    'ext_in'   => 'Extensi Lampiran Yang Dibolehkan Hanya PNG,JPG,RAR,ZIP dan PDF',
                    'max_size' => '{field} melebihi 5MB!'
                ],
            ],
        ])) {
            return redirect()->to('/form-pengajuan')->withInput();
        } else {
            $namafile = substr($data['file']->getName(), -7);
            $fileName = $data['jenis_pengajuan'] . uniqid() . $namafile;
            if ($data['file']->getName() == null) {
                $fileName = '-';
            }

            $pengaju = $this->MasyarakatModel->where('NIK', $data['nik'])->first();

            $save = [
                'id_pengajuan'    => $id,
                'id_masyarakat'   => $pengaju['id_masyarakat'],
                'kategori'        => $data['jenis_pengajuan'],
                'file'             => $fileName,
                'status'          => 1
            ];
            $this->PengajuanModel->insert($save);
            $data['file']->move('assets/uploads/berkas/', $fileName);
            session()->setFlashdata('success-form', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Selamat!</h5> Berhasil Mengajukan Surat! Berikut <b>ID</b> anda: <b>' . $id . '</b></div>');
            return redirect()->to('/form-pengajuan');
        }
    }

    public function hapus_pengajuan($id)
    {
        $this->PengajuanModel->where('id_pengajuan', $id)->delete();
        session()->setFlashdata('success', 'Berhasil Dihapus!');
        return redirect()->to('/kelola-pengajuan')->withInput();
    }

    public function update_status_pengajuan($id)
    {
        $status = ['status' => $this->request->getPost('status')];
        $this->PengajuanModel->update($id, $status);
        session()->setFlashdata('success', 'Status Pengajuan ID: ' . $id . ' Telah Diupdate!');
        return redirect()->to('/kelola-pengajuan');
    }

    public function tracking_pengajuan()
    {
        $data = [
            'title' => 'Sistem Pelayanan | Tracking Pengajuan',
            'user'       => $this->UserModel->where('id', session()->get('id'))->first(),
            'validation' => \Config\Services::validation()
        ];
        echo view('templates/header1', $data);
        echo view('pages/tracking_pengajuan');
        echo view('templates/footer1');
    }
    public function pengajuan_tracked()
    {
        $id = $this->request->getPost('trackid');
        $data = [
            'title' => 'Sistem Pelayanan | Hasil Tracking Pengajuan',
            'user'       => $this->UserModel->where('id', session()->get('id'))->first(),
            'validation' => \Config\Services::validation(),
            'pengajuan'  => $this->PengajuanModel->select('*')->join('masyarakat', 'masyarakat.id_masyarakat=pengajuan.id_masyarakat')->where('id_pengajuan',$id)->first()
         ];
        $cek = $this->PengajuanModel->where('id_pengajuan' , $id)->countAllResults();
        if ($cek <= 0) {
            session()->setFlashdata('error', 'Maaf Pengajuan Dengan ID ' . $id . ' Tidak Ada Silahkan Periksa Kembali!');
            return redirect()->to('/tracking-pengajuan')->withInput();
        }else{
            echo view('templates/header1', $data);
            echo view('pages/pengajuan_tracked',$data);
            echo view('templates/footer1');
        }

    }
}
