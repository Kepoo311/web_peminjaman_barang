<?php

namespace Database\Seeders;

use App\Models\DataBarang;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'password' => 'adminJaya',
            'email' => 'test@example.com',
        ]);

        DataBarang::create([
            'nama_barang' => 'LCD Epson EB-905',
            'kode_barang' => 'NUP 1'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'LCD View Sonic PJ760',
            'kode_barang' => 'NUP 2'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'LCD Epson EB-S7',
            'kode_barang' => 'NUP 3'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'LCD Epson EB-1785W',
            'kode_barang' => 'NUP 4'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'LCD Epson EB-1781W',
            'kode_barang' => 'NUP 5'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'Video Tron',
            'kode_barang' => 'NUP 6'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'Mic Wireless NM-700',
            'kode_barang' => 'NUP 10'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-4 Pajero BE 1109 AZ',
            'kode_barang' => 'NUP 33 A.B'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-4 Venturer BE 1205 BZ',
            'kode_barang' => 'NUP 34'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-4 Touring BE 1017 BZ',
            'kode_barang' => 'NUP 35 A.B'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-4 Innova BE 1162 BZ',
            'kode_barang' => 'NUP 36 A.B'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-4 Hilux PU BE 8244 BZ',
            'kode_barang' => 'NUP 36 C.D'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-4 KIA Pregio BE 1457 BZ',
            'kode_barang' => 'NUP 110'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-4 Isuzu Truck BE 8811 BZ',
            'kode_barang' => 'NUP 120'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-3 Triseda BE 4053 BZ',
            'kode_barang' => 'NUP 123'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-2 Honda Beat BE 4042 BZ',
            'kode_barang' => 'NUP 124'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-2 Honda Beat BE 4043 BZ',
            'kode_barang' => 'NUP 127'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'R-2 Honda Supra x BE 3676 CZ',
            'kode_barang' => 'NUP 144'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'Megaphone TOA',
            'kode_barang' => 'NUP 145'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'BOR Modena',
            'kode_barang' => 'NUP 146'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'Gerindra Bosch',
            'kode_barang' => 'NUP 147'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'Kipas Angin Blower',
            'kode_barang' => 'NUP 1'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'Kursi Besi',
            'kode_barang' => 'NUP 1'
        ]);
        
        DataBarang::create([
            'nama_barang' => 'HT',
            'kode_barang' => 'NUP 1'
        ]);
        
    }
}
