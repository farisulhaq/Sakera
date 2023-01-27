<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        return view('kegiatans.satuan.index', [
            'satuans' => Satuan::all(),
            'title' => 'Satuan Kegiatan'
        ]);
    }

    public function create()
    {
        return view('kegiatans.satuan.create', [
            'title' => 'Tambah Satuan Kegiatan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Satuan::create($request->all());

        return redirect()->route('satuan.index')->with('success', 'Satuan Kegiatan berhasil ditambahkan');
    }

    public function edit(Satuan $satuan)
    {
        return view('kegiatans.satuan.edit', [
            'satuan' => $satuan,
            'title' => 'Edit Satuan Kegiatan'
        ]);
    }

    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $satuan->update($request->all());

        return redirect()->route('satuan.index')->with('success', 'Satuan Kegiatan berhasil diubah');
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'Satuan Kegiatan berhasil dihapus');
    }
}
