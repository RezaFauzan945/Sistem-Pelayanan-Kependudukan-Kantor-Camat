<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengajuanModel;
use App\Models\MasyarakatModel;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends BaseController
{
    protected $PengajuanModel;
    protected $MasyarakatModel;
    function __construct()
    {
        $this->UserModel = new UserModel();
        $this->PengajuanModel = new PengajuanModel();
        $this->MasyarakatModel = new MasyarakatModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user'  => $this->UserModel->where('id', session()->get('id'))->first(),
            'jumlah_masyarakat'          => $this->MasyarakatModel->countAllResults(),
            'total_pengajuan'            => $this->PengajuanModel->countAllResults(),
            'pie_charts' => [
                'pending'                => $this->PengajuanModel->where('status', 1)->countAllResults(),
                'ditolak'                => $this->PengajuanModel->where('status', 2)->countAllResults(),
                'diterima'               => $this->PengajuanModel->where('status', 3)->countAllResults(),
                'dalam_proses'           => $this->PengajuanModel->where('status', 4)->countAllResults(),
                'selesai'                => $this->PengajuanModel->where('status', 5)->countAllResults(),
            ],
        ];

        $januari   = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '1')->countAllResults();
        $februari  = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '2')->countAllResults();
        $maret     = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '3')->countAllResults();
        $april     = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '4')->countAllResults();
        $mei       = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '5')->countAllResults();
        $juni      = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '6')->countAllResults();
        $juli      = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '7')->countAllResults();
        $agustus   = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '8')->countAllResults();
        $september = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '9')->countAllResults();
        $oktober   = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '10')->countAllResults();
        $november  = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '11')->countAllResults();
        $desember  = $this->MasyarakatModel->where('year(created_at)', date('Y'))->where('month(created_at)', '12')->countAllResults();
        $data['masyarakat_baru'] = [$januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember];

        $januari1   = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '1')->countAllResults();
        $februari1  = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '2')->countAllResults();
        $maret1     = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '3')->countAllResults();
        $april1     = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '4')->countAllResults();
        $mei1       = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '5')->countAllResults();
        $juni1      = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '6')->countAllResults();
        $juli1      = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '7')->countAllResults();
        $agustus1   = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '8')->countAllResults();
        $september1 = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '9')->countAllResults();
        $oktober1   = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '10')->countAllResults();
        $november1  = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '11')->countAllResults();
        $desember1  = $this->PengajuanModel->where('year(tanggal_pengajuan)', date('Y'))->where('month(tanggal_pengajuan)', '12')->countAllResults();
        $data['pengajuan'] = [$januari1, $februari1, $maret1, $april1, $mei1, $juni1, $juli1, $agustus1, $september1, $oktober1, $november1, $desember1];

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
        if (session()->get('id') == $id) {
            echo view('templates/header1', $data);
            echo view('Admin/profile');
            echo view('templates/footer1');
        } else {
            return redirect()->to('/profile/' . session()->get('id'));
        }
    }

    public function update_profile()
    {
        $id = session()->get('id');
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

        $jenis_kelamin = ['laki-laki', 'perempuan'];

        if (in_array($this->request->getPost('jenis_kelamin'), $jenis_kelamin)) {
            $data['jenis_kelamin'] = $this->request->getPost('jenis_kelamin');
        } else {
            session()->setFlashdata('error', 'Jenis Kelamin Tidak Benar!');
            return redirect()->to('/profile/' . $id)->withInput();
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
                session()->setFlashdata('error', 'Password Lama Yang Anda Masukan Salah!');
                return redirect()->to('/profile/' . $id)->withInput();
            }
        }

        //cek apakah foto diperbarui
        if ($this->request->getFile('foto')->getError() == 4) {
            $data['foto'] = $dataLama['foto'];
        } else {
            $validation['foto'] = [
                'rules'  => 'is_image[foto]',
                'errors' => ['is_image' => 'Hanya Gambar Yang Diperbolehkan!']
            ];
            $file = $this->request->getFile('foto');
            $data['foto'] = $file->getRandomName();
        }

        if (!$this->validate($validation)) {
            return redirect()->to('/profile/' . $id)->withInput();
        } else {
            $this->UserModel->where('id', $id)->save($data);
            if ($this->request->getFile('foto')->getError() == 4) {
            } else {
                $file->move('assets/uploads/img/profile/', $data['foto']);
                if ($dataLama['foto'] == 'man.png' || $dataLama['foto'] == 'woman.png') {
                } else {
                    unlink('assets/uploads/img/profile/' . $dataLama['foto']);
                }
            }
            session()->setFlashdata('success', 'Berhasil Diupdate!');
            return redirect()->to('profile/' . $id);
        }
    }

    public function ganti_password($id)
    {
        $data = [
            'title' => 'Profile',
            'user' => $this->UserModel->where('id', session()->get('id'))->first(),
            'validation' => \Config\Services::validation(),
        ];
        if (session()->get('id') == $id) {
            echo view('templates/header1', $data);
            echo view('Admin/ganti_password');
            echo view('templates/footer1');
        } else {
            return redirect()->to('/ganti-password/' . session()->get('id'));
        }
    }

    public function update_password($id)
    {
        $id = session()->get('id');
        $data = [
            'id' => $id,
        ];

        $dataLama = $this->UserModel->where('id', $id)->first();
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
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            session()->setFlashdata('error', 'Password Lama Yang Anda Masukan Salah!');
            return redirect()->to('/ganti-password/' . $id)->withInput();
        }

        if (!$this->validate($validation)) {
            return redirect()->to('/ganti-password/' . $id)->withInput();
        } else {
            $this->UserModel->where('id', $id)->save($data);
            session()->setFlashdata('success', 'Berhasil Diupdate!');
            return redirect()->to('/ganti-password/' . $id);
        }
    }

    public function kelola_pengajuan()
    {

        $data = [
            'title' => 'Kelola Pengajuan',
            'user' => $this->UserModel->where('id', session()->get('id'))->first(),
            'pengajuan'      => $this->PengajuanModel->select('*')->join('masyarakat', 'masyarakat.id_masyarakat=pengajuan.id_masyarakat')->orderBy("tanggal_pengajuan", "DESC")->findAll(),
            'status'    => [
                1 => 'Pending',
                2 => 'Syarat Tidak Terpenuhi',
                3 => 'Diterima dan Dilanjutkan',
                4 => 'Sudah Diketik dan Diparaf',
                5 => 'Ditandatangani Kepala Desa/<b>Selesai</b>',
            ],
        ];
        echo view('templates/header1', $data);
        echo view('Admin/kelola_pengajuan', $data);
        echo view('templates/footer1');
    }

    public function kelola_penduduk()
    {
        $data = [
            'title' => 'Kelola masyarakat',
            'user' => $this->UserModel->where('id', session()->get('id'))->first(),
            'masyarakat'      => $this->MasyarakatModel->findAll(),
        ];
        echo view('templates/header1', $data);
        echo view('Admin/kelola_masyarakat', $data);
        echo view('templates/footer1');
    }

    public function hapus_masyarakat($id)
    {
        $this->MasyarakatModel->where('id_masyarakat', $id)->delete();
        session()->setFlashdata('success', 'Berhasil Dihapus!');
        return redirect()->to('/kelola-penduduk')->withInput();
    }

    public function kelola_user()
    {
        $data = [
            'title' => 'Kelola masyarakat',
            'user'  => $this->UserModel->where('id', session()->get('id'))->first(),
            'users' => $this->UserModel->findAll(),
        ];
        if (session()->get('id') == 1) {
            echo view('templates/header1', $data);
            echo view('Admin/kelola_user', $data);
            echo view('templates/footer1');
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function kelola_user_tambah()
    {
        $data = [
            'title' => 'Kelola User',
            'user'  => $this->UserModel->where('id', session()->get('id'))->first(),
            'validation' => \Config\Services::validation(),
        ];
        if (session()->get('id') == 1) {
            echo view('templates/header1', $data);
            echo view('Admin/kelola_user_tambah', $data);
            echo view('templates/footer1');
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function create_user()
    {
        if (!$this->validate([
            'username'  => [
                'rules' => 'required|trim|min_length[5]|is_unique[user.username]',
                'errors' => [
                    'required'   => '{field} harus diisi!',
                    'min_length' => '{field} Minimal 5 karakter',
                    'is_unique'  => 'Username Tidak Tersedia Atau Sudah Ada',
                ],
            ],
            'email'  => [
                'rules' => 'required|trim|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'valid_email' => '{field} harus email yang valid',
                    'is_unique'  => 'Email Tidak Tersedia Atau Sudah Dipakai',
                ],
            ],
            'password'  => [
                'rules' => 'required|trim|min_length[8]|matches[password2]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => '{field} Minimal 8 karakter',
                    'matches'   => '{field} Tidak Sama Dengan Konfirmasi'
                ],
            ],
            'password2'  => [
                'rules' => 'required|trim|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => '{field} Minimal 8 karakter',
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
            'jenis_kelamin'  => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Jenis Kelamin harus dipilih!'
                ],
            ],
            'tempat'  => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tempat Lahir harus Diisi!'
                ],
            ],
            'tanggal_lahir'  => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tanggal Lahir harus Diisi!'
                ],
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]',
                'errors' => [
                    'is_image'   => 'Harus Berformat Gambar Seperti PNG JPG dll',
                    'max_size' => '{field} melebihi 2MB!'
                ],
            ],
        ])) {
            return redirect()->to('/kelola-user/tambah')->withInput();
        } else {
            $data = [
                'username'             => $this->request->getPost('username'),
                'email'                => $this->request->getPost('email'),
                'password'             => $this->request->getPost('password'),
                'nama'                 => $this->request->getPost('nama'),
                'alamat'               => $this->request->getPost('alamat'),
                'jenis_kelamin'        => $this->request->getPost('jenis_kelamin'),
                'tempat_tanggal_lahir' => $this->request->getPost('tempat') . ',' . $this->request->getPost('tanggal_lahir'),
                'role'                 => 'user'
            ];
            //cek apakah foto diperbarui
            if ($this->request->getFile('foto')->getError() == 4) {
                if ($data['jenis_kelamin']  == 'laki-laki') {
                    $data['foto'] = 'man.png';
                } else if ($data['jenis_kelamin']  == 'perempuan') {
                    $data['foto'] = 'woman.png';
                }
            } else {
                $file = $this->request->getFile('foto');
                $data['foto'] = $file->getRandomName();
                $file->move('assets/uploads/img/profile/', $data['foto']);
            }
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->UserModel->insert($data);
            session()->setFlashdata('success', 'User Berhasil Dibuat');
            return redirect()->to('kelola-user/tambah')->withInput();
        }
    }

    public function hapus_user($id)
    {
        if ($id == '1') {
            session()->setFlashdata('error', 'Kamu Tidak Ada Hak Akses Untuk Menghapus Akun Ini!');
            return redirect()->to('/kelola-user')->withInput();
        }
        $this->UserModel->where('id', $id)->delete();
        session()->setFlashdata('success', 'Berhasil Dihapus!');
        return redirect()->to('/kelola-user')->withInput();
    }

    public function export_user()
    {
        $dari   = $this->request->getPost('dari');
        $hingga = $this->request->getPost('hingga');
        $submit = $this->request->getPost('submit');
        $data   = $this->UserModel->query("SELECT * FROM user WHERE created_at BETWEEN '" . date('Y-m-d', strtotime($dari)) . "' AND '" . date('Y-m-d', strtotime($hingga)) . "'")->getResultArray();

        if ($submit == 'excel') {

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->getStyle('A1')->getFont()->setBold(true);
            $sheet->getStyle('B1')->getFont()->setBold(true);
            $sheet->getStyle('C1')->getFont()->setBold(true);
            $sheet->getStyle('D1')->getFont()->setBold(true);
            $sheet->getStyle('E1')->getFont()->setBold(true);
            $sheet->getStyle('F1')->getFont()->setBold(true);
            $sheet->getStyle('G1')->getFont()->setBold(true);
            $sheet->getStyle('H1')->getFont()->setBold(true);
            $sheet->getStyle('I1')->getFont()->setBold(true);
            $sheet->getStyle('J1')->getFont()->setBold(true);
            $sheet->getStyle('K1')->getFont()->setBold(true);
            $sheet->getStyle('L1')->getFont()->setBold(true);

            $style = [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ];

            $sheet
                ->setCellValue('A1', 'ID')
                ->setCellValue('B1', 'USERNAME')
                ->setCellValue('C1', 'EMAIL')
                ->setCellValue('D1', 'NAMA')
                ->setCellValue('E1', 'JENIS KELAMIN')
                ->setCellValue('F1', 'ALAMAT')
                ->setCellValue('G1', 'TEMPAT TANGGALLAHIR')
                ->setCellValue('H1', 'FOTO')
                ->setCellValue('I1', 'ROLE')
                ->setCellValue('J1', 'CREATED AT')
                ->setCellValue('K1', 'UPDATED AT');

            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            $sheet->getStyle('A:K')->applyFromArray($style);

            $column = 2;
            foreach ($data as $dt) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $dt['id'])
                    ->setCellValue('B' . $column, $dt['username'])
                    ->setCellValue('C' . $column, $dt['email'])
                    ->setCellValue('D' . $column, $dt['nama'])
                    ->setCellValue('E' . $column, $dt['jenis_kelamin'])
                    ->setCellValue('F' . $column, $dt['alamat'])
                    ->setCellValue('G' . $column, $dt['tempat_tanggal_lahir'])
                    ->setCellValue('H' . $column, base_url() . '/assets/uploads/img/profile/' . $dt['foto'])
                    ->setCellValue('I' . $column, $dt['role'])
                    ->setCellValue('J' . $column, $dt['created_at'])
                    ->setCellValue('K' . $column, $dt['updated_at']);
                $column++;
            }

            $writer = new Xlsx($spreadsheet);
            $filename = date('Y-m-d-His') . '-Data-User';

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
            header('Cache-Control: max-age=0');

            return $writer->save("php://output");
        } else {
            $dari   = $this->request->getPost('dari');
            $hingga = $this->request->getPost('hingga');
            $data   = [
                'users'   => $this->UserModel->query("SELECT * FROM user WHERE created_at BETWEEN '" . date('Y-m-d', strtotime($dari)) . "' AND '" . date('Y-m-d', strtotime($hingga)) . "'")->getResultArray()
            ];

            return view('pages/cetak_user', $data);
        }
    }

    public function export_masyarakat()
    {
        $dari   = $this->request->getPost('dari');
        $hingga = $this->request->getPost('hingga');
        $submit = $this->request->getPost('submit');
        $data   = $this->MasyarakatModel->query("SELECT * FROM masyarakat WHERE created_at BETWEEN '" . date('Y-m-d', strtotime($dari)) . "' AND '" . date('Y-m-d', strtotime($hingga)) . "'")->getResultArray();

        if ($submit == 'excel') {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->getStyle('A1')->getFont()->setBold(true);
            $sheet->getStyle('B1')->getFont()->setBold(true);
            $sheet->getStyle('C1')->getFont()->setBold(true);
            $sheet->getStyle('D1')->getFont()->setBold(true);
            $sheet->getStyle('E1')->getFont()->setBold(true);
            $sheet->getStyle('F1')->getFont()->setBold(true);
            $sheet->getStyle('G1')->getFont()->setBold(true);

            $style = [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ];


            $sheet
                ->setCellValue('A1', 'ID')
                ->setCellValue('B1', 'NIK')
                ->setCellValue('C1', 'NAMA')
                ->setCellValue('D1', 'ALAMAT')
                ->setCellValue('E1', 'JENIS_KELAMIN')
                ->setCellValue('F1', 'NO HP')
                ->setCellValue('G1', 'TERCATAT PADA');

            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            $sheet->getStyle('A:G')->applyFromArray($style);

            $column = 2;
            foreach ($data as $dt) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $dt['id_masyarakat'])
                    ->setCellValue('B' . $column, "'" . $dt['NIK'] . "'")
                    ->setCellValue('C' . $column, $dt['nama'])
                    ->setCellValue('D' . $column, $dt['alamat'])
                    ->setCellValue('E' . $column, $dt['jenis_kelamin'])
                    ->setCellValue('F' . $column, "'" . $dt['no_hp'] . "'")
                    ->setCellValue('G' . $column, $dt['created_at']);
                $column++;
            }

            $writer = new Xlsx($spreadsheet);
            $filename = date('Y-m-d-His') . '-Data-Masyarakat';

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
            header('Cache-Control: max-age=0');

            return $writer->save("php://output");
        } else {
            $dari   = $this->request->getPost('dari');
            $hingga = $this->request->getPost('hingga');
            $data   = [
                'masyarakat'   => $this->MasyarakatModel->query("SELECT * FROM masyarakat WHERE created_at BETWEEN '" . date('Y-m-d', strtotime($dari)) . "' AND '" . date('Y-m-d', strtotime($hingga)) . "'")->getResultArray()
            ];

            return view('pages/cetak_masyarakat', $data);
        }
    }

    public function export_pengajuan()
    {
        $dari   = $this->request->getPost('dari');
        $hingga = $this->request->getPost('hingga');
        $submit = $this->request->getPost('submit');
        $data   = $this->PengajuanModel->query("SELECT * FROM pengajuan WHERE tanggal_pengajuan BETWEEN '" . date('Y-m-d', strtotime($dari)) . "' AND '" . date('Y-m-d', strtotime($hingga)) . "'")->getResultArray();

        if ($submit == 'excel') {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->getStyle('A1')->getFont()->setBold(true);
            $sheet->getStyle('B1')->getFont()->setBold(true);
            $sheet->getStyle('C1')->getFont()->setBold(true);
            $sheet->getStyle('D1')->getFont()->setBold(true);
            $sheet->getStyle('E1')->getFont()->setBold(true);
            $sheet->getStyle('F1')->getFont()->setBold(true);
            $sheet->getStyle('G1')->getFont()->setBold(true);

            $style = [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ];

            $sheet
                ->setCellValue('A1', 'ID_PENGAJUAN')
                ->setCellValue('B1', 'ID_MASYARAKAT')
                ->setCellValue('C1', 'KATEGORI')
                ->setCellValue('D1', 'FILE')
                ->setCellValue('E1', 'STATUS')
                ->setCellValue('F1', 'TANGGAL_PENGAJUAN')
                ->setCellValue('G1', 'Terakhir Diubah');

            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            $sheet->getStyle('A:G')->applyFromArray($style);

            $column = 2;
            foreach ($data as $dt) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $dt['id_pengajuan'])
                    ->setCellValue('B' . $column, $dt['id_masyarakat'])
                    ->setCellValue('C' . $column, $dt['kategori'])
                    ->setCellValue('D' . $column, base_url() . '/assets/uploads/berkas/' . $dt['file'])
                    ->setCellValue('E' . $column, $dt['status'])
                    ->setCellValue('F' . $column, $dt['tanggal_pengajuan'])
                    ->setCellValue('G' . $column, $dt['updated_at']);
                $column++;
            }

            $writer = new Xlsx($spreadsheet);
            $filename = date('Y-m-d-His') . '-Data-Pengajuan';

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
            header('Cache-Control: max-age=0');

            return $writer->save("php://output");
        } else {
            $dari   = $this->request->getPost('dari');
            $hingga = $this->request->getPost('hingga');
            $data   = [
                'pengajuan' => $this->PengajuanModel->select("*")->where("tanggal_pengajuan BETWEEN '" . date('Y-m-d', strtotime($dari)) . "' AND '" . date('Y-m-d', strtotime($hingga)) . "'")->join('masyarakat', 'masyarakat.id_masyarakat=pengajuan.id_masyarakat')->orderBy("tanggal_pengajuan", "ASC")->findAll()
            ];

            return view('pages/cetak_pengajuan', $data);
        }
    }
}

/*!
 * This Sistem Pelayanan Kependudukan Made By Reza Fauzan
 * If Any Something Bug Happens or need any update Just Text me to Wa.me/+6285659766175 or
 * email me to rezafauzan593@gmail.com
*/
