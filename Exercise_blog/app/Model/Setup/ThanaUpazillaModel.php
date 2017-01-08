<?php

namespace App\Model\Setup;

use Illuminate\Database\Eloquent\Model;

class ThanaUpazillaModel extends Model
{
    protected $table = 'thana_upazillas';

    protected $fillable = [
        'division_id',
        'district_id',
        'geo_code',
        'name',
        'name_bn',
        'created_by',
        'updated_by'
    ];
}
