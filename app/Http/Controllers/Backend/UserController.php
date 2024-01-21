<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }



    public function show($user)
    {
        $user = User::query()->find($user);
        return view('admin.users.show', compact('user'));
    }




    public function edit($user)
    {
        $user = User::query()->find($user);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }




    public function update(UserRequest $request, $user)
    {
        $user = User::query()->findOrFail($user);
        $roleName = $request->input('role');

        Log::info("User ID: {$user->id}, Role Name: {$roleName}");

        // Используйте метод roles(), чтобы получить роли пользователя
        $user->syncRoles($roleName);

        return redirect()->route('backend.user.index')->with('success', 'User role updated successfully');
    }


    public function delete($user)
    {
        $user = User::findOrFail($user);
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('backend.user.index')->with('success', 'User deleted successfully');
    }


}
