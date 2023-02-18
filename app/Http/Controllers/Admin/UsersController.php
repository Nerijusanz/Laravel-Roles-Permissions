<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        
        $users = User::all();

        return view('admin.users.index', compact('users'));

    }


    public function create()
    {

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }


    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }


    public function show(User $user)
    {

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {
        
        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');

    }


    public function destroy(User $user)
    {

        $user->delete();

        return back();
    }

}
