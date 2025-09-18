@extends('components.layouts.app')
@section('content')
    <div class="w-full">
        {{-- <div class="w-full bg-cover bg-top bg-no-repeat relative bg-fixed"
            style="background-image: url('{{ asset('assets/images/banner.png') }}')">
            <div class="absolute w-full h-full bg-black/65 md:bg-black/45"></div>
            <div
                class="w-full max-w-7xl h-fit sm:h-[448px] px-4 sm:px-8 pt-24 sm:pt-8 pb-8 mx-auto flex flex-col justify-end items-start relative z-10">
                <h1 class="text-white text-2xl sm:text-4xl lg:text-6xl leading-tight max-w-full lg:max-w-[60%] mt-8">
                    <b>Tentang Kami</b> Jati Unggul Permai
                </h1>
                <h4 class="text-white text-base sm:text-lg leading-relaxed mt-4 max-w-full lg:max-w-[60%]">
                    Hunian berkualitas dengan legalitas lengkap dan infrastruktur memadai,
                    dirancang untuk kenyamanan hidup dan nilai investasi jangka panjang.
                </h4>

            </div>
        </div> --}}
        <div class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 pb-8 pt-28 mx-auto bg-white">
            <h1 class="text-slate-400 text-sm uppercase">Tentang Kami</h1>
            <div class="flex gap-20">
                <div class="w-1/2">
                    <h2 class="text-slate-700 font-bold text-3xl sm:text-4xl leading-normal mt-4">
                        Kawasan Hunian <span class="text-slate-500">Berkualitas</span> yang Telah Dihuni
                    </h2>
                    <p class="text-slate-500 max-w-2xl mt-4">
                        Jati Unggul Permai merupakan proyek perumahan yang telah berkembang secara berkelanjutan
                        dan saat ini telah ditempati oleh ratusan keluarga. Dengan legalitas yang lengkap,
                        infrastruktur memadai, serta lingkungan yang tertata, kami berkomitmen menyediakan
                        hunian yang layak dan bernilai jangka panjang.
                    </p>
                    <div class="flex items-center gap-4 mt-8">
                        <div class="flex items-center gap-2">
                            <div class="flex -space-x-2">
                                <img class="w-8 h-8 rounded-full border-2 border-white bg-gray-300"
                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23666'%3E%3Cpath d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/%3E%3C/svg%3E"
                                    alt="User">
                                <img class="w-8 h-8 rounded-full border-2 border-white bg-gray-400"
                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23888'%3E%3Cpath d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/%3E%3C/svg%3E"
                                    alt="User">
                                <img class="w-8 h-8 rounded-full border-2 border-white bg-gray-500"
                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23aaa'%3E%3Cpath d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/%3E%3C/svg%3E"
                                    alt="User">
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="text-yellow-400">★</span>
                                <span class="text-sm font-semibold text-gray-700">4.5</span>
                            </div>
                            <span class="text-sm text-gray-500">150+ Penghuni</span>
                        </div>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="h-full w-full rounded-2xl bg-white relative overflow-hidden">
                        <img src="{{ asset('storage/' . $aboutSection->image) }}" alt=""
                            class="w-full h-full object-cover absolute">
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white">
            <h1 class="text-slate-400 text-sm uppercase">Our Team</h1>
            <h2 class="text-slate-700 font-bold text-3xl sm:text-4xl leading-normal mt-4">
                The Faces of <span class="text-slate-500">Innovation</span>
            </h2>
            <p class="text-slate-500 max-w-2xl mt-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo, distinctio! Inventore illum
                reprehenderit sequi quam omnis iste sint necessitatibus velit.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                <div class="flex flex-col gap-4 w-full">
                    <div class="w-full rounded-xl aspect-3/4 bg-slate-100 relative overflow-hidden">
                        <img src="{{ asset('assets/images/person/sulaiman.png') }}" alt=""
                            class="w-full h-full absolute object-center object-cover">
                    </div>
                    <div class="w-full flex flex-row justify-between items-center">
                        <div class="flex flex-col gap-1">
                            <h4 class="font-medium text-base text-slate-700">Sulaiman Bahres</h4>
                            <h5 class="text-sm text-slate-600">Founder</h5>
                        </div>
                        <button
                            class="rounded-full bg-slate-100 p-1 w-10 h-10 shrink-0 flex items-center justify-center cursor-pointer hover:bg-slate-200">
                            <i data-feather="arrow-up-right" class="size-5 text-slate-600"></i>
                        </button>
                    </div>
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <div class="w-full rounded-xl aspect-3/4 bg-slate-100 relative overflow-hidden">
                        <img src="{{ asset('assets/images/person/fitriyah.png') }}" alt=""
                            class="w-full h-full absolute object-center object-cover">
                    </div>
                    <div class="w-full flex flex-row justify-between items-center">
                        <div class="flex flex-col gap-1">
                            <h4 class="font-medium text-base text-slate-700">Fitriyah Alyazidi</h4>
                            <h5 class="text-sm text-slate-600">Co Founder</h5>
                        </div>
                        <button
                            class="rounded-full bg-slate-100 p-1 w-10 h-10 shrink-0 flex items-center justify-center cursor-pointer hover:bg-slate-200">
                            <i data-feather="arrow-up-right" class="size-5 text-slate-600"></i>
                        </button>
                    </div>
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <div class="w-full rounded-xl aspect-3/4 bg-slate-100 relative overflow-hidden">
                        <img src="{{ asset('assets/images/person/salim.png') }}" alt=""
                            class="w-full h-full absolute object-center object-cover">
                    </div>
                    <div class="w-full flex flex-row justify-between items-center">
                        <div class="flex flex-col gap-1">
                            <h4 class="font-medium text-base text-slate-700">Salim Bahres</h4>
                            <h5 class="text-sm text-slate-600">Founder</h5>
                        </div>
                        <button
                            class="rounded-full bg-slate-100 p-1 w-10 h-10 shrink-0 flex items-center justify-center cursor-pointer hover:bg-slate-200">
                            <i data-feather="arrow-up-right" class="size-5 text-slate-600"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="w-full max-w-7xl mx-auto p-4 sm:p-6 md:p-8 pt-8 pb-16 bg-white">
            <h1 class="text-slate-400 text-sm uppercase">Testimoni</h1>
            <h2 class="text-slate-700 font-bold text-3xl sm:text-4xl leading-normal mt-4 max-w-md">
                Apa Kata <span class="text-slate-500">Para Pemilik Rumah</span> Tentang Kami
            </h2>
            <div class="w-full swiper mySwiper mt-8">
                @php
                    function maskName($name)
                    {
                        $parts = explode(' ', $name);
                        $masked = [];
                        foreach ($parts as $p) {
                            $masked[] = substr($p, 0, 1) . str_repeat('*', max(strlen($p) - 1, 0));
                        }
                        return implode(' ', $masked);
                    }

                    $testimonials = [
                        [
                            'name' => 'Salim Sulaiman',
                            'text' => 'Perumahan ini sangat nyaman, legalitasnya jelas, dan lingkungannya aman.',
                            'stars' => 5,
                        ],
                        [
                            'name' => 'Rina Kurnia',
                            'text' => 'Akses fasilitas umum dekat dan suasana lingkungan ramah anak.',
                            'stars' => 4,
                        ],
                        [
                            'name' => 'Budi Santoso',
                            'text' => 'Proses pembelian mudah dan pelayanan pengembang sangat membantu.',
                            'stars' => 5,
                        ],
                        [
                            'name' => 'Ahmad Fauzi',
                            'text' => 'Hunian modern dengan infrastruktur yang memadai. Sangat puas.',
                            'stars' => 4,
                        ],
                        [
                            'name' => 'Dewi Lestari',
                            'text' => 'Lokasi strategis dan investasi jangka panjang yang menjanjikan.',
                            'stars' => 5,
                        ],
                    ];
                @endphp

                <div class="swiper-wrapper">
                    @foreach ($testimonials as $t)
                        <div class="w-full bg-slate-100 rounded-xl flex flex-col p-6 swiper-slide">
                            <div class="flex gap-1 mb-4">
                                @for ($s = 0; $s < $t['stars']; $s++)
                                    <i data-feather="star" class="size-4 text-yellow-500"></i>
                                @endfor
                                @for ($s = $t['stars']; $s < 5; $s++)
                                    <i data-feather="star" class="size-4 text-slate-300"></i>
                                @endfor
                            </div>
                            <h4 class="text-slate-600 mb-4">{{ $t['text'] }}</h4>
                            <div class="flex w-full gap-4 items-center">
                                <div class="w-10 h-10 rounded-full bg-slate-200 relative overflow-hidden shrink-0">
                                    <img src="{{ asset('assets/icons/user.png') }}" alt="{{ $t['name'] }}"
                                        class="w-full h-full absolute object-center object-cover">
                                </div>
                                <div class="w-full">
                                    <h5 class="text-slate-600 text-sm">{{ maskName($t['name']) }}</h5>
                                    <h5 class="text-xs text-slate-500">Home Owner</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>
            </div>

        </div>
        <!-- Stats and CTA Section -->
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <!-- Left Content -->
                <div class="flex-1">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">
                        Menciptakan<br>
                        <span class="text-gray-500">Hunian Berkualitas</span><br>
                        dengan <span class="text-gray-400">Pencapaian Nyata</span>
                    </h2>

                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Jati Unggul Permai menghadirkan hunian dengan legalitas jelas dan infrastruktur memadai.
                        <span class="text-blue-600 font-medium">Statistik ini menjadi bukti komitmen kami dalam pengembangan
                            perumahan berkualitas.</span>
                    </p>
                </div>

                <!-- Right Stats -->
                <div class="flex-1">
                    <div class="grid grid-cols-2 gap-8">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-gray-900 mb-2">100%</div>
                            <div class="text-sm text-gray-500 uppercase tracking-wide">LEGALITAS LENGKAP</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-gray-900 mb-2">100+</div>
                            <div class="text-sm text-gray-500 uppercase tracking-wide">UNIT RUMAH DIKEMBANGKAN</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-gray-900 mb-2">1.4 Hektar</div>
                            <div class="text-sm text-gray-500 uppercase tracking-wide">LUAS KAWASAN DIKEMBANGKAN</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-gray-900 mb-2">95%</div>
                            <div class="text-sm text-gray-500 uppercase tracking-wide">PENGHUNI MERASA PUAS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Final CTA Section -->
        <div class="bg-gray-50 py-16">
            <div class="max-w-4xl mx-auto text-center px-6">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">
                    Temukan Hunian Impian di <span class="text-gray-500">Jati Unggul Permai</span>
                </h3>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                    Nikmati kenyamanan, legalitas lengkap, dan lingkungan yang mendukung kehidupan keluarga Anda.
                </p>
                <button
                    class="bg-emerald-700 hover:bg-emerald-800 text-white px-8 py-3 rounded-full font-semibold transition-colors cursor-pointer">
                    Hubungi Kami Sekarang
                </button>
            </div>
        </div>

    </div>
@endsection
