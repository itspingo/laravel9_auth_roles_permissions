<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesPermission extends Model
{
    use HasFactory;
    
    protected $fillable = ['role_id','permission_id'];
    protected $table = 'role_permissions';

    public function roles(){
        return $this->belongsTomany(Permission::class,'role_permissions');
    }

    public function users(){
        return $this->belongsTomany(User::class,'user_permissions');
    }
}
