<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruangan extends Model
{
    use HasFactory;
    protected $guarded = ['id_ruangan'];
    public function asset(): HasMany
    {
        return $this->hasMany(Asset::class);
    }
}