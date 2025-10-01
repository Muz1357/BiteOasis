<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{


/****************************************** */
    /**************************** */
    // Fix the code in Notepad////
    /*************************** */
/********************************************* */



    // Display all users
    public function showU()
    {
        $users = User::all();
        return view('admin.users.showU', compact('users'));
    }

    // Show the form to create a new user
    public function createU()
    {
        return view('admin.users.createU');
    }

    // Store a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'contact_info' => 'required|unique:users,contact_info',
            'role' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.showU')->with('success', 'User created successfully');
    }

    // Show the edit form for an existing user
    public function editU($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.editU', compact('user'));
    }

    // Update an existing user
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,' . $id,
            'contact_info' => 'required|unique:users,contact_info,' . $id,
            'role' => 'required',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        // If password is filled, hash it
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']); // Keep old password if empty
        }

        $user->update($validated);

        return redirect()->route('admin.users.showU')->with('success', 'User updated successfully');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.showU')->with('success', 'User deleted successfully');
    }
}

