<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Tempahan;
use App\Models\TempahanItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TempahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senaraiKategori = Kategori::all();
        $senaraiTempahan = Tempahan::factory(300)->create();
        $senaraiTempahanItems = TempahanItem::factory(5000)->create();

        foreach ($senaraiTempahanItems as $item) {
            $item->kategori_id = $senaraiKategori->random()->id;
            $item->tempahan_id = $senaraiTempahan->random()->id;
            $item->save();
        }

    }
}
