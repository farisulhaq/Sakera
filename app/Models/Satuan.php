<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Satuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
