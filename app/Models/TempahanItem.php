<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TempahanItem extends Model
{
    use HasFactory;

    public function tempahan()
    {
        return $this->belongsTo(Tempahan::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
