@extends('components.layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-cover bg-top bg-no-repeat relative bg-fixed"
            style="background-image: url('{{ asset('assets/images/banner.png') }}')">
            <div class="absolute w-full h-full bg-black/65 md:bg-black/45"></div>
            <div
                class="w-full max-w-7xl h-fit sm:h-[448px] px-4 sm:px-8 pt-24 sm:pt-8 pb-8 mx-auto flex flex-col justify-end items-start relative z-10">
                <h1 class="text-white text-2xl sm:text-4xl lg:text-6xl leading-tight max-w-full lg:max-w-[60%] mt-8">
                    <b>Hunian</b>
                    Nyaman Menanti Anda
                </h1>
                <h4 class="text-white text-base sm:text-lg leading-relaxed mt-4 max-w-full lg:max-w-[60%]">
                    Temukan berbagai pilihan rumah dengan
                    desain modern, lokasi strategis, dan harga terjangkau. Kami hadir untuk membantu Anda mewujudkan hunian
                    impian yang nyaman dan aman bagi keluarga tercinta.
                </h4>
            </div>
        </div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 py-8">
            <h1 class="text-slate-400 text-xs sm:text-sm uppercase">Our Poperties</h1>
            <h2 class="text-slate-700 font-bold text-2xl sm:text-3xl leading-normal mt-4">Cek Area Poperty Terbaru
            </h2>

            <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
                @foreach ($properties as $property)
                    <div class="w-full flex flex-col gap-4 group" data-aos="zoom-in">
                        <div class="w-full relative aspect-video bg-slate-100 overflow-hidden rounded-lg">
                            <img src="{{ asset('storage/' . $property->image) }}"
                                class="absolute object-cover object-center h-full w-full group-hover:scale-110 transition-transform ease-in-out duration-500" />
                            <div
                                class="bg-black/30 w-full h-full absolute flex flex-col justify-between p-4 cursor-default transition-all duration-500 ease-in-out">
                                <h4 class="text-white px-3 py-1 bg-white/15 backdrop-blur-2xl w-fit rounded-full text-xs">
                                    {{ $property->location->name }}
                                </h4>
                                <div
                                    class="w-full translate-y-12 group-hover:translate-y-0 transition-all duration-300 ease-in-out">
                                    <a href="/properties/townhouse-jatibarang" class="text-white text-lg sm:text-xl">
                                        {{ $property->name }}
                                    </a>
                                    <a href="/properties/{{ $property->slug }}"
                                        class="mt-4 px-4 py-1 bg-emerald-700 text-white rounded-full flex gap-2 items-center w-fit hover:bg-emerald-900 transition-all duration-300 ease-in-out group">
                                        Lihat Detail
                                        <i data-feather="arrow-right" class="size-4"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="w-full flex flex-col gap-4 group" data-aos="zoom-in">
                    <div class="w-full relative aspect-video bg-slate-100 overflow-hidden rounded-lg">
                        <img src="{{ asset('/assets/images/no-image.jpg') }}"
                            class="absolute object-cover object-center h-full w-full group-hover:scale-110 transition-transform ease-in-out duration-500" />
                        <div
                            class="bg-black/30 w-full h-full absolute flex flex-col justify-between p-4 cursor-default transition-all duration-500 ease-in-out">
                            <h4 class="text-white px-3 py-1 bg-white/15 backdrop-blur-2xl w-fit rounded-full text-xs">
                                Cooming Soon
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
