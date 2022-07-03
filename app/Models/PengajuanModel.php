<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $table            = 'pengajuan';
    protected $primaryKey       = 'id_pengajuan';
    protected $useAutoIncrement = false;
    protected $allowedFields    = [
        'id_pengajuan',
        'id_masyarakat',
        'jenis_pengajuan',
        'kategori',
        'file',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_pengajuan';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
}
