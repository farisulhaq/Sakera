<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use App\Models\Anggaran;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Requests\AnggaranKerjaRequest;

class AnggaranKerjaController extends Controller
{
    public function index()
    {
        $kegiatanQuery = Kegiatan::with(['kegiatanRole', 'satuan', 'role', 'anggarans']);
        if (auth()->user()->roles[0]->name !== 'admin') {
            $kegiatanQuery->whereRoleId(auth()->user()->roles[0]->id);
        }
        return view('anggarans.kerja.index', [
            'kegiatans' => $kegiatanQuery->get(),
            'bulans' => Bulan::all(),
            'title' => 'Rencana Kerja'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kegiatan $kerja)
    {
        $this->authorize('view', $kerja);

        return view('anggarans.kerja.create', [
            'kegiatan' => $kerja,
            'title' => 'Tambah Rencana Kerja'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggaranKerjaRequest $request, Kegiatan $kerja)
    {
        $kerja->anggarans()->create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'biaya' => $request->biaya,
            'tanggal' => $request->tanggal,
            'bulan_id' => \Carbon\Carbon::parse($request->tanggal)->format('m')
        ]);

        return redirect()->route('anggarans.kerja.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Kegiatan $kerja)
    {
        $this->authorize('view', $kerja);

        return view('anggarans.kerja.show', [
            'kegiatan' => $kerja,
            'title' => 'Rencana Kerja'
        ]);
    }

    public function edit(Anggaran $anggaran)
    {
        $this->authorize('view', $anggaran->kegiatan);

        return view('anggarans.kerja.edit', [
            'anggaran' => $anggaran,
            'title' => 'Edit Rencana Kerja'
        ]);
    }

    public function update(AnggaranKerjaRequest $request, Anggaran $anggaran)
    {
        $anggaran->update([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'biaya' => $request->biaya,
            'tanggal' => $request->tanggal,
            'bulan_id' => \Carbon\Carbon::parse($request->tanggal)->format('m')
        ]);

        return redirect()->route('anggarans.kerja.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Anggaran $anggaran)
    {
        $anggaran->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
