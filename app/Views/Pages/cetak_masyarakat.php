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
    <h1 class="text-center">Data Masyarakat</h1>
    <table class="table datatable table-bordered" id="table" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th>Tercatat Pada</th>
                <th>Terakhir diubah Pada</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($masyarakat as $data) : ?>
                <tr>
                    <td><?= $data['NIK']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td><?= $data['no_hp']; ?></td>
                    <td><?= $data['jenis_kelamin']; ?></td>
                    <td><?= $data['created_at']; ?></td>
                    <td><?= $data['updated_at']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>