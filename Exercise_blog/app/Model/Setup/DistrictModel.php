<?php

namespace App\Model\Setup;

use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    protected $table = 'districts';

    protected $fillable = [
        'division_id',
        'geo_code',
        'name',
        'name_bn',
        'created_by',
        'updated_by'
    ];

//    public function ThanaUpazilla()
//    {
//        return $this->hasMany('ThanaUpazilla');
//    }
//
////    public function getAllDistrictByDivisionList($division_id, $lang = 'bn')
//    {
//        $value = Cache::remember('cache_districtList_' . $division_id.$lang, config('app_config.cache_time_limit'), function () use ($division_id,$lang) {
//
//            $name = 'name';
//            if ($lang == 'bn') {
//                $name = 'name_bn';
//            }
//            return $this->where('division_id', $division_id)
//                ->orderBy('name', 'asc')->lists($name, 'id');
//        });
//
//        return $value;
//    }
//
//
//    public function getAllDistrictList($lang = 'bn')
//    {
//        $value = Cache::remember('cache_alldistrictList_' . $lang, config('app_config.cache_time_limit'), function () use ($lang) {
//            if ($lang == 'bn') {
//                return $this->orderBy('name_bn', 'asc')->lists('name_bn', 'id');
//            } else {
//                return $this->orderBy('name', 'asc')->lists('name', 'id');
//            }
//        });
//
//        return $value;
//    }
}
