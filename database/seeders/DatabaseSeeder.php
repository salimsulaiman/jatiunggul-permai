<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use App\Models\HomeSection;
use App\Models\OfferingSection;
use App\Models\OfferingSectionDetail;
use App\Models\SpecificationCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        HomeSection::create([
            'badge' => 'Beautifull Prefab Homes',
            'title' => 'Transforming <b>Spaces</b> Elevating <b>Standards</b>',
            'description' => 'Calm, healthy, and energy efficient homes are within reach. Experience European standards in Australia with our prefab panel systems and high-performance windows, redefining how a home should feel.',
            'image' => null,
            'button_home_1' => 'Start Today',
            'url_home_1' => '#',
            'button_home_2' => 'Our Properties',
            'url_home_2' => '#',
        ]);

        AboutSection::create([
            'description' => 'Kami adalah penyedia rumah prefab berkualitas tinggi yang berkomitmen menghadirkan hunian nyaman dan efisien bagi masyarakat.',
            'image' => null,
            'project_completed' => 100,
            'project_duration' => 3,
            'satisfaction_percentage' => 95
        ]);

        OfferingSection::create([
            'title' => "Building The Future, Today"
        ]);

        $section = OfferingSection::first();

        if (!$section) {
            $this->command->info('No offering section found. Please run OfferingSectionSeeder first.');
            return;
        }

        OfferingSectionDetail::insert([
            [
                'sub_title' => 'Energy-Efficient Windows',
                'description' => 'Temukan rumah impian Anda di kawasan hunian eksklusif dengan konsep modern minimalis. Dirancang dengan tata ruang yang efisien dan pencahayaan alami maksimal, sangat cocok untuk keluarga muda yang mengutamakan kenyamanan dan keindahan. Dilengkapi dengan fasilitas umum seperti taman bermain anak, jogging track, dan keamanan 24 jam.',
                'image' => null,
                'button_text' => 'Lihat Detail Unit',
                'url' => 'https://perumahanmu.id/unit/modern-minimalis',
                'offering_section_id' => $section->id,
            ],
            [
                'sub_title' => 'Build Your Dream Home in Just Three Months!',
                'description' => 'Manfaatkan promo spesial akhir tahun: cicilan rumah mulai dari 2 juta rupiah per bulan tanpa uang muka. Program ini berlaku untuk tipe rumah tertentu dan bekerja sama dengan beberapa bank terkemuka di Indonesia. Nikmati proses KPR yang mudah, cepat, dan dibantu oleh tim profesional kami dari awal hingga akad.',
                'image' => null,
                'button_text' => 'Ajukan Sekarang',
                'url' => 'https://perumahanmu.id/promo/dp-nol',
                'offering_section_id' => $section->id,
            ],
        ]);
        SpecificationCategory::insert([
            [
                'name' => 'Pondasi',
                'icon' => 'layers', // Feather icon
            ],
            [
                'name' => 'Dinding',
                'icon' => 'grid', // Feather icon
            ],
            [
                'name' => 'Pintu & Kusen',
                'icon' => 'package', // Feather icon
            ],
            [
                'name' => 'Instalasi',
                'icon' => 'zap', // Feather icon
            ],
        ]);
    }
}
