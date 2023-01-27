<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Satuan;
use App\Models\Kegiatan;
use App\Models\KegiatanRole;
use Illuminate\Http\Request;
use App\Http\Requests\KegiatanRequest;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatanQuery = Kegiatan::with(['kegiatanRole', 'satuan', 'role']);
        if (auth()->user()->roles[0]->name !== 'admin') {
            $kegiatanQuery->whereRoleId(auth()->user()->roles[0]->id);
        }
        return view('kegiatans.kegiatan.index', [
            'kegiatans' => $kegiatanQuery->get(),
            'sumPagu' => $kegiatanQuery->sum('pagu'),
            'title' => 'Kegiatan'
        ]);
    }

    public function create()
    {
        return view('kegiatans.kegiatan.create', [
            'kegiatanRole' => KegiatanRole::all(),
            'satuans' => Satuan::all(),
            'years' => $this->getYears(),
            'seksis' => auth()->user()->roles[0]->name === 'admin' ? Role::whereNot('id', 1)->get() : auth()->user()->roles,
            'title' => 'Tambah Kegiatan'
        ]);
    }

    public function store(KegiatanRequest $request)
    {
        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function edit(Kegiatan $kegiatan)
    {
        $this->authorize('view', $kegiatan);

        return view('kegiatans.kegiatan.edit', [
            'kegiatan' => $kegiatan,
            'kegiatanRole' => KegiatanRole::all(),
            'satuans' => Satuan::all(),
            'years' => $this->getYears(),
            'seksis' => auth()->user()->roles[0]->name === 'admin' ? Role::whereNot('id', 1)->get() : auth()->user()->roles,
            'title' => 'Edit Kegiatan'
        ]);
    }

    public function update(KegiatanRequest $request, Kegiatan $kegiatan)
    {
        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diubah');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $this->authorize('view', $kegiatan);

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }

    public function getYears()
    {
        $years = [];
        for ($i =  0; $i <= 5; $i++) {
            $years[] = date('Y', strtotime("$i year"));
        }
        return $years;
    }
}
