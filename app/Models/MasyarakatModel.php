<?php

namespace App\Models;

use CodeIgniter\Model;

class MasyarakatModel extends Model
{
    protected $table            = 'masyarakat';
    protected $primaryKey       = 'id_masyarakat';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'NIK',
        'nama',
        'alamat',
        'jenis_kelamin',
        'no_hp',
    ];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
}
