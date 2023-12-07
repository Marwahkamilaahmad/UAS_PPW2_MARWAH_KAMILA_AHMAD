<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Gallery;

class Buku extends Model
{
    protected $table = 'buku_migration';
    protected $guarded = [];
    protected $dates = ['tanggal'];

    use HasFactory;

    public function galleries() : HasMany {
        return $this->hasMany(Gallery::class);
    }
}
