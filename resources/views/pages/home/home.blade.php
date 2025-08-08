@extends('components.layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-cover bg-top bg-no-repeat relative"
            style="background-image: url('{{ asset('assets/images/house.jpg') }}')">
            <div class="absolute w-full bg-black/65 md:bg-black/45 h-full"></div>

            <div
                class="w-full max-w-6xl h-auto sm:h-[748px] px-4 sm:px-8 pt-24 sm:pt-8 pb-8 mx-auto flex flex-col justify-end items-start relative z-10">

                <h4
                    class="px-4 py-2 bg-black/20 border border-white rounded-full text-white backdrop-blur-lg text-sm sm:text-base">
                    Beautifull Prefab Homes Jatibarang
                </h4>

                <h1 class="text-white text-2xl sm:text-5xl lg:text-6xl mt-8 leading-tight lg:max-w-[50%]">
                    Transforming <b>Spaces</b> Elevating <b>Standards</b>
                </h1>

                <h4 class="text-white text-sm sm:text-base mt-4 leading-relaxed lg:max-w-[50%]">
                    Calm, healthy, and energy efficient homes are within reach.
                    Experience European standards in Australia with our prefab panel systems and high-performance windows,
                    redefining how a home should feel.
                </h4>

                <div class="flex flex-col sm:flex-row gap-4 mt-6 mb-8">
                    <a href=""
                        class="px-4 py-2 bg-white text-slate-800 rounded-full flex gap-2 items-center group hover:bg-slate-300 w-fit">
                        Start Today
                        <div class="rounded-full h-6 w-6 bg-emerald-900 flex items-center justify-center p-1">
                            <i data-feather="arrow-right" class="size-4 text-white"></i>
                        </div>
                    </a>
                    <a href=""
                        class="px-4 py-2 bg-black/45 text-white rounded-full flex gap-2 items-center hover:bg-black/75 w-fit">
                        Our Properties
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full mx-auto flex flex-col">
            <div class="w-full flex flex-col md:flex-row relative h-fit md:h-[500px] lg:h-[400px]">
                <div
                    class="absolute w-full max-w-6xl px-8 h-full hidden md:flex flex-col justify-center mx-auto z-10 left-0 right-0">
                    <h1 class="text-slate-400 text-sm uppercase">About Us</h1>
                    <p class="max-w-1/2 pe-16 text-white mt-4 leading-loose">
                        Jati Unggul is a leading provider of sustainable and innovative housing solutions in Indonesia.
                        With
                        a
                        commitment to quality and environmental responsibility, we specialize in creating beautiful,
                        energy-efficient
                        homes that enhance the living experience while minimizing ecological impact. Our team of experts
                        combines
                    </p>
                    <a href=""
                        class="px-4 py-2 bg-white text-slate-800 rounded-full flex gap-2 items-center group hover:bg-slate-300 w-fit cursor-pointer mt-4">More
                        About Us
                        <div class="rounded-full h-6 w-6 bg-emerald-900 flex items-center justify-center p-1"> <i
                                data-feather="arrow-right" class="size-4 text-white"></i>
                        </div>
                    </a>
                </div>
                <div class="w-full md:w-1/2 h-full bg-emerald-900 flex flex-col justify-center items-end px-0 md:px-8">
                    <div class="w-full px-4 sm:px-8 h-full flex md:hidden flex-col justify-center py-16">
                        <h1 class="text-slate-400 text-sm uppercase">About Us</h1>
                        <p class="max-w-none md:max-w-1/2 text-white mt-4 leading-loose">
                            Jati Unggul is a leading provider of sustainable and innovative housing solutions in
                            Indonesia.
                            With
                            a
                            commitment to quality and environmental responsibility, we specialize in creating beautiful,
                            energy-efficient
                            homes that enhance the living experience while minimizing ecological impact. Our team of
                            experts
                            combines
                        </p>
                        <a href=""
                            class="px-4 py-2 bg-white text-slate-800 rounded-full flex gap-2 items-center group hover:bg-slate-300 w-fit cursor-pointer mt-4">More
                            About Us
                            <div class="rounded-full h-6 w-6 bg-emerald-900 flex items-center justify-center p-1"> <i
                                    data-feather="arrow-right" class="size-4 text-white"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 h-[300px] md:h-full relative">
                    <img src="{{ asset('/assets/images/outdoor.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="w-full p-8 bg-emerald-800">
                <div
                    class="w-full max-w-6xl mx-auto flex flex-col sm:flex-row gap-8 sm:gap-4 justify-between items-center px-8">
                    <div class="flex flex-col items-center sm:items-start justify-center gap-4">
                        <h1 class="text-white text-4xl sm:text-5xl">500+</h1>
                        <h4 class="text-white">Sustainable Projects Completed</h4>
                    </div>
                    <div class="flex flex-col items-center sm:items-start justify-center gap-4">
                        <h1 class="text-white text-4xl sm:text-5xl">75%</h1>
                        <h4 class="text-white">Faster Construction Time</h4>
                    </div>
                    <div class="flex flex-col items-center sm:items-start justify-center gap-4">
                        <h1 class="text-white text-4xl sm:text-5xl">85%</h1>
                        <h4 class="text-white">Reduction in Energy Cost</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-6xl px-4 sm:px-6 md:px-8 py-16 mx-auto">
            <h1 class="text-slate-400 text-sm uppercase">Pro Resource</h1>
            <h2 class="text-slate-700 font-bold text-3xl sm:text-4xl max-w-md leading-snug mt-4 text-balance">
                Expert Guides For Your Next Project
            </h2>

            <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8 mt-8">
                <!-- Card Item Start -->
                @foreach (['house.jpg', 'side.jpg', 'modern.png'] as $image)
                    <div class="w-full flex flex-col gap-4 group" data-aos="zoom-in">
                        <div class="w-full relative aspect-[4/3] sm:aspect-square bg-slate-100 overflow-hidden rounded-lg">
                            <img src="{{ asset('/assets/images/' . $image) }}"
                                class="absolute object-cover object-center h-full w-full group-hover:scale-110 transition-transform ease-in-out duration-500" />
                            <div
                                class="bg-black/0 group-hover:bg-black/30 w-full h-full absolute flex flex-col justify-between p-4 cursor-default transition-all duration-500 ease-in-out opacity-0 group-hover:opacity-100">
                                <h4 class="text-white uppercase">Guide</h4>
                                <h4 class="text-white text-xl md:text-2xl leading-tight">
                                    For <b>Architects</b> & Building <b>Designers</b>
                                </h4>
                            </div>
                        </div>
                        <p class="text-slate-600 leading-relaxed line-clamp-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet odit facilis, animi aperiam
                            tenetur
                            dolorem explicabo eaque libero distinctio? Tenetur, accusantium.
                        </p>
                        <a href="#"
                            class="px-4 py-2 bg-emerald-700 text-white rounded-full flex gap-2 items-center w-fit hover:bg-emerald-900 transition-colors duration-300 ease-in-out">
                            Download Guide
                            <i data-feather="download-cloud" class="size-4"></i>
                        </a>
                    </div>
                @endforeach
                <!-- Card Item End -->
            </div>
        </div>

        <div class="w-full max-w-6xl px-4 sm:px-8 pt-4 pb-20 mx-auto" id="offering">
            <h1 class="text-slate-400 text-sm uppercase text-start sm:text-center">Our Key Offerings</h1>
            <h2
                class="text-slate-700 font-bold text-3xl sm:text-4xl max-w-lg leading-normal mt-4 mb-0 sm:mb-12 text-start sm:text-center mx-auto">
                Building
                The
                Future,
                Today
            </h2>
            <div class="w-full flex flex-col md:flex-row gap-6 mt-4 sm:mt-10 h-fit md:h-[500px]">
                <div class="w-full md:w-2/5 flex flex-col justify-center h-full">
                    <h2 class="text-2xl sm:text-4xl text-slate-700 max-w-none md:max-w-sm leading-relaxed">Energy-<span
                            class="text-emerald-700 font-bold">Efficient</span>
                        Windows</h2>
                    <p class="text-slate-600 leading-relaxed mt-4">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.
                        Commodi cum accusantium deleniti temporibus
                        laudantium quas dolor labore ea, libero, provident neque magnam amet atque harum exercitationem
                        repudiandae ab et hic ullam. Harum necessitatibus molestiae totam autem libero blanditiis unde
                        ad
                        quam quasi maxime veritatis iste nesciunt perspiciatis temporibus modi, iure earum deleniti
                        inventore sapiente! Aliquid sed qui iste adipisci deleniti.</p>
                    <a href=""
                        class="px-4 py-2 bg-emerald-700 w-fit rounded-full flex gap-2 items-center group hover:bg-emerald-900 text-white cursor-pointer mt-4 transition-colors ease-in-out duration-300">Explore
                        Our Range
                        <div class="rounded-full h-6 w-6 bg-white flex items-center justify-center p-1"> <i
                                data-feather="arrow-right"
                                class="size-4 text-emerald-800 group-hover:text-emerald-900 transition-colors duration-300 ease-in-out"></i>
                        </div>
                    </a>
                </div>
                <div class="w-full md:w-3/5 h-full bg-slate-200 overflow-hidden relative aspect-square">
                    <img src="{{ asset('/assets/images/front.jpg') }}"
                        class="absolute object-cover object-center h-full w-full" />
                </div>
            </div>
            <div class="w-full h-[3px] bg-slate-200 rounded-full mt-8 block sm:hidden"></div>
            <div class="w-full flex flex-col md:flex-row-reverse gap-6 mt-12 h-fit md:h-[500px]">
                <div class="w-full md:w-2/5 flex flex-col justify-center h-full">
                    <h2 class="text-2xl sm:text-4xl text-slate-700 leading-relaxed">Build Your Dream Home in Just <span
                            class="text-emerald-700 font-bold">Three Months!</span></h2>
                    <p class="text-slate-600 leading-relaxed mt-4">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.
                        Commodi cum accusantium deleniti temporibus
                        laudantium quas dolor labore ea, libero, provident neque magnam amet atque harum exercitationem
                        repudiandae ab et hic ullam. Harum necessitatibus molestiae totam autem libero blanditiis unde
                        ad
                        quam quasi maxime veritatis iste nesciunt perspiciatis temporibus modi, iure earum deleniti
                        inventore sapiente! Aliquid sed qui iste adipisci deleniti.</p>
                    <a href=""
                        class="px-4 py-2 bg-emerald-700 w-fit rounded-full flex gap-2 items-center group hover:bg-emerald-900 text-white cursor-pointer mt-4 transition-colors ease-in-out duration-300">Explore
                        Our Systems
                        <div class="rounded-full h-6 w-6 bg-white flex items-center justify-center p-1"> <i
                                data-feather="arrow-right"
                                class="size-4 text-emerald-800 group-hover:text-emerald-900 transition-colors duration-300 ease-in-out"></i>
                        </div>
                    </a>
                </div>
                <div class="w-full md:w-3/5 h-full bg-slate-200 overflow-hidden relative aspect-square">
                    <img src="{{ asset('/assets/images/side.jpg') }}"
                        class="absolute object-cover object-center h-full w-full" />
                </div>
            </div>
        </div>

        <div class="w-full mx-auto flex flex-col">
            <div class="w-full flex flex-col md:flex-row relative h-fit md:h-[600px]">
                <div
                    class="absolute w-full max-w-6xl px-4 sm:px-8 h-full hidden md:flex flex-col justify-center mx-auto z-10 left-0 right-0">
                    <h1 class="text-slate-400 text-sm uppercase">Testimonials</h1>
                    <h2 class="text-4xl text-white mt-4">What Our Clients Say?</h2>
                    <p class="max-w-1/2 pe-16 text-white mt-12 italic leading-loose text-2xl">
                        <q>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus magnam alias adipisci
                            harum
                            quo ex ea quam eum saepe quia.
                        </q>
                    </p>
                    <div class="flex items-center mt-12 gap-4">
                        <div class="h-20 w-20 rounded-full bg-slate-200 relative overflow-hidden">
                            <img src="{{ asset('assets/images/profile.jpg') }}" alt=""
                                class="h-full w-full object-cover object-center">
                        </div>
                        <div class="flex flex-col gap-2">
                            <h4 class="text-white text-lg font-bold">Salim Sulaiman</h4>
                            <h5 class="text-sm text-white">prefab client</h5>
                        </div>
                    </div>
                    <div class="flex gap-4 mt-8 items-center">
                        <button
                            class="h-12 w-12 rounded-full border border-white flex items-center justify-center p-1 hover:bg-white group cursor-pointer">
                            <i data-feather="arrow-left" class="size-5 text-white group-hover:text-emerald-800"></i>
                        </button>
                        <h4 class="text-lg font-thin text-white">01/03</h4>
                        <button
                            class="h-12 w-12 rounded-full border border-white flex items-center justify-center p-1 hover:bg-white group cursor-pointer">
                            <i data-feather="arrow-right" class="size-5 text-white group-hover:text-emerald-800"></i>
                        </button>
                    </div>
                </div>
                <div
                    class="w-full md:w-1/2 h-full bg-emerald-800 flex flex-col justify-center items-end px-4 sm:px-8 py-16">
                    <div class="relative w-full px-0 sm:px-8 h-full flex md:hidden flex-col justify-center mx-auto">
                        <h1 class="text-slate-400 text-sm uppercase text-center sm:text-start">Testimonials</h1>
                        <h2 class="text-2xl sm:text-4xl text-white mt-4 text-center sm:text-start">What Our Clients Say?
                        </h2>
                        <p
                            class="w-full pe-0 sm:pe-16 text-white mt-12 italic leading-loose text-base sm:text-2xl text-center sm:text-start">
                            <q>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus magnam alias adipisci
                                harum
                                quo ex ea quam eum saepe quia.
                            </q>
                        </p>
                        <div class="flex items-center justify-center sm:justify-start mt-12 gap-4">
                            <div class="h-20 w-20 rounded-full bg-slate-200 relative overflow-hidden">
                                <img src="{{ asset('assets/images/profile.jpg') }}" alt=""
                                    class="h-full w-full object-cover object-center">
                            </div>
                            <div class="flex flex-col gap-2">
                                <h4 class="text-white text-lg font-bold">Salim Sulaiman</h4>
                                <h5 class="text-sm text-white">prefab client</h5>
                            </div>
                        </div>
                        <div class="flex gap-4 mt-8 items-center justify-center sm:justify-start">
                            <button
                                class="h-12 w-12 rounded-full border border-white flex items-center justify-center p-1 hover:bg-white group cursor-pointer">
                                <i data-feather="arrow-left" class="size-5 text-white group-hover:text-emerald-800"></i>
                            </button>
                            <h4 class="text-base sm:text-lg font-thin text-white">01/03</h4>
                            <button
                                class="h-12 w-12 rounded-full border border-white flex items-center justify-center p-1 hover:bg-white group cursor-pointer">
                                <i data-feather="arrow-right" class="size-5 text-white group-hover:text-emerald-800"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 h-full relative">
                    <img src="{{ asset('/assets/images/minima.jpg') }}" alt=""
                        class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <div class="w-full max-w-6xl px-4 sm:px-8 py-16 mx-auto">
            <h1 class="text-slate-400 text-sm uppercase text-center">Our Benefits</h1>
            <h2 class="text-slate-700 font-bold text-2xl sm:text-4xl max-w-lg leading-normal mt-4 text-center mx-auto">
                Why
                Choose Us?
            </h2>
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
                <div
                    class="w-full bg-saltpan-50 group hover:bg-emerald-700 transition-all duration-150 ease-in-out p-4 flex flex-col gap-2 cursor-default hover:rounded-2xl">
                    <i data-feather="zap"
                        class="size-8 text-emerald-700 group-hover:text-white transition-all duration-150 ease-in-out"></i>
                    <h4 class="text-slate-700 font-bold group-hover:text-white transition-all duration-150 ease-in-out">
                        Energy Efficiency</h4>
                    <h5 class="text-slate-600 text-sm group-hover:text-white transition-all duration-150 ease-in-out">
                        Lorem
                        ipsum, dolor sit amet consectetur adipisicing elit. Eum minima
                        id neque pariatur nemo repellat animi, veniam vel alias consequuntur?</h5>
                </div>
                <div
                    class="w-full bg-saltpan-50 group hover:bg-emerald-700 transition-all duration-150 ease-in-out p-4 flex flex-col gap-2 cursor-default hover:rounded-2xl">
                    <i data-feather="repeat"
                        class="size-8 text-emerald-700 group-hover:text-white transition-all duration-150 ease-in-out"></i>
                    <h4 class="text-slate-700 font-bold group-hover:text-white transition-all duration-150 ease-in-out">
                        Sustainability</h4>
                    <h5 class="text-slate-600 text-sm group-hover:text-white transition-all duration-150 ease-in-out">
                        Lorem
                        ipsum, dolor sit amet consectetur adipisicing elit. Eum minima
                        id neque pariatur nemo repellat animi, veniam vel alias consequuntur?</h5>
                </div>
                <div
                    class="w-full bg-saltpan-50 group hover:bg-emerald-700 transition-all duration-150 ease-in-out p-4 flex flex-col gap-2 cursor-default hover:rounded-2xl">
                    <i data-feather="heart"
                        class="size-8 text-emerald-700 group-hover:text-white transition-all duration-150 ease-in-out"></i>
                    <h4 class="text-slate-700 font-bold group-hover:text-white transition-all duration-150 ease-in-out">
                        Healthy Homes</h4>
                    <h5 class="text-slate-600 text-sm group-hover:text-white transition-all duration-150 ease-in-out">
                        Lorem
                        ipsum, dolor sit amet consectetur adipisicing elit. Eum minima
                        id neque pariatur nemo repellat animi, veniam vel alias consequuntur?</h5>
                </div>
                <div
                    class="w-full bg-saltpan-50 group hover:bg-emerald-700 transition-all duration-150 ease-in-out p-4 flex flex-col gap-2 cursor-default hover:rounded-2xl">
                    <i data-feather="sliders"
                        class="size-8 text-emerald-700 group-hover:text-white transition-all duration-150 ease-in-out"></i>
                    <h4 class="text-slate-700 font-bold group-hover:text-white transition-all duration-150 ease-in-out">
                        Customizable Designs</h4>
                    <h5 class="text-slate-600 text-sm group-hover:text-white transition-all duration-150 ease-in-out">
                        Lorem
                        ipsum, dolor sit amet consectetur adipisicing elit. Eum minima
                        id neque pariatur nemo repellat animi, veniam vel alias consequuntur?</h5>
                </div>
                <div
                    class="w-full bg-saltpan-50 group hover:bg-emerald-700 transition-all duration-150 ease-in-out p-4 flex flex-col gap-2 cursor-default hover:rounded-2xl">
                    <i data-feather="clock"
                        class="size-8 text-emerald-700 group-hover:text-white transition-all duration-150 ease-in-out"></i>
                    <h4 class="text-slate-700 font-bold group-hover:text-white transition-all duration-150 ease-in-out">
                        Quick Instalation</h4>
                    <h5 class="text-slate-600 text-sm group-hover:text-white transition-all duration-150 ease-in-out">
                        Lorem
                        ipsum, dolor sit amet consectetur adipisicing elit. Eum minima
                        id neque pariatur nemo repellat animi, veniam vel alias consequuntur?</h5>
                </div>
                <div
                    class="w-full bg-saltpan-50 group hover:bg-emerald-700 transition-all duration-150 ease-in-out p-4 flex flex-col gap-2 cursor-default hover:rounded-2xl">
                    <i data-feather="cloud"
                        class="size-8 text-emerald-700 group-hover:text-white transition-all duration-150 ease-in-out"></i>
                    <h4 class="text-slate-700 font-bold group-hover:text-white transition-all duration-150 ease-in-out">
                        Enhance Comfort</h4>
                    <h5 class="text-slate-600 text-sm group-hover:text-white transition-all duration-150 ease-in-out">
                        Lorem
                        ipsum, dolor sit amet consectetur adipisicing elit. Eum minima
                        id neque pariatur nemo repellat animi, veniam vel alias consequuntur?</h5>
                </div>
            </div>
        </div>

        <div class="w-full max-w-6xl px-0 sm:px-8 pt-8 pb-16 mx-auto">
            <div
                class="w-full bg-emerald-900 h-fit md:h-[600px] flex flex-col md:flex-row items-center justify-between gap-8 px-0 sm:px-8 md:px-0">
                <div class="w-full md:w-1/2 h-[300px] md:h-full relative overflow-hidden p-0 sm:p-8 md:p-0">
                    <img src="{{ asset('assets/images/modern.png') }}" alt=""
                        class="absolute object-cover object-center h-full w-full">
                    <div
                        class="absolute w-[200px] h-full bg-linear-to-l from-emerald-900 to-transparent right-0 hidden sm:block">
                    </div>
                </div>
                <div class="w-full md:w-1/2 h-full flex flex-col justify-center px-4 sm:px-8 py-12">
                    <h1 class="text-4xl lg:text-6xl text-white leading-normal">Take the <b>Next Step</b> with NZP</h1>
                    <p class="text-white mt-4">Transform Your Vision into Reality with Our Expert Guidance</p>
                    <a href=""
                        class="px-4 py-2 bg-white text-slate-800 rounded-full flex gap-2 items-center group hover:bg-slate-300 cursor-pointer w-fit mt-8">Book
                        Free Consultation<div
                            class="rounded-full h-6 w-6 bg-emerald-900 flex items-center justify-center p-1"> <i
                                data-feather="arrow-right" class="size-4 text-white"></i>
                        </div></a>
                </div>
            </div>
        </div>
    </div>
@endsection
