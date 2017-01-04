<?php

namespace App\Model\Setup;
use Cache;
use Illuminate\Database\Eloquent\Model;
use Session;
class DepartmentModel extends Model
{
    protected $table = 'cc_department';

    protected $fillable = [
        'department_pin_no',
        'departmen_name',
        'departmen_short_name',
        'division_id',
        'district_id',
        'upazilla_id',
        'address',
        'contact_person_name',
        'mobile',
        'office_phone',
        'center_logo',
        'status',
        'email' ,
        'created_by',
        'updated_by'
    ];

    public function scopeActiveList($query)
    {
        $query->whereStatus('active')
            ->orderBy('departmen_name', 'asc');
    }
    public function getAllDeprtmntList(){
        $value = Cache::remember('cache_departmentList', config('app_config.cache_time_limit'), function () {
            return $this->activeList()->pluck('departmen_name', 'id');
        });

        return $value;
    }
}
