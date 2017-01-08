<?php namespace App\Model\User;

use Cache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Session;

class UserModel extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'full_name_en',
        'full_name_bn',
        'email',
        'password',
//        'password_confirmation',
        'user_photo',
        'user_sign',
        'father_name',
        'mother_name',
        'official_email',
        'blood_group',
        'date_of_birth',
        'date_of_joining',
        'mobile',
        'passport',
        'national_id',
        'marital_status_id',
        'permanent_house_road',
        'permanent_village',
        'permanent_division',
        'permanent_district',
        'permanent_upzilla',
        'permanent_ward',
        'permanent_postcode',
        'present_house_road',
        'present_village',
        'present_division',
        'present_district',
        'present_upzilla',
        'present_ward',
        'present_postcode',
        'department_id',
        'designation_id',
        'STATUS',
        'permissions',
        'created_at',
        'updated_at'
    ];

//    protected $dates = ['date_of_birth'];
//    protected $values = ['date_of_joining'];

    /**
     * Get the roles for the user
     */
    public function roles()
    {
        return $this->belongsToMany('App\Model\User\RoleModel', 'role_users', 'user_id', 'role_id')->withTimestamps();
    }

    /**
     * get the list of role ids associated with the current user
     *
     * @return array
     */
    public function getAssignedRolesListAttribute()
    {
        return $this->roles->pluck('id');
    }



    public function setDateOfBirthAttribute($date)
    {
        if (!empty($date)) {
            $this->attributes['date_of_birth'] = Carbon::createFromFormat('d-m-Y H:i:s', $date)->format('Y-m-d');
        } else {
            $this->attributes['date_of_birth'] = (NULL);
        }
    }

    public function setDateOfJoiningAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['date_of_joining'] = Carbon::createFromFormat('d-m-Y H:i:s', $value)->format('Y-m-d');
        } else {
            $this->attributes['date_of_joining'] = (NULL);
//            dd($this->attributes['date_of_joining']);
        }
    }

    public function getDateOfBirthAttribute($date)
    {
        if (!empty($date)) {
            return Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
        }
    }

    public function getDateOfJoiningAttribute($date)
    {
        if (!empty($date)) {
            return Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
        }
    }
    public function setMaritalStatusIdAttribute($value){
        if(empty($value)){
            $this->attributes['marital_status_id'] = (NULL);
        }else{
            $this->attributes['marital_status_id'] = $value;
        }
    }

}
