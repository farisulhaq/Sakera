<?php

namespace App\Http\Controllers;

// use App\Models\KegiatanRole;
use App\Models\KegiatanRole;
use Illuminate\Http\Request;

class KegiatanRoleController extends Controller
{
    public function index()
    {
        return view('kegiatans.role.index', [
            'kegiatanRoles' => KegiatanRole::all(),
            'title' => 'Role Kegiatan'
        ]);
    }

    public function create()
    {
        return view('kegiatans.role.create', [
            'title' => 'Tambah Role Kegiatan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'name' => 'required'
        ]);

        KegiatanRole::create($request->all());

        return redirect()->route('role.index')->with('success', 'Role Kegiatan berhasil ditambahkan');
    }

    public function edit(KegiatanRole $role)
    {
        return view('kegiatans.role.edit', [
            'kegiatanRole' => $role,
            'title' => 'Edit Role Kegiatan'
        ]);
    }

    public function update(Request $request, KegiatanRole $role)
    {
        $request->validate([
            'kode' => 'required',
            'name' => 'required'
        ]);

        $role->update($request->all());

        return redirect()->route('role.index')->with('success', 'Role Kegiatan berhasil diubah');
    }

    public function destroy(KegiatanRole $role)
    {
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role Kegiatan berhasil dihapus');
    }
}
