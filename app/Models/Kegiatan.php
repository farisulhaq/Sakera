<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['kegiatan_role_id', 'satuan_id', 'role_id', 'kode', 'name', 'target', 'pagu', 'tahun'];

    // public function getPaguAttribute($value)
    // {
    //     return "Rp. " . number_format($value, 0, ',', '.');
    // }

    public function kegiatanRole()
    {
        return $this->belongsTo(KegiatanRole::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function anggarans()
    {
        return $this->hasMany(Anggaran::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
