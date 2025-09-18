@extends('components.layouts.app')

@section('content')
    <div class="w-full">
        <div class="max-w-7xl mx-auto px-6 pb-16 pt-32">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <!-- Left Content -->
                <div class="flex-1">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">
                        Get
                        <span class="text-gray-500">In</span>
                        <span class="text-gray-400">Touch</span>
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
                        <div class="flex items-start flex-col gap-2">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-700 flex items-center justify-center">
                                <!-- Map pin icon (white) -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    aria-hidden="true" focusable="false">
                                    <title>Location pin</title>
                                    <path fill="#FFFFFF"
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                                </svg>
                            </div>
                            <div class="text-sm text-gray-700 font-bold tracking-wide mt-2">Alamat Kami</div>
                            <p class="text-sm text-gray-500 max-w-[200px]">Dukuhmaja, Songgom, Kab. Brebes, Jawa Tengah
                            </p>
                        </div>
                        <div class="flex items-start flex-col gap-2">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-700 flex items-center justify-center">
                                <!-- Phone Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="white">
                                    <path
                                        d="M6.62 10.79a15.054 15.054 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1C10.61 21 3 13.39 3 4c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.46.57 3.58.11.34.03.72-.24 1l-2.21 2.21z" />
                                </svg>
                            </div>
                            <div class="text-sm text-gray-700 font-bold tracking-wide mt-2">Info Kontak</div>
                            <ul class="text-sm text-gray-500 max-w-[200px]">
                                <li>+62 878 3011 9510</li>
                                <li>jatiunggulpermai@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-[400px] relative">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.362545377848!2d109.0433824747574!3d-6.966487293034045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbc627b19d213%3A0xb609be60caf06ec8!2sJp%20Jati%20Unggul%20Meubel!5e0!3m2!1sen!2sid!4v1758117993265!5m2!1sen!2sid"
                class="w-full h-full border-0 grayscale" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="max-w-7xl mx-auto px-6 pb-16 pt-32">
            <div class="flex flex-col md:flex-row items-start gap-12">

                <!-- Left Content -->
                <div class="md:w-1/2">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                        Hubungi Kami
                    </h2>
                    <p class="text-gray-600">
                        Punya pertanyaan seputar Jati Unggul Permai?
                        Tinggalkan email Anda, tim kami akan segera menghubungi Anda.
                    </p>
                </div>

                <!-- Right Form -->
                <div class="md:w-1/2 w-full bg-white shadow-lg rounded-2xl p-6">
                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" placeholder="nama@email.com"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea id="message" name="message" rows="4" placeholder="Tulis pesan Anda..."
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded-lg transition-colors">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

            </div>
        </div>


    </div>
@endsection
