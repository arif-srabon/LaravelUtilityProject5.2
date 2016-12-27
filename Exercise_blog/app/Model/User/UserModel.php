<?php namespace App\Model\User;

use Cache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Session;

class UserModel extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'full_name',
        'designation_id',
        'official_email',
        'department_id',
        'office_id',
        'user_photo',
        'mobile',
        'passport',
        'national_id',
        'office_phone',
        'home_phone',
        'status',
        'office_id',
        'is_factory_user',
        'factory_id',
        'created_at',
        'updated_at'
    ];


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
        return $this->roles->lists('id');
    }

}
