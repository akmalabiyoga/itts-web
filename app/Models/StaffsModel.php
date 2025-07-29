<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffsModel extends Model
{
    protected $table            = 'staffs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'nama',
        'peran',
        'deskripsi',
        'is_hidden',
        'image_url'
    ];

    protected $useTimestamps = false; // Set to true if you plan to add created_at/updated_at

    protected array $casts = [
        'is_hidden' => 'boolean'
    ];
    protected $validationRules      = [
        'nama'      => 'required|max_length[50]',
        'peran'     => 'required|max_length[50]',
        'deskripsi' => 'permit_empty|string',
        'is_hidden' => 'in_list[true,false,1,0]',
        'image_url' => 'permit_empty|max_length[255]'
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
}
