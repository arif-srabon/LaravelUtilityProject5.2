<?php

namespace App\Model\Setup;

use Illuminate\Database\Eloquent\Model;

class DivisionModel extends Model
{
    protected $table = 'districts';

    protected $fillable = [
        'id',
        'geo_code',
        'name',
        'name_bn',
        'created_by',
        'updated_by'
    ];
}
