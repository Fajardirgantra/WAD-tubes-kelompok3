<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeliharaan_asset extends Model
{
    use HasFactory;
    protected $fillable = ['asseet', 'tanggal', 'jenis', 'kegiatan', 'bukti'];
    protected $table = 'pemeliharaan_asset';
    public $timestamps = false;
}
