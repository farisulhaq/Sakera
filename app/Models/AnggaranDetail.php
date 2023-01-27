<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnggaranDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'anggaran_id',
        'name',
        'biaya',
        'tanggal',
    ];

    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class);
    }
}
