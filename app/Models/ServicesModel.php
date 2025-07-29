<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array'; // You can switch to 'object' if preferred
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'description',
        'icon',
        'contact',
        'is_main'
    ];

    // Optional: casting 'main' boolean field
    protected array $casts = [
        'is_main' => 'boolean'
    ];

    // Validation (if you want to enable it later)
    protected $validationRules = [
        'title' => 'required|max_length[100]',
        'contact' => 'permit_empty|max_length[100]',
        'image_url' => 'permit_empty|max_length[255]',
        'is_main' => 'in_list[true,false,1,0]'
    ];
}
