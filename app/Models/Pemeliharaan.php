<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemeliharaan extends Model
{
    use HasFactory;
    protected $guarded = ['pemeliharaan_id'];
    protected $fillable = ['asset_id', 'ruangan_id', 'jenis_perbaikan', 'kegiatan', 'foto', 'tanggal_pemeliharaan',];
    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }
    public function ruangan(): BelongsTo
    {
        return $this->belongsTo(Ruangan::class);
    }

}
