<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'kegiatan_id', 'bulan_id', 'role_id', 'name', 'biaya', 'tanggal'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function bulan()
    {
        return $this->belongsTo(Bulan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anggaranDetails()
    {
        return $this->hasMany(AnggaranDetail::class);
    }

    // public function getAnggaranAttribute($value)
    // {
    //     return number_format($value, 0, ',', '.');
    // }

    // public function setAnggaranAttribute($value)
    // {
    //     $this->attributes['anggaran'] = str_replace('.', '', $value);
    // }


}
