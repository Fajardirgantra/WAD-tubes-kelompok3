<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = ['ruangan_id', 'kode_asset', 'nama_asset', 'kategori', 'tanggal_masuk',];
    
    public function ruangan(): BelongsTo
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function pemeliharaan(): HasMany
    {
        return $this->hasMany(Pemeliharaan::class);
    }

    public function complain(): HasMany
    {
        return $this->hasMany(Complain::class);
    }
}
