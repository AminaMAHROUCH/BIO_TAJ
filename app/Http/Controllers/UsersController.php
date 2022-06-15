<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class UsersController extends Controller
{
    //
    public function index()
    {
        
        $users = User::all(); 
        return view('users.index', ['users'=>$users]);
    }

    public function create()
    { 
        $roles = Role::all()->pluck('titre', 'id'); 
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        
        $roles = Role::all()->pluck('titre', 'id');

        $user->load('roles');

        return view('users.edit', compact('roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
       
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect('users');
    }

    public function show(User $user)
    {
        
        $user->load('roles'); 
        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {
       
        $user->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}