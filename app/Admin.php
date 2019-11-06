<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use App\Http\AuthTrait\OwnRecord;

class Admin extends Authenticatable
{
    //
    use Notifiable;
    // use OwnRecord;

    protected $guard = 'admin';

    protected $fillable = [
        'name','email','password','is_super','is_delete'
    ];

    protected $hidden = [
        'password','remember_token'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'role_admins');
    }

    public function hasAccess(array $permissions) : bool 
    {
        // Check if the permission is available in anyrole
        foreach($this->roles as $role){
            if($role->hasAccess($permissions)){
                return true;
            }
            return false;
        }
    }

    /**
     * Check if the user belongs to role
     */
    public function inRole(string $roleSlug){
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

    public function hasPermission($permission){
        if($this->roles() != null){
            $admin_permissions = $this->roles()->first()->permissions;
            if(array_key_exists($permission,$admin_permissions)){
                if($admin_permissions[$permission]){
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        return false;
    }
}
