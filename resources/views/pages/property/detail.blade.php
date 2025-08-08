@extends('components.layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-cover bg-top bg-no-repeat relative"
            style="background-image: url('{{ asset('assets/images/side.jpg') }}')">
            <div class="absolute w-full bg-black/65 md:bg-black/45 h-full"></div>
            <div
                class="w-full max-w-6xl h-fit sm:h-[548px] px-8 pt-24 sm:pt-8 pb-8 mx-auto flex flex-col justify-center items-start relative z-10 overflow-hidden font-display">
                <h1 class="text-white text-3xl sm:text-4xl w-full mt-8 leading-tight text-center font-light">
                    Jati Unggul Permai
                </h1>
                <h1 class="text-white text-3xl sm:text-7xl w-full mt-8 leading-tight text-center font-bold">
                    Jatibarang</h1>
            </div>
        </div>
        <div class="w-full bg-white max-w-6xl mx-auto px-4 md:px-8 py-16">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Deskripsi -->
                <div class="w-full md:w-1/2">
                    <div class="w-full group">
                        <h1 class="text-emerald-700 text-base uppercase">Deskripsi</h1>
                        <div
                            class="w-8 h-1 bg-slate-400 rounded-full mt-2 group-hover:w-24 transition-all duration-500 ease-in-out">
                        </div>
                        <p class="text-base mt-2 text-slate-700">
                            Jati Unggul Permai Jatibarang merupakan persembahan Jati Unggul Grup untuk menyediakan rumah
                            yang modern dan nyaman untuk ditinggali di tengah kota. Menjadi pilihan yang tepat untuk
                            keluarga
                            yang ingin memulai hidup yang sehat sembari bekerja, berbisnis, dan menjalankan hobi. Hidup
                            harmonis dimulai dari rumah yang nyaman.
                        </p>
                        <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8 mt-8">
                            <div class="w-full flex gap-4 items-start">
                                <div class="flex flex-col gap-2">
                                    <i data-feather="camera" class="size-6 text-emerald-700 shrink-0"></i>
                                    <h4 class="text-slate-700 text-lg font-bold">Security 24 Jam</h4>
                                    <h5 class="text-slate-700 text-sm">Keamanan Security dan CCTV 24 Jam</h5>
                                </div>
                            </div>
                            <div class="w-full flex gap-4 items-start">
                                <div class="flex flex-col gap-2">
                                    <i data-feather="droplet" class="size-6 text-emerald-700 shrink-0"></i>
                                    <h4 class="text-slate-700 text-lg font-bold">Bebas Banjir</h4>
                                    <h5 class="text-slate-700 text-sm">Struktur tanah bebas banjir</h5>
                                </div>
                            </div>
                            <div class="w-full flex gap-4 items-start">
                                <div class="flex flex-col gap-2">
                                    <i data-feather="home" class="size-6 text-emerald-700 shrink-0"></i>
                                    <h4 class="text-slate-700 text-lg font-bold">Tempat Ibadah</h4>
                                    <h5 class="text-slate-700 text-sm">Tempat Ibadah yang nyaman</h5>
                                </div>
                            </div>
                            <div class="w-full flex gap-4 items-start">
                                <div class="flex flex-col gap-2">
                                    <i data-feather="log-in" class="size-6 text-emerald-700 shrink-0"></i>
                                    <h4 class="text-slate-700 text-lg font-bold">One Gate System</h4>
                                    <h5 class="text-slate-700 text-sm">Sistem satu gerbang untuk keluar masuk perumahan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="w-full md:w-1/2 flex flex-col gap-8">
                    <iframe class="w-full aspect-video"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.316721597277!2d109.05251797475762!3d-6.971910693028762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbc663144e87f%3A0x50c1ca6f3da246a0!2sJati%20Unggul%20Permai!5e0!3m2!1sen!2sid!4v1749708709119!5m2!1sen!2sid"
                        style="border:0;" allowfullscreen="true" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <div class="w-full bg-slate-50 rounded-b-4xl">
            <div class="max-w-6xl mx-auto px-4 sm:px-8 py-16">
                <h1 class="text-slate-500 text-base uppercase text-center">Spesifikasi</h1>
                <h2 class="text-2xl sm:text-3xl text-slate-700 font-bold max-w-xl mx-auto text-center my-8">Spesifikasi
                    rumah standar
                    yang
                    nyaman untuk
                    ditinggali</h2>
                <x-step />
                <div class="w-full aspect-video sm:aspect-auto sm:h-[428px] bg-cover rounded-2xl bg-top p-4 flex justify-end"
                    style="background-image: url('{{ asset('assets/images/side.jpg') }}')">
                    <div class="h-full w-3/5 lg:w-2/5 bg-slate-50 rounded-xl p-8 hidden md:flex flex-col justify-between">
                        <div class="w-full">
                            <h4 class="text-xl text-slate-700 font-bold">Pondasi yang kokoh membuat bangunan tahan lama</h4>
                            <h5 class="text-base text-slate-600 mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit.
                                Culpa
                                atque quisquam
                                necessitatibus maxime facere rem. Libero dolorum beatae tenetur nesciunt!</h5>
                        </div>
                        <div class="flex gap-4 justify-between mt-8">
                            <div class="flex gap-4 items-center">
                                <h4
                                    class="text-slate-500 py-2 px-4 rounded-full w-16 text-center border-2 border-slate-300 text-sm">
                                    1/4</h4>
                                <h4 class="text-slate-600 text-sm">Pondasi</h4>
                            </div>
                            <div class="flex gap-4 items-center">
                                <button
                                    class="text-slate-500 hover:text-slate-600 text-sm cursor-pointer">Sebelumnya</button>
                                <button
                                    class="text-emerald-700 hover:text-emerald-800 text-sm cursor-pointer">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="h-full w-full sm:bg-white mt-8 sm:rounded-xl p-4 sm:p-8 flex md:hidden flex-col justify-between">
                    <div class="w-full">
                        <h4 class="text-lg sm:text-xl text-slate-700 font-bold">Pondasi yang kokoh membuat bangunan tahan
                            lama</h4>
                        <h5 class="text-base text-slate-600 mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit.
                            Culpa
                            atque quisquam
                            necessitatibus maxime facere rem. Libero dolorum beatae tenetur nesciunt!</h5>
                    </div>
                    <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between mt-8">
                        <div class="flex gap-4 items-center w-full justify-center">
                            <h4
                                class="text-slate-500 py-2 px-4 rounded-full w-16 text-center border-2 border-slate-300 text-xs">
                                1/4</h4>
                        </div>
                        <div class="flex gap-4 items-center w-full sm:w-auto justify-center sm:justify-start">
                            <button class="text-slate-500 hover:text-slate-600 text-sm cursor-pointer">Sebelumnya</button>
                            <button
                                class="text-emerald-700 hover:text-emerald-800 text-sm cursor-pointer">Selanjutnya</button>
                        </div>
                    </div>
                </div>
                {{-- tipe --}}
                <div x-data="{ tab: 'type45' }" class="w-full mx-auto mt-8">
                    <div class="flex space-x-2 bg-gray-100 p-1 rounded-lg w-fit">
                        <button :class="tab === 'type45' ? 'bg-white text-black shadow' : 'text-gray-500'"
                            @click="tab = 'type45'"
                            class="px-4 py-2 rounded-lg text-sm font-medium focus:outline-none cursor-pointer">
                            Tipe 45
                        </button>
                        <button :class="tab === 'type54' ? 'bg-white text-black shadow' : 'text-gray-500'"
                            @click="tab = 'type54'"
                            class="px-4 py-2 rounded-lg text-sm font-medium focus:outline-none cursor-pointer">
                            Tipe 54
                        </button>
                    </div>

                    <div class="mt-8 w-full">
                        <div x-show="tab === 'type45'">
                            <div class="w-full aspect-video bg-cover rounded-2xl bg-center p-4 flex justify-start"
                                style="background-image: url('{{ asset('assets/images/type45.png') }}')">
                                <div
                                    class="h-full w-3/5 lg:w-2/5 bg-slate-50 rounded-xl p-8 hidden md:flex flex-col justify-between">
                                    <div class="w-full">
                                        <h4 class="text-xl text-slate-700 font-bold">Spesifikasi Tipe 45</h4>
                                        <h5 class="text-base text-slate-600 mt-4">Lorem ipsum, dolor sit amet consectetur
                                            adipisicing
                                            elit.
                                            Culpa
                                            atque quisquam
                                            necessitatibus maxime facere rem. Libero dolorum beatae tenetur nesciunt!</h5>
                                    </div>
                                    <div class="flex gap-4 justify-start">
                                        <div class="flex gap-4 items-center">
                                            <button class="text-slate-500 hover:text-slate-600 text-sm cursor-pointer"
                                                @click="tab = 'type45'">Sebelumnya</button>
                                            <button class="text-emerald-700 hover:text-emerald-800 text-sm cursor-pointer"
                                                @click="tab = 'type54'">Selanjutnya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-8 p-4 sm:p-8 flex md:hidden flex-col justify-between">
                                <div class="w-full">
                                    <h4 class="text-lg sm:text-xl text-slate-700 font-bold">Spesifikasi Tipe 45</h4>
                                    <h5 class="text-base text-slate-600 mt-4">Lorem ipsum, dolor sit amet consectetur
                                        adipisicing
                                        elit.
                                        Culpa
                                        atque quisquam
                                        necessitatibus maxime facere rem. Libero dolorum beatae tenetur nesciunt!</h5>
                                </div>

                                <div class="flex gap-4 items-center w-full sm:w-auto justify-center sm:justify-start mt-8">
                                    <button class="text-slate-500 hover:text-slate-600 text-sm cursor-pointer"
                                        @click="tab = 'type45'">Sebelumnya</button>
                                    <button class="text-emerald-700 hover:text-emerald-800 text-sm cursor-pointer"
                                        @click="tab = 'type54'">Selanjutnya</button>
                                </div>

                            </div>
                        </div>
                        <div x-show="tab === 'type54'">
                            <div class="w-full aspect-video bg-cover rounded-2xl bg-center p-4 flex justify-start"
                                style="background-image: url('{{ asset('assets/images/type54.png') }}')">
                                <div
                                    class="h-full w-3/5 lg:w-2/5 bg-slate-50 rounded-xl p-8 hidden md:flex flex-col justify-between">
                                    <div class="w-full">
                                        <h4 class="text-xl text-slate-700 font-bold">Spesifikasi Tipe 54</h4>
                                        <h5 class="text-base text-slate-600 mt-4">Lorem ipsum, dolor sit amet consectetur
                                            adipisicing
                                            elit.
                                            Culpa
                                            atque quisquam
                                            necessitatibus maxime facere rem. Libero dolorum beatae tenetur nesciunt!</h5>
                                    </div>
                                    <div class="flex gap-4 justify-start">
                                        <div class="flex gap-4 items-center">
                                            <button class="text-slate-500 hover:text-slate-600 text-sm cursor-pointer"
                                                @click="tab = 'type45'">Sebelumnya</button>
                                            <button class="text-emerald-700 hover:text-emerald-800 text-sm cursor-pointer"
                                                @click="tab = 'type54'">Selanjutnya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full w-full mt-8 p-4 sm:p-8 flex md:hidden flex-col justify-between">
                                <div class="w-full">
                                    <h4 class="text-lg sm:text-xl text-slate-700 font-bold">Spesifikasi Tipe 54</h4>
                                    <h5 class="text-base text-slate-600 mt-4">Lorem ipsum, dolor sit amet consectetur
                                        adipisicing
                                        elit.
                                        Culpa
                                        atque quisquam
                                        necessitatibus maxime facere rem. Libero dolorum beatae tenetur nesciunt!</h5>
                                </div>

                                <div class="flex gap-4 items-center w-full sm:w-auto justify-center sm:justify-start mt-8">
                                    <button class="text-slate-500 hover:text-slate-600 text-sm cursor-pointer"
                                        @click="tab = 'type45'">Sebelumnya</button>
                                    <button class="text-emerald-700 hover:text-emerald-800 text-sm cursor-pointer"
                                        @click="tab = 'type54'">Selanjutnya</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full bg-white max-w-6xl mx-auto px-4 md:px-8 py-16">
            <div class="flex flex-col md:flex-row gap-8 md:gap-16 justify-between">

                <!-- Left Column -->
                <div class="w-full md:w-2/5">
                    <h1 class="text-2xl md:text-4xl text-slate-700">
                        FAQ Jati Unggul Permai Jatibarang
                    </h1>
                    <h4 class="text-slate-700 mt-4 text-base md:text-lg">
                        Pertanyaan yang sering ditanyakan terkait pembelian Property di Jati Unggul grup
                    </h4>
                </div>

                <!-- Right Column (FAQ Items) -->
                <div class="w-full md:w-3/5">
                    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900"
                        data-inactive-classes="text-gray-500">
                        <h2 id="accordion-flush-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                aria-controls="accordion-flush-body-1">
                                <span>Berapa Uang Muka yang diperlukan?</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                            <div class="py-5 border-b border-gray-200 px-4">
                                <p class="mb-2 text-gray-500">Minimal Uang Muka 30% dari harga rumah.
                                </p>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-2">
                            <button type="button"
                                class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                aria-controls="accordion-flush-body-2">
                                <span>Adakah Cara Pembayaran Lain selain KPR?</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                            <div class="py-5 border-b border-gray-200 px-4">
                                <ul class="list-decimal list-inside ps-4 flex flex-col gap-2 text-gray-500">
                                    <li>
                                        Cash Termin: Pembayaran dengan sistem 50% uang masuk diawal, 45% setelah bangunan
                                        atap,
                                        dan 5% setelah sertifikat jadi.
                                    </li>
                                    <li>
                                        Cash Keras: Pembayaran dengan sistem 95% uang masuk diawal, dan 5% setelah
                                        sertifikat
                                        jadi.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-3">
                            <button type="button"
                                class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                                aria-controls="accordion-flush-body-3">
                                <span>Apa Saja Persyaratan untuk KPR?</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                            <div class="py-5 border-b border-gray-200 px-4">
                                <p class="text-gray-500">Untuk persyaratan KPR setiap bank berbeda-beda,
                                    untuk detailnya bisa lihat bagian di atas
                                    FAQ.</p>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-4">
                            <button type="button"
                                class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                                aria-controls="accordion-flush-body-3">
                                <span>Apakah Sertifikat Sudah SHM?</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                            <div class="py-5 border-b border-gray-200 px-4">
                                <p class="text-gray-500">Anda akan mendapat jaminan mengenai legalitas,
                                    untuk itu semua proyek Sapphire Grup
                                    sertifikatnya merupakan Sertifikat Hak Milik (SHM).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
