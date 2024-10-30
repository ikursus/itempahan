<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tempahan;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserTempahanImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        DB::transaction(function () use ($collection)
        {

            // Simpan rekod users
            foreach ($collection as $row)
            {
                $user = User::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                ]);

                // Dapatkan SEMUA relation tempahan daripada row user dimana
                // nama column pada user terlibat bermula dengan tempahan_
                $senaraiTempahan = collect($row)->filter(function ($value, $key) {
                    return Str::startsWith($key, 'tempahan_');
                });

                // Proses jumlah tempahan yang dimiliki oleh user
                // yang sedang diimport
                // Kita cari dan kumpulkan semua yang sama iaitu tempahan_X
                // dimana X adalah nombor yang disebutkan contohnya 1,2,3 menerusi array_chunk
                // Berdasarkan jumlah data yang ada dalam X, kita simpan rekod tempahan
                // berdasarkan data yang perlu disimpan ke column yang terlibat.
                // Dalam kes dibawah, kita hanya ada 1 data daripada array iaitu tarikh_tempahan
                // untuk disimpan ke dalam table tempahan. Jadi array_chunk kita tetapkan seperti
                // array_chunk($senaraiTempahan->all(), 1)
                // Jika ada lebih daripada 1 column data yang perlu disimpan, contoh 5 column
                // Maka array chunknya adalah
                // array_chunk($senaraiTempahan->all(), 5)
                foreach (array_chunk($senaraiTempahan->all(), 1) as $tempahan)
                {
                    if ( !empty($tempahan[0]) ) // Buat semakan jika data wujud dan tidak empty
                    {
                        // Simpan rekod tempahan
                        Tempahan::create([
                            'pelanggan_id' => $user->id,
                            'tarikh_tempahan' => Carbon::createFromFormat('d/m/Y', $tempahan[0])->format('Y-m-d'),
                        ]);
                    }
                }
            }
        });
    }
}
