<?php

namespace App\Imports;

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

                // Dapatkan column tempahan secara dinamik
                // $tempahanColumns = collect($row)->filter(function ($value, $key) {
                //     return Str::startsWith($key, 'tarikh_');
                // })->chunk(3); // Group 3 column

                // foreach ($tempahanColumns as $tempahanColumn) {
                //     Tempahan::create([
                //         'pelanggan_id' => $user->id,
                //         'tarikh_tempahan' => $tempahanColumn[0],
                //     ]);
                // }

            }

        });
    }
}
