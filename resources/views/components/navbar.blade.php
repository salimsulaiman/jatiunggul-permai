<nav x-data="{ scrolled: false, open: false }" x-cloak x-init=" const setScrolled = () => {
     if (window.innerWidth < 768) {
         scrolled = true;
     } else {
         scrolled = window.scrollY > 40;
     }

     // Override: If not on / or /properties, force emerald background
     const path = window.location.pathname;
     if (!['/', '/properties', '/articles/slug'].includes(path) &&
         !/^\/articles\/[^/]+$/.test(path)) {
         scrolled = true;
     }
 };
 setScrolled();
 window.addEventListener('scroll', setScrolled);
 window.addEventListener('resize', setScrolled);"
    :class="{ 'bg-emerald-900 shadow-md py-4': scrolled, 'bg-transparent py-8': !scrolled }"
    class="w-full fixed top-0 z-50 left-0 right-0 px-4 sm:px-8 transition-all duration-300 ease-in-out">
    <div class="max-w-7xl mx-auto flex justify-between items-center transition-all duration-300 ease-in-out"
        :class="{ 'px-0': scrolled, 'px-8': !scrolled }">
        <a href="/"><img src="{{ asset('assets/icons/logo-jatiunggul.png') }}" alt="" class="w-20"></a>

        <!-- Hamburger (Mobile) -->
        <button @click="open = !open" class="md:hidden text-white focus:outline-none">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8">
            <a href="/" wire:navigate class="text-white hover:text-gray-300">Beranda</a>
            <a href="/properties" wire:navigate class="text-white hover:text-gray-300">Properti</a>
            <a href="/about" class="text-white hover:text-gray-300">Tentang Kami</a>
            <a href="/articles" class="text-white hover:text-gray-300">Artikel</a>
        </div>

        <!-- Button (Desktop) -->
        <a href="#"
            :class="{
                'bg-white text-emerald-800 hover:bg-slate-300': scrolled,
                'bg-emerald-800 text-white hover:bg-green-900': !scrolled
            }"
            class="hidden md:inline-block px-4 py-2 rounded-full">Hubungi Kami</a>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden mt-8 flex flex-col items-start space-y-4 pb-4">
        <a href="/" wire:navigate class="text-white hover:text-gray-300">Beranda</a>
        <a href="/properties" wire:navigate class="text-white hover:text-gray-300">Properti</a>
        <a href="/about" class="text-white hover:text-gray-300">Tentang Kami</a>
        <a href="/articles" class="text-white hover:text-gray-300">Artikel</a>
        <a href="#"
            :class="{
                'bg-white text-emerald-800 hover:bg-slate-300': scrolled,
                'bg-emerald-800 text-white hover:bg-green-900': !scrolled
            }"
            class="mt-2 px-4 py-2 rounded-full w-full text-center">Book a consultation</a>
    </div>
</nav>
