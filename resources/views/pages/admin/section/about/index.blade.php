@extends('components.layouts.admin.app')
@section('content')
    <div x-data="{ pageName: `About Section` }">
        @include('components.admin.breadcrumb')
    </div>
    <div
        class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-6 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-8">
        <div class="w-full mb-4">
            <div class="w-full flex items-center justify-between mb-4">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    About Section
                </h3>
                <div class="flex gap-2 items-center">
                    <a href="{{ route('admin.about-section.edit') }}"
                        class="px-4 py-2 text-sm rounded-xl bg-sky-700 hover:bg-sky-800 text-white ">Edit
                        Section</a>
                </div>
            </div>
            <div
                class="w-full min-h-[64vw] sm:min-h-[48vw] md:min-h-[28vw] rounded-xl bg-slate-100 relative overflow-hidden">
                <div class="w-full mx-auto flex flex-col">
                    <div class="w-full flex flex-col md:flex-row relative h-fit md:h-[500px] lg:h-[400px]">
                        <div
                            class="absolute w-full max-w-7xl px-8 h-full hidden md:flex flex-col justify-center mx-auto z-10 left-0 right-0">
                            <h1 class="text-slate-400 text-sm uppercase">About Us</h1>
                            <p class="max-w-1/2 pe-16 text-white mt-4 leading-loose line-clamp-5">
                                {{ $about_section->description }}
                            </p>
                            <a href=""
                                class="px-4 py-2 bg-white text-slate-800 rounded-full flex gap-2 items-center group hover:bg-slate-300 w-fit cursor-pointer mt-4">More
                                About Us
                                <div class="rounded-full h-6 w-6 bg-emerald-900 flex items-center justify-center p-1"> <i
                                        data-feather="arrow-right" class="size-4 text-white"></i>
                                </div>
                            </a>
                        </div>
                        <div
                            class="w-full md:w-1/2 h-full bg-emerald-900 flex flex-col justify-center items-end px-0 md:px-8">
                            <div class="w-full px-4 sm:px-8 h-full flex md:hidden flex-col justify-center py-16">
                                <h1 class="text-slate-400 text-sm uppercase">About Us</h1>
                                <p class="max-w-none md:max-w-1/2 text-white mt-4 leading-loose line-clamp-5">
                                    {{ $about_section->description }}
                                </p>
                                <a href=""
                                    class="px-4 py-2 bg-white text-slate-800 rounded-full flex gap-2 items-center group hover:bg-slate-300 w-fit cursor-pointer mt-4">More
                                    About Us
                                    <div class="rounded-full h-6 w-6 bg-emerald-900 flex items-center justify-center p-1">
                                        <i data-feather="arrow-right" class="size-4 text-white"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 h-[300px] md:h-full relative">
                            <img src="{{ $about_section->image ? asset('storage/' . $about_section->image) : asset('assets/images/outdoor.jpg') }}"
                                alt="" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="w-full p-8 bg-emerald-800">
                        <div
                            class="w-full max-w-7xl mx-auto flex flex-col sm:flex-row gap-8 sm:gap-4 justify-between items-center px-8">
                            <div class="flex flex-col items-center sm:items-start justify-center gap-4">
                                <h1 class="text-white text-4xl sm:text-5xl">{{ $about_section->project_completed }}+</h1>
                                <h4 class="text-center sm:text-start text-white">Sustainable Projects Completed</h4>
                            </div>
                            <div class="flex flex-col items-center sm:items-start justify-center gap-4">
                                <h1 class="text-white text-4xl sm:text-5xl">{{ $about_section->project_duration }} <span
                                        class="text-base">Month</span></h1>
                                <h4 class="text-center sm:text-start text-white">Faster Construction Time</h4>
                            </div>
                            <div class="flex flex-col items-center sm:items-start justify-center gap-4">
                                <h1 class="text-white text-4xl sm:text-5xl">{{ $about_section->satisfaction_percentage }}%
                                </h1>
                                <h4 class="text-center sm:text-start text-white">Pembeli Terpuaskan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
