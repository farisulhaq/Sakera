<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KegiatanRole extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['kode', 'name'];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
