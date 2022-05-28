<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Permission_role;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    //
    public function index()
    { 
        $roles = Role::all();  
        return view('roles.index', compact('roles'));
    }

    public function create()
    {   
        $permissions = Permission::all(); 
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {  
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));  
        return redirect()->route('roles.index');
    }

    public function edit( $id )
    {
        $role = Role::find($id) ; 
        $perm_roles = Permission_role::select('permission_id')->where('role_id',$id)->get() ; 
        $help =  Permission::whereIn('id',$perm_roles)->get() ;
        $permissions = Permission::whereNotIn('id',$perm_roles)->get() ;
        return view('roles.edit', compact('permissions','role','perm_roles','help')) ;
        // return $p ;
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all()); 
        $role->permissions()->sync($request->input('permissions', [])); 
        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        $role = Role::find($id) ;  
        $role->load('permissions');  
        return view('roles.show', compact('role'));
        // return view('roles.show') ; 
    }

    public function destroy(Role $role)
    { 
        $role->delete(); 
        return back();
    }

}