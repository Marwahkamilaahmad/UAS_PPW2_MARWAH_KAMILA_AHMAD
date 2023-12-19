<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KategoriBuku extends Model
{
    use HasFactory;
    protected $table = 'kategori_buku';
    protected $guarded = [];

    public function buku(): BelongsTo {
        return $this->belongsTo(Buku::class);
    }
}
