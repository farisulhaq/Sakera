<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kegiatanQuery = Kegiatan::query();
        if (auth()->user()->roles[0]->name !== 'admin') {
            $kegiatanQuery->whereRoleId(auth()->user()->roles[0]->id);
        }
        return view('dashboard', [
            'totalSeksi' => Role::whereNot('id', 1)->count(),
            'totalUser' => User::count(),
            'totalKegiatan' => $kegiatanQuery->count(),
            'totalAnggaran' => $kegiatanQuery->sum('pagu'),
            'title' => 'Dashboard'
        ]);
    }
}
