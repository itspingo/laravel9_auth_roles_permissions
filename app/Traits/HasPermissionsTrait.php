<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\RolesPermission;

trait HasPermissionsTrait{
	// get permissions 

	

	public function getAllPermissions($permission){
		return Permission::whereIn('slug',$permission)->get();
	}

	public function getPermissionRoles($permissionId){
		return  RolesPermission::where('permission_id',$permissionId)->get();
	}


	public function getAllUserRoles(){
		return  UserRole::where('user_id',$this->id)->get();
	}


	// check has permission 
	public function hasPermissionTo($permission){
		return (bool) $this->permissions->where('slug',$permission)->count();
	}

	public function getPermissionId($permission){
		$permisionRec = Permission::where('slug',$permission)->first();
		return $permisionRec->id;
	}


	public function hasPermissionThroughRole2($permission){
		$permissionId = $this->getPermissionId($permission);
		$allUserRoles = $this->getAllUserRoles();
		$permissionRoles = $this->getPermissionRoles($permissionId);
		foreach($allUserRoles as $userRole){
			
			foreach($permissionRoles as $permRole){
				print($userRole->role_id.'<->'.$permRole->role_id);
				if($userRole->role_id == $permRole->role_id){
					return true;
				}
			}		
		}
		return false;
	}

	// check has role
	public function hasRole(...$roles){
		foreach($roles as $role){
			if($this->roles->contains('slug',$role)){
				return true;
			}
		}
		return false;
	}

	
	public function hasPermission($permission){
		return $this->hasPermissionThroughRole2($permission) || 
				$this->hasPermissionTo($permission);
	}

	// public function hasPermissionThroughRole(...$permissions){
	// 	foreach($permissions as $role){
	// 		if($this->roles->contains($role)){
	// 			return true;
	// 		}
	// 	}
	// 	return false;
	// }





	// give permission
	public function givePermissionTo(...$permissions){
		$permissions = $this->getAllPermissions($permissions);
		if($permissions == null){
			return $this;
		}
		$this->permissions()->saveMany($permissions);
		return $this;
	}


	public function permissions(){
		return $this->belongsTomany(Permission::class,'user_permissions');
	}
	public function roles(){
		return $this->belongsTomany(Role::class,'user_roles');
	}
	

}