@extends('components.layouts.admin.app')
@section('content')
    <div x-data="{ pageName: `Home Section` }">
        @include('components.admin.breadcrumb')
    </div>
    <div
        class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-6 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-8">
        <div class="w-full mb-4">
            <div class="w-full flex items-center justify-between mb-4">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Home Section
                </h3>
                <div class="flex gap-2 items-center">
                    <a href="{{ route('admin.home-section.edit') }}"
                        class="px-4 py-2 text-sm rounded-xl bg-sky-700 hover:bg-sky-800 text-white ">Edit
                        Section</a>
                </div>
            </div>
            <div class="w-full h-[64vw] sm:h-[48vw] md:h-[28vw] rounded-xl bg-slate-100 relative overflow-hidden bg-cover bg-no-repeat bg-top"
                style="background-image: url('{{ $home_section->image ? asset('storage/' . $home_section->image) : asset('assets/images/house.jpg') }}')">
                <div class="absolute w-full bg-black/65 md:bg-black/45 h-full"></div>
                <div
                    class="w-full max-w-6xl h-full px-4 sm:px-8 pt-20 sm:pt-8 pb-6 sm:pb-8 mx-auto flex flex-col justify-center items-start relative z-10">

                    <h4
                        class="px-3 sm:px-4 py-1.5 sm:py-2 bg-black/20 border border-white rounded-full text-white backdrop-blur-lg text-[11px] sm:text-xs">
                        {{ $home_section->badge }}
                    </h4>

                    <h1
                        class="text-white text-sm sm:text-xl lg:text-2xl mt-6 sm:mt-8 leading-snug sm:leading-tight max-w-full xl:max-w-[50%]">
                        {!! $home_section->title !!}
                    </h1>

                    <h4
                        class="line-clamp-3 text-white text-xs sm:text-sm mt-3 sm:mt-4 leading-relaxed max-w-full lg:max-w-[50%]">
                        {{ $home_section->description }}
                    </h4>

                    <div class="hidden sm:flex flex-col sm:flex-row gap-3 sm:gap-4 mt-5 sm:mt-6">
                        <div
                            class="cursor-default text-sm px-4 py-2 bg-white text-slate-800 rounded-full flex gap-2 items-center group hover:bg-slate-300 w-fit">
                            {{ $home_section->button_home_1 }}
                            <div class="rounded-full h-5 w-5 bg-emerald-900 flex items-center justify-center p-1">
                                <i data-feather="arrow-right" class="size-4 text-white"></i>
                            </div>
                        </div>
                        <div
                            class="cursor-default text-sm px-4 py-2 bg-black/45 text-white rounded-full flex gap-2 items-center hover:bg-black/75 w-fit">
                            {{ $home_section->button_home_2 }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
