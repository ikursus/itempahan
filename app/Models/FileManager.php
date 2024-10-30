<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;

class FileManager extends Model
{
    protected $fillable = ['nama_fail_asal', 'lokasi_fail'];

    // Gunakan Laravel Hashid untuk hashing ID
    public function getHashidAttribute()
    {
        return Hashids::encode($this->id);
    }

    public static function findByHashid($hashid)
    {
        $id = Hashids::decode($hashid)[0];
        return self::find($id);
    }

}
