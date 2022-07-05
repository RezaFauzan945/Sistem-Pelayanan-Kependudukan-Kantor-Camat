<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pelayanan Kependudukan</title>
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body onload="print()" class="border border-dark">
        <h1 class="text-center">Data Pengajuan</h1>
        <table class="" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID Pengajuan</th>
                    <th>Nama(NIK)</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Kategori Pengajuan</th>
                    <th>Lampiran</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pengajuan as $data) : ?>
                    <tr>
                        <td><?= $data['id_pengajuan']; ?></td>
                        <td><?= $data['nama'] . '(' . $data['NIK'] . ')'; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td><?= $data['no_hp']; ?></td>
                        <td><?= $data['jenis_kelamin']; ?></td>
                        <td>
                            <?php
                            if ($data['kategori'] == 'KKB') {
                                echo 'Pengajuan Kartu Keluarga Baru';
                            } else if ($data['kategori'] == 'KKU') {
                                echo 'Pengajuan Perbarui Kartu Keluarga';
                            } else if ($data['kategori'] == 'AKU') {
                                echo 'Pengajuan Perbarui Akta Kelahiran';
                            } else if ($data['kategori'] == 'AKB') {
                                echo 'Pengajuan Akta Kelahiran Baru';
                            } else if ($data['kategori'] == 'AKB') {
                                echo 'Pengajuan Akta Kelahiran Baru';
                            } else if ($data['kategori'] == 'KTPB') {
                                echo 'Pengajuan Kartu Tanda Penduduk Baru';
                            } else if ($data['kategori'] == 'KTPU') {
                                echo 'Pengajuan Perbarui Kartu Tanda Penduduk';
                            }
                            ?>
                        </td>
                        <td><a href="<?= base_url(); ?>/assets/uploads/berkas/<?= $data['file']; ?>"><i class="fa-solid fa-file-export"></i></a></td>
                        <td><?= $data['tanggal_pengajuan']; ?></td>
                        <td>
                            <?php
                            if ($data['status'] == 1) {
                                echo ' Pending ';
                            } else if ($data['status'] == 2) {
                                echo ' Diterima ';
                            } else if ($data['status'] == 3) {
                                echo ' Ditolak ';
                            } else if ($data['status'] == 4) {
                                echo ' Dalam Proses ';
                            } else if ($data['status'] == 5) {
                                echo ' Selesai ';
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</body>

</html>