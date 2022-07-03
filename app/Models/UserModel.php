<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'username',
        'email',
        'password',
        'nama',
        'jenis_kelamin',
        'alamat',
        'tempat_tanggal_lahir',
        'foto',
        'role',
    ];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
}
