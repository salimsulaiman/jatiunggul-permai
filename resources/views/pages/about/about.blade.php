@extends('components.layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full max-w-6xl px-4 sm:px-6 lg:px-8 pb-8 pt-28 mx-auto bg-white">
            <h1 class="text-slate-400 text-sm uppercase text-center">About Us</h1>
            <h2 class="text-slate-700 font-bold text-3xl sm:text-4xl leading-normal mt-4 text-center">
                Discover our <span class="text-slate-500">Team</span>
            </h2>
            <p class="text-slate-500 text-center max-w-2xl mx-auto mt-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo, distinctio! Inventore illum reprehenderit
                sequi quam omnis iste sint necessitatibus velit.
            </p>
            <div class="w-full aspect-video bg-slate-100 rounded-3xl mt-8 relative overflow-hidden">
                <div class="w-full aspect-video bg-slate-100 rounded-3xl relative overflow-hidden">
                    <img src="{{ asset('assets/images/front.jpg') }}" alt=""
                        class="w-full h-full absolute object-center object-cover">
                </div>
            </div>
        </div>

        <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white">
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
        </div>

        <div class="w-full max-w-6xl mx-auto p-4 sm:p-6 md:p-8 pt-8 pb-16 bg-white">
            <h1 class="text-slate-400 text-sm uppercase">Testimonial</h1>
            <h2 class="text-slate-700 font-bold text-3xl sm:text-4xl leading-normal mt-4 max-w-md">Loved by <span
                    class="text-slate-500">teams</span> around the world</h2>
            <div class="w-full swiper mySwiper mt-8">
                <div class="swiper-wrapper">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="w-full bg-slate-100 rounded-xl flex flex-col p-6 swiper-slide">
                            <div class="flex gap-1 mb-4">
                                <i data-feather="star" class="size-4 text-slate-600"></i></button>
                                <i data-feather="star" class="size-4 text-slate-600"></i></button>
                                <i data-feather="star" class="size-4 text-slate-600"></i></button>
                                <i data-feather="star" class="size-4 text-slate-600"></i></button>
                                <i data-feather="star" class="size-4 text-slate-600"></i></button>
                            </div>
                            <h4 class="text-slate-600 mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus
                                assumenda
                                veritatis eius doloremque expedita incidunt maiores veniam. Dolores, harum asperiores?</h4>
                            <div class="flex w-full gap-4 items-center">
                                <div class="w-10 h-10 rounded-full bg-slate-200 relative overflow-hidden shrink-0">
                                    <img src="{{ asset('assets/images/person/salim.png') }}" alt=""
                                        class="w-full h-full absolute object-center object-cover">
                                </div>
                                <div class="w-full">
                                    <h5 class="text-slate-600 text-sm">Salim Sulaiman</h5>
                                    <h5 class="text-xs text-slate-500">Businessman</h5>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
@endsection
