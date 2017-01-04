<?php

namespace App\Model\Setup;

use Illuminate\Database\Eloquent\Model;
use Cache;
use Session;
class DivisionModel extends Model
{
    protected $table = 'divisions';

    protected $fillable = [
        'id',
        'geo_code',
        'name',
        'name_bn',
        'created_by',
        'updated_by'
    ];

    public function getAllDivisionList($lang)
    {
        $name='name';
        if ($lang == 'bn') {
            $name = 'name_bn';
        }
        $value = Cache::remember('cache_divisionsList', config('app_config.cache_time_limit'), function () use ($name) {
            return $this->orderBy( $name , 'asc')->pluck($name, 'id');
        });

        return $value;
    }
}
