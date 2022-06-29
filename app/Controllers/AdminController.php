<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengajuanModel;
use App\Controllers\BaseController;

class AdminController extends BaseController
{
    protected $PengajuanModel;
    function __construct()
    {
        $this->UserModel = new UserModel();
        $this->PengajuanModel = new PengajuanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->UserModel->where('id', session()->get('id'))->first(),
        ];
        echo view('templates/header1', $data);
        echo view('Admin/Dashboard');
        echo view('templates/footer1');
    }

    public function profile($id)
    {
        $data = [
            'title' => 'Profile',
            'user' => $this->UserModel->where('id', session()->get('id'))->first(),
            'validation' => \Config\Services::validation(),
        ];
        if(session()->get('id') == $id)
        {
            echo view('templates/header1', $data);
            echo view('Admin/profile');
            echo view('templates/footer1');
        }else
        {
            return redirect()->to('/profile/'.session()->get('id'));
        }
    }

    public function update_profile($id)
    {
        $data = [
            'id'                   => $id,
            'nama'                 => $this->request->getPost('nama'),
            'alamat'               => $this->request->getPost('alamat'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
        ];

        $dataLama = $this->UserModel->where('id', $id)->first();
        $validation = [
            'nama'                 => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => '{field} Harus diisi!'
                ]
            ],
            'jenis_kelamin'        => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Jenis Kelamin Harus Dipilih!'
                ]
            ],
            'alamat'               => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => '{field} Harus diisi!'
                ]
            ],
            'tempat_tanggal_lahir' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => '{field} Harus diisi!'
                ]
            ],
        ];

        $jenis_kelamin = ['laki-laki','perempuan'];

        if( in_array( $this->request->getPost('jenis_kelamin'), $jenis_kelamin ) )
        {
            $data['jenis_kelamin'] = $this->request->getPost('jenis_kelamin');
        } else {
            session()->setFlashdata('error','Jenis Kelamin Tidak Benar!');
            return redirect()->to('/profile/'.$id)->withInput();
        }

        // cek apakah password diperbarui
        if ($this->request->getPost('password')) {
            $validation['password'] = [
                'rules' =>
                [
                    'min_length[8]', 'trim', 'required'
                ],
                'errors' => ['min_length' => 'Password Baru Minimal 8 Karakter']
            ];
            $validation['password_lama'] = [
                'rules' =>
                [
                    'required', 'trim'
                ],
                'errors' => ['required' => 'Password Lama Harus Diisi']
            ];
            if ($this->request->getPost('password_lama') == $dataLama['password']) {
                $data['password'] = $this->request->getPost('password');
            } else {
                session()->setFlashdata('error','Password Lama Yang Anda Masukan Salah!');
                return redirect()->to('/profile/' . $id)->withInput();
            }
        }

        //cek apakah foto diperbarui
        if ( $this->request->getFile('foto')->getError() == 4) {
            $data['foto'] = $dataLama['foto'];
        } else {
            $validation['foto'] = [
                'rules'  => 'is_image[foto]',
                'errors' => ['is_image' => 'Hanya Gambar Yang Diperbolehkan!']
            ];
            $file =$this->request->getFile('foto');
            $data['foto'] = $file->getName();
        }

        if (!$this->validate($validation)) {
            return redirect()->to('/profile/' . $id)->withInput();
        } else {
            $this->UserModel->where('id', $id)->save($data);
            if ( $this->request->getFile('foto')->getError() == 4) {
                
            } else {
                $file->move('assets/uploads/img/profile/');
                unlink('assets/uploads/img/profile/'.$dataLama['foto']);
            }
            session()->setFlashdata('success', 'Berhasil Diupdate!');
            return redirect()->to('profile/' . $id);
        }
    }

    public function kelola_pengajuan()
    {

        $data = [
            'title' => 'Kelola Pengajuan',
            'user' => $this->UserModel->where('id', session()->get('id'))->first(),
            'pengajuan' => $this->PengajuanModel->findAll()
        ];

        echo view('templates/header1', $data);
        echo view('Admin/kelola_pengajuan', $data);
        echo view('templates/footer1');
    }
}
