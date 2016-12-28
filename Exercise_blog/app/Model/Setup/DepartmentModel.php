<?php

namespace App\Model\Setup;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    protected $table = 'cc_department';

    protected $fillable = [
        'code',
        'name',
        'name_bn',
        'is_active',
        'is_default',
        'weight',
    ];
}
