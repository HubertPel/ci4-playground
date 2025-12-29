<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimalModel extends Model
{
    protected $table = 'animals';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'species',
        'age',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
