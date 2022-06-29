<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class AuthController extends BaseController
{
    function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function login()
    {
        if (session()->get('id') != null) {
            return redirect()->to('/dashboard');
        } else {
            if (!$this->validate([
                'username' => 'required',
                'password' => 'required',
            ])) {
                $data = [
                    'title' => 'Sistem Pelayanan | Silahkan Masuk Dengan Akun Anda',
                ];
                echo view('templates/header', $data);
                echo view('auth/login');
                echo view('templates/footer');
            } else {
                $user = $this->request->getPost('username');
                $pass = $this->request->getPost('password');

                $where = [
                    'username' => $user,
                    'password' => $pass
                ];

                $cek = $this->UserModel->where($where)->countAllResults();
                if ($cek <= 0) {
                    session()->setFlashdata('error', 'Username Atau Password Anda Salah');
                    return redirect()->to('/');
                } else {
                    $cek_akun = $this->UserModel->where($where)->first();
                    $id = $cek_akun["id"];
                    $role = $cek_akun["role"];
                    $data_session = [
                        'id' => $id,
                        'role' => $role
                    ];

                    session()->set($data_session);
                    session()->setFlashdata('success','Selamat Datang Kembali ' . $cek_akun['nama']);
                    return redirect()->to('/dashboard');
                }
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('success', 'Berhasil Logout!');
        return redirect()->to('/')->withInput();
    }

}
