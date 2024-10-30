<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tempahan extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->hasManyThrough(Kategori::class, TempahanItem::class, 'tempahan_id', 'id', 'id', 'kategori_id');
    }
}
