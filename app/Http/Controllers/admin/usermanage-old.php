<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class usermanage extends Controller
{
    // Show all users (Read)
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    // Show form to create a new user (Create)
    public function create()
    {
        return view('admin.user.create');
    }

    // Store a newly created user (Create)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('/admin/users');
    }

    // Show the form to edit a user (Update)
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    // Update a user's details (Update)
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('admin.user.index');
    }

    // Delete a user (Delete)
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
