<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('roles.index', [

            'roles' => Role::whereNot('id', 1)->get(),
            'title' => 'Seksi'
        ]);
    }

    public function create()
    {
        return view('roles.create', [
            'title' => 'Tambah Seksi'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Seksi berhasil ditambahkan');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'title' => 'Edit Seksi'
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Seksi berhasil diubah');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Seksi berhasil dihapus');
    }
}
