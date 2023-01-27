<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:admin');
    }
    public function index()
    {
        return view('users.index', [
            'users' => User::with('roles')->get(),
            'title' => 'Management User'
        ]);
    }

    public function create()
    {
        return view('users.create', [
            'roles' => Role::whereNot('id', 1)->get(),
            'title' => 'Tambah User'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|integer|exists:roles,id',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required| min:4'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->roles()->attach($request->role_id);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'title' => 'Edit User'
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'password' => 'nullable|min:8|confirmed',
            'password_confirmation' => 'nullable| min:8'
        ]);

        if (!($request->password)) {
            return redirect()->route('users.index')->with('success', 'Tidak ada perubahan');
        }

        $user->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        if ($user->roles[0]->name === 'admin') {
            return redirect()->route('users.index')->with('error', 'User admin');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
