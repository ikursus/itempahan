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
        DB::transaction(function () use ($collection) {

            // Simpan rekod users
            foreach ($collection as $row)
            {
                $user = User::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                ]);

                // Dapatkan relation tempahan daripada row user dimana
                // key bermula dengan tempahan_
                $senaraiTempahan = collect($row)->filter(function ($value, $key) {
                    return Str::startsWith($key, 'tempahan_');
                });

                // Simpan Rekod Tempahan
                foreach (array_chunk($senaraiTempahan->all(), 1) as $tempahan) {
                    if (!empty($tempahan[0])) {
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
