<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = [
            ['nama_peralatan' => 'Laptop Dell XPS 15', 'kategori' => 'Elektronik', 'kondisi' => 'baik', 'status' => 'tersedia', 'jumlah' => 5],
            ['nama_peralatan' => 'Proyektor Epson', 'kategori' => 'Presentasi', 'kondisi' => 'baik', 'status' => 'tersedia', 'jumlah' => 2],
            ['nama_peralatan' => 'Microphone Shure', 'kategori' => 'Audio', 'kondisi' => 'baik', 'status' => 'tersedia', 'jumlah' => 3],
            ['nama_peralatan' => 'Whiteboard Portable', 'kategori' => 'Office', 'kondisi' => 'rusak_ringan', 'status' => 'maintenance', 'jumlah' => 1],
            ['nama_peralatan' => 'Kamera DSLR Canon', 'kategori' => 'Dokumentasi', 'kondisi' => 'baik', 'status' => 'tersedia', 'jumlah' => 2],
            ['nama_peralatan' => 'Kabel HDMI 5m', 'kategori' => 'Aksesoris', 'kondisi' => 'baik', 'status' => 'tersedia', 'jumlah' => 10],
            ['nama_peralatan' => 'Speaker Active JBL', 'kategori' => 'Audio', 'kondisi' => 'baik', 'status' => 'tersedia', 'jumlah' => 4],
            ['nama_peralatan' => 'Tripod Kamera', 'kategori' => 'Aksesoris', 'kondisi' => 'baik', 'status' => 'tersedia', 'jumlah' => 3],
            ['nama_peralatan' => 'Printer HP LaserJet', 'kategori' => 'Office', 'kondisi' => 'rusak_berat', 'status' => 'maintenance', 'jumlah' => 1],
            ['nama_peralatan' => 'Tablet iPad Air', 'kategori' => 'Elektronik', 'kondisi' => 'baik', 'status' => 'tersedia', 'jumlah' => 3],
        ];

        foreach ($equipments as $equipment) {
            Equipment::create($equipment);
        }
    }
}
