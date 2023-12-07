<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Buku;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $guarded = [];

    public function buku(): BelongsTo {
        return $this->belongsTo(Buku::class);
    }
}
