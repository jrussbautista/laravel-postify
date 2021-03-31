<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $users = User::latest()->with(['posts'])->paginate(20);

        return view('admin.users.index', ['users' => $users ]);
    }

    public function edit(User $user) {
        $this->authorize('view', $user);
        $roles = Role::all();
        return view('admin.users.edit', ['user' =>  $user, 'roles' => $roles]);
    }

    public function destroy(User $user) {
        $this->authorize('delete', $user);
        $user->delete();
         return back()->with('success', 'User successfully deleted');
    }

    public function update(User $user, StoreUserRequest $request) {
        $this->authorize('update', $user);
        $validatedData = $request->validated();
        $user->update($validatedData);
        return redirect()->route('admin.users.index')->with('success', 'User successfully updated');
    }
}
