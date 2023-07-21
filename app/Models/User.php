<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    // Get los permisos de la tabla 'permissions'
    public static function getPermissionGroups(){
        $permission_groups = Db::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_groups;
    }

    // Tomar los nombre y ids de cada grupo de permisos
    public static function getPermissionByGroupName($group_name){
        $permissions = DB::table('permissions')->select('name','id')->where('group_name',$group_name)->get();
        return $permissions;
    }

    // Lo manda llamar resources/views/backend/pages/rolesetup/edit_roles_permission.blade.php
    // para saber que permisos tiene el usuario
    public static function rolHasPermissions($role, $permissions){

        $hasPermission = true;

        foreach ($permissions as $permission) {
            // hasPermissionTo es una propiedad que ya viene con spatie
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
            }
            return $hasPermission;
        }

    }

}
