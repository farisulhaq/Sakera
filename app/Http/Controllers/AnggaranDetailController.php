<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Bulan;
use App\Models\Anggaran;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\AnggaranDetail;
use App\Http\Requests\AnggaranDetailRequest;
use Illuminate\Validation\ValidationException;

class AnggaranDetailController extends Controller
{

    public function index()
    {
        $kegiatanQuery = Kegiatan::with(['kegiatanRole', 'satuan', 'role', 'anggarans']);
        if (auth()->user()->roles[0]->name !== 'admin') {
            $kegiatanQuery->whereRoleId(auth()->user()->roles[0]->id);
        }
        return view('anggarans.belanja.index', [
            'kegiatans' => $kegiatanQuery->get(),
            'bulans' => Bulan::all(),
            'title' => 'Rencana Belanja'
        ]);
    }

    public function create(Kegiatan $belanja)
    {
        $this->authorize('view', $belanja);

        return view('anggarans.belanja.create', [
            'kegiatan' => $belanja,
            'title' => 'Tambah Rencana Belanja'
        ]);
    }

    public function store(AnggaranDetailRequest $request, Kegiatan $belanja)
    {
        $anggaran = Anggaran::find($request->anggaran_id);
        if (Carbon::parse($anggaran->tanggal) != Carbon::parse($request->tanggal)) {
            throw ValidationException::withMessages([
                'tanggal' => 'Tanggal tidak sesuai dengan anggaran'
            ]);
        }
        $anggaran->anggaranDetails()->create([
            'name' => $request->name,
            'biaya' => $request->biaya,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('anggarans.belanja.show', $belanja)->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Kegiatan $belanja)
    {
        $this->authorize('view', $belanja);

        if (!$belanja->anggarans()->count()) {
            return redirect()->route('anggarans.kerja.index')->with('error', 'Rencana Kerja Kosong');
        }

        return view('anggarans.belanja.show', [
            'kegiatan' => $belanja->load('anggarans.anggaranDetails'),
            'title' => 'Rencana Belanja'
        ]);
    }

    public function edit(AnggaranDetail $anggaran)
    {
        $this->authorize('view', $anggaran->anggaran->kegiatan);

        return view('anggarans.belanja.edit', [
            'anggaran' => $anggaran->load('anggaran.kegiatan.anggarans'),
            'title' => 'Edit Rencana Belanja'
        ]);
    }

    public function update(AnggaranDetailRequest $request, AnggaranDetail $anggaran)
    {
        // dd();
        $anggaran->update([
            'name' => $request->name,
            'biaya' => $request->biaya,
            'anggaran_id' => $request->anggaran_id
        ]);


        return redirect()->route('anggarans.belanja.show', $anggaran->anggaran->kegiatan)->with('success', 'Data berhasil Diubah');
        // return redirect()->back()->with('success', 'Data berhasil Diubah');
    }

    public function destroy(AnggaranDetail $anggaran)
    {
        $anggaran->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
