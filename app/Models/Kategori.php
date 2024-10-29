<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;

    // Nama table yang model ini perlu berhubung
    protected $table = 'kategoris';

    // Whitelist nama column yang boleh diisi
    protected $fillable = [
        'name',
        'parent_id',
        'kadar_umum',
        'kadar_siang',
        'kadar_malam',
        'kapasiti',
        'kuantiti',
        'status'
    ];

    // Relation untuk dapatkan parent
    public function parent()
    {
        return $this->belongsTo(Kategori::class, 'parent_id');
    }

    // Relation untuk dapatkan child
    public function child()
    {
        return $this->hasMany(Kategori::class, 'parent_id');
    }

    // Relation untuk dapatkan child recursive
    public function childRecursive()
    {
        return $this->child()->with('childRecursive');
    }

}
