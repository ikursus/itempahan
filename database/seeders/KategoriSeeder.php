<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Database\Factories\KategoriFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cipta 3 kategori utama sebagai parent
        Kategori::create([
            'name' => 'Parent 1',
            'status' => 'active'
        ]);

        Kategori::create([
            'name' => 'Parent 2',
            'status' => 'active'
        ]);

        Kategori::create([
            'name' => 'Parent 3',
            'status' => 'active'
        ]);

        // Dapatkan semua parent yang telah dicipta
        $parent = Kategori::all();

        // Cipta 20 sub kategori untuk setiap parent
        $sub = KategoriFactory::times(20)->create();

        // Loopkan sub kategori dan assign parent secara random
        foreach ($sub as $s) {
            $s->parent_id = $parent->random()->id;
            $s->save();
        }
    }
}
