@extends('components.layouts.app')

@section('content')
    <div class="w-full">
        <div class="w-full bg-cover bg-top bg-no-repeat relative bg-fixed"
            style="background-image: url('{{ asset('assets/images/banner.png') }}')">
            <div class="absolute w-full h-full bg-black/65 md:bg-black/45"></div>
            <div
                class="w-full max-w-7xl h-fit sm:h-[448px] px-4 sm:px-8 pt-24 sm:pt-8 pb-8 mx-auto flex flex-col justify-end items-start relative z-10">
                <h1 class="text-white text-2xl sm:text-4xl lg:text-6xl leading-tight max-w-full lg:max-w-[60%] mt-8">
                    <b>Artikel</b> Perumahan & Properti
                </h1>
                <h4 class="text-white text-base sm:text-lg leading-relaxed mt-4 max-w-full lg:max-w-[60%]">
                    Baca berbagai artikel seputar dunia properti, tips memilih rumah, tren desain modern,
                    serta informasi terbaru tentang perumahan untuk membantu Anda membuat keputusan terbaik.
                </h4>

            </div>
        </div>
        <!-- Daftar Article -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <form action="{{ route('article.index') }}" method="GET"
                class="flex flex-col md:flex-row items-center gap-3 my-8 w-full justify-start" x-data="{
                    open: false,
                    selected: '{{ request('category') ? optional($categories->firstWhere('slug', request('category')))->name ?? 'Semua Kategori' : 'Semua Kategori' }}',
                    selectedCategory: '{{ request('category') ?? '' }}'
                }">
                <!-- Hidden Input untuk Category -->
                <input type="hidden" name="category" x-model="selectedCategory">

                <!-- Dropdown Category -->
                <div class="relative w-full md:w-64">
                    <button type="button" @click="open = !open"
                        class="flex justify-between items-center w-full px-5 py-2 bg-gray-100 rounded-full shadow-sm text-gray-800 text-sm md:text-base focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        <span x-text="selected"></span>
                        <i data-feather="chevron-down" class="w-4 h-4 text-gray-500"></i>
                    </button>

                    <div x-show="open" x-cloak @click.away="open = false"
                        class="absolute mt-2 w-full bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                        <ul class="max-h-60 overflow-y-auto divide-y divide-gray-100">
                            <li>
                                <button type="submit"
                                    @click="selected = 'Semua Kategori'; selectedCategory = ''; open = false"
                                    class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-t-lg">
                                    Semua Kategori
                                </button>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <button type="submit"
                                        @click="selected = '{{ $category->name }}'; selectedCategory = '{{ $category->slug }}'; open = false"
                                        class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        {{ $category->name }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Input Search -->
                <div
                    class="flex items-center bg-gray-100 rounded-full overflow-hidden shadow-sm w-full md:w-72 focus-within:ring-2 focus-within:ring-blue-500 transition">
                    <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari koleksi..."
                        class="flex-grow px-5 py-2 bg-transparent text-gray-800 placeholder-gray-400 focus:outline-none border-none border-0 focus:ring-0 focus:border-0">
                    <button type="submit" class="px-4 text-gray-500 hover:text-blue-600 transition">
                        <i data-feather="search" class="w-5 h-5"></i>
                    </button>
                </div>
            </form>

            @if ($query || $categorySlug)
                <p class="text-gray-600 mb-8">
                    Menampilkan hasil untuk
                    @if ($query)
                        "<span class="font-semibold">{{ $query }}</span>"
                    @endif
                    @if ($categorySlug)
                        @php
                            $selectedCategory = $categories->firstWhere('slug', $categorySlug);
                        @endphp
                        @if ($selectedCategory)
                            dalam kategori <span class="font-semibold">{{ $selectedCategory->name }}</span>
                        @endif
                    @endif
                </p>
            @endif


            <!-- Grid Artikel -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($articles as $article)
                    <a href="{{ route('article.show', $article->slug) }}" class="block group">
                        <div class="bg-white rounded-lg shadow overflow-hidden flex flex-col h-full">
                            <div class="w-full h-48 relative overflow-hidden">
                                <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('assets/images/default.jpg') }}"
                                    alt="Article"
                                    class="w-full h-full object-cover group-hover:scale-105 absolute transition-all duration-300 ease-in-out"
                                    loading="lazy">
                            </div>
                            <div class="p-4 flex flex-col flex-grow">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                    {{ $article->title }}
                                </h3>
                                <p class="text-gray-500 text-sm mb-3">
                                    {{ $article->created_at->format('d M Y') }}
                                </p>
                                <p class="text-gray-600 text-sm flex-grow line-clamp-2">
                                    {{ Str::limit($article->summary, 70, '...') }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-4 text-center py-12 text-gray-500">
                        Artikel tidak ditemukan.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
