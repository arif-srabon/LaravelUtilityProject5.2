<?php

namespace App\Model\Setup;

use Illuminate\Database\Eloquent\Model;
use CaChe;
use DB;
class CommponConfigModel extends Model
{
    public function getAllCommonConfigList($table_name,$lang){
        $field = "name as name";
        $cache_file = 'cache_CommonDataList';
        if (isset($lang) && $lang != 'en') {
            $field = "name_" . $lang . " as name";
            $cache_file = "cache_CommonDataBnList_" . $lang;
        }
        $data = Cache::remember($cache_file, config('app_config.cache_time_limit'), function () use ($table_name,$field) {
            return DB::table($table_name)
                ->where('is_active', 1)
                ->orderBy('weight', 'desc')
//                ->orderBy($field, 'asc')
                ->pluck($field, 'id');
        });

        return $data;
    }

    public function getAllCommonConfigMaritalStatusList($table_name,$lang){
        $field = "name as name";
        $cache_file = 'cache_CommonMaritalStatusList';
        if (isset($lang) && $lang != 'en') {
            $field = "name_" . $lang . " as name";
            $cache_file = "cache_CommonMaritalStatusList_" . $lang;
        }
        $data = Cache::remember($cache_file, config('app_config.cache_time_limit'), function () use ($table_name,$field) {
            return DB::table($table_name)
                ->where('is_active', 1)
                ->orderBy('weight', 'desc')
//                ->orderBy($field, 'asc')
                ->pluck($field, 'id');
        });

        return $data;
    }
}
