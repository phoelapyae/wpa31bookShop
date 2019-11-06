<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','slug','permissions'];

    protected $casts = [
        'permissions' => 'array'
    ];

    public function admins(){
        return $this->belongsToMany(Admin::class,'role_admins');
    }

    private function hasPermission(string $permission) : bool
    {
        return $this->permissions[$permission] ?? false;
    }

    public function hasAccess(array $permissions) : bool 
    {
        foreach($permissions as $permission){
            if($this->hasPermission($permission)){
                return true;
            }
            return false;
        }
    }
}
