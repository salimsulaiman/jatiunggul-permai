@extends('components.layouts.admin.app')
@section('content')
    <div x-data="{ pageName: `Offering Section` }">
        @include('components.admin.breadcrumb')
    </div>
    <div
        class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-6 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-8">
        <div class="w-full mb-4">
            <div class="w-full flex items-center justify-between mb-4">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Offering Section
                </h3>
                <div class="flex gap-2 items-center">
                    <a href="{{ route('admin.offering-section.edit') }}"
                        class="px-4 py-2 text-sm rounded-xl bg-sky-700 hover:bg-sky-800 text-white ">Edit
                        Section</a>
                </div>
            </div>
            <div
                class="w-full min-h-[64vw] sm:min-h-[48vw] md:min-h-[28vw] rounded-xl bg-slate-100 relative overflow-hidden">
                <div class="w-full bg-white" id="offering">
                    <div class="w-full max-w-6xl px-4 sm:px-8 pt-4 mx-auto">
                        <h1 class="text-slate-400 text-sm uppercase text-start sm:text-center">Our Key Offerings</h1>
                        <h2
                            class="text-slate-700 font-bold text-2xl sm:text-3xl max-w-lg leading-normal mt-4 mb-0 sm:mb-12 text-start sm:text-center mx-auto">
                            {{ $offering_section->title }}
                        </h2>
                        @foreach ($offering_section->details as $index => $detail)
                            <div
                                class="w-full flex flex-col md:flex-row {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} gap-6 mt-4 sm:mt-10 h-fit md:h-[500px]">
                                <div class="w-full md:w-2/5 flex flex-col justify-center h-full">
                                    <h2 class="text-xl sm:text-3xl text-slate-700 leading-relaxed">
                                        {!! $detail->sub_title !!}
                                    </h2>
                                    <p class="text-sm text-slate-600 leading-relaxed mt-4">
                                        {{ $detail->description }}
                                    </p>
                                    @if ($detail->url && $detail->button_text)
                                        <a href="{{ $detail->url }}"
                                            class="text-sm px-4 py-2 bg-emerald-700 w-fit rounded-full flex gap-2 items-center group hover:bg-emerald-900 text-white cursor-pointer mt-4 transition-colors ease-in-out duration-300">
                                            {{ $detail->button_text }}
                                            <div class="rounded-full h-6 w-6 bg-white flex items-center justify-center p-1">
                                                <i data-feather="arrow-right"
                                                    class="size-4 text-emerald-800 group-hover:text-emerald-900 transition-colors duration-300 ease-in-out"></i>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <div class="w-full md:w-3/5 h-full bg-slate-200 overflow-hidden relative aspect-square">
                                    @if ($detail->image)
                                        <img src="{{ asset('storage/' . $detail->image) }}"
                                            class="absolute object-cover object-center h-full w-full" />
                                    @else
                                        @php
                                            $fallbackImage =
                                                $loop->index % 2 === 0
                                                    ? asset('/assets/images/front.jpg')
                                                    : asset('/assets/images/side.jpg');
                                        @endphp
                                        <img src="{{ $fallbackImage }}"
                                            class="absolute object-cover object-center h-full w-full" />
                                    @endif
                                </div>
                            </div>

                            {{-- Divider for mobile view --}}
                            @if ($loop->iteration < $offering_section->details->count())
                                <div class="w-full h-[3px] bg-slate-200 rounded-full mt-8 block sm:hidden"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
