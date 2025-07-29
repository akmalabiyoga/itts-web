<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfoliosModel extends Model
{
    protected $table            = 'portfolios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'title',
        'description',
        'image_url',
        'is_main'
    ];

    protected $useTimestamps = false; // Enable if you later add created_at / updated_at

    protected $validationRules = [
        'title'       => 'required|max_length[100]',
        'description' => 'permit_empty|string',
        'image_url'   => 'permit_empty|max_length[255]',
        'is_main'     => 'in_list[true,false,1,0]'
    ];

    protected $validationMessages = [];
    protected $skipValidation     = false;
}
