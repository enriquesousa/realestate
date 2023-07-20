<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use DB;


class RoleController extends Controller
{

    /***** Permission *******
    * Métodos de los Permisos
    *************************/

    // AllPermission
    public function AllPermission(){
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permissions'));
    }

    // AddPermission
    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }

    // StorePermission
    public function StorePermission(Request $request){

        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permiso creado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);

    }

    // EditPermission
    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    }

    // UpdatePermission
    public function UpdatePermission(Request $request){

        $permission_id = $request->id;

        Permission::findOrFail($permission_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permiso actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);

    }

    // DeletePermission
    public function DeletePermission($id){

        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permiso eliminado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // ImportPermission
    public function ImportPermission(){
        return view('backend.pages.permission.import_permission');
    }

    // Export tabla 'permissions' a excel
    public function Export(){

        return Excel::download(new PermissionExport, 'permission.xlsx');

    }

    // Import tabla 'permissions' de excel
    public function Import(Request $request){

        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permisos Importados con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /***** Roles *******
    * Métodos de los Roles
    *************************/

    // AllRoles
    public function AllRoles(){
        $roles = Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));
    }

    // AddRoles
    public function AddRoles(){
        return view('backend.pages.roles.add_rol');
    }

    // StoreRol
    public function StoreRol(Request $request){

        Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Rol creado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);

    }

    // EditRol
    public function EditRol($id){
        $rol = Role::findOrFail($id);
        return view('backend.pages.roles.edit_rol',compact('rol'));
    }

    // UpdateRol
    public function UpdateRol(Request $request){

        $rol_id = $request->id;

        Role::findOrFail($rol_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Rol actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);

    }

    // DeleteRol
    public function DeleteRol($id){
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Rol eliminado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /***** Add Roles in Permissions *******
    * Métodos
    *************************/

    // AddRolesPermission
    public function AddRolesPermission(){

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();

        return view('backend.pages.rolesetup.add_roles_permission',compact('roles', 'permissions', 'permission_groups'));
    }

    // RolePermissionStore
    public function RolePermissionStore(Request $request){

        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->rol_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Roles y Permisos insertados con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);

    }

    // AllRolesPermission
    public function AllRolesPermission(){
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission',compact('roles'));
    }



}
