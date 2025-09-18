<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'title' => 'Lokasi Strategis',
                'icon' => 'map-pin',
                'description' => 'Terletak di pusat kota dengan akses mudah ke sekolah, pusat perbelanjaan, rumah sakit, dan transportasi umum.',
            ],
            [
                'title' => 'Lingkungan Nyaman',
                'icon' => 'home',
                'description' => 'Suasana perumahan yang tenang, hijau, dan asri, cocok untuk tempat tinggal keluarga.',
            ],
            [
                'title' => 'Fasilitas Lengkap',
                'icon' => 'layers',
                'description' => 'Dilengkapi dengan taman bermain, jogging track, mushola, serta area olahraga untuk menunjang gaya hidup sehat.',
            ],
            [
                'title' => 'Keamanan 24 Jam',
                'icon' => 'shield',
                'description' => 'Sistem keamanan modern dengan CCTV dan satpam yang siaga 24 jam.',
            ],
            [
                'title' => 'Desain Modern',
                'icon' => 'layout',
                'description' => 'Rumah dengan arsitektur modern dan material berkualitas tinggi yang memberikan kenyamanan dan keindahan.',
            ],
            [
                'title' => 'Harga Terjangkau',
                'icon' => 'dollar-sign',
                'description' => 'Menawarkan hunian berkualitas dengan harga kompetitif serta kemudahan skema pembayaran.',
            ],
        ];

        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
