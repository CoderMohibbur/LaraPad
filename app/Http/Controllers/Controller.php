<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // app/Http/Controllers/Admin/UserController.php

    public function editRole(User $user)
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('admin.users.edit-role', compact('user', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user->syncRoles([$request->role]);

        return back()->with('success', 'User role updated.');
    }

}
