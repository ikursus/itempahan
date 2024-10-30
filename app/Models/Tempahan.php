<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tempahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id',
        'tarikh_tempahan',
        'tarikh_mula',
        'tarikh_akhir',
        'status',
    ];

    public function kategori()
    {
        return $this->hasManyThrough(Kategori::class, TempahanItem::class, 'tempahan_id', 'id', 'id', 'kategori_id');
    }

}
