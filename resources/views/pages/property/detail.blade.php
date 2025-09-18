@extends('components.layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-cover bg-top bg-no-repeat relative"
            style="background-image: url('{{ asset('storage/' . $property->image) }}')">
            <div class="absolute w-full bg-black/65 md:bg-black/45 h-full"></div>
            <div
                class="w-full max-w-7xl h-fit sm:h-[548px] px-8 pt-24 sm:pt-8 pb-8 mx-auto flex flex-col justify-center items-start relative z-10 overflow-hidden font-display">
                <h1 class="text-white text-3xl sm:text-4xl w-full mt-8 leading-tight text-center font-light">
                    {{ $property->name }}
                </h1>
                <h1 class="text-white text-3xl sm:text-7xl w-full mt-8 leading-tight text-center font-bold">
                    {{ $property->location->name }}</h1>
            </div>
        </div>
        <div class="w-full bg-white max-w-7xl mx-auto px-4 md:px-8 py-16">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Deskripsi -->
                <div class="w-full md:w-1/2">
                    <div class="w-full group">
                        <h1 class="text-emerald-700 text-base uppercase">Deskripsi</h1>
                        <div
                            class="w-8 h-1 bg-slate-400 rounded-full mt-2 group-hover:w-24 transition-all duration-500 ease-in-out">
                        </div>
                        <p class="text-base mt-2 text-slate-700">
                            {{ $property->description }}
                        </p>
                        <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8 mt-8">
                            @foreach ($property->features as $feature)
                                <div class="w-full flex gap-4 items-start">
                                    <div class="flex flex-col gap-2">
                                        <i data-feather="{{ $feature->icon }}" class="size-6 text-emerald-700 shrink-0"></i>
                                        <h4 class="text-slate-700 text-lg font-bold">{{ $feature->feature }}</h4>
                                        <h5 class="text-slate-700 text-sm">{{ $feature->description }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="w-full md:w-1/2 flex flex-col gap-8">
                    <iframe class="w-full aspect-video" src="{{ $property->maps_url }}" style="border:0;"
                        allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <div class="w-full bg-slate-50 rounded-b-4xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 py-16">
                <h1 class="text-slate-500 text-base uppercase text-center">Spesifikasi</h1>
                <h2 class="text-2xl sm:text-3xl text-slate-700 font-bold max-w-xl mx-auto text-center my-8">Spesifikasi
                    rumah standar
                    yang
                    nyaman untuk
                    ditinggali</h2>
                <div x-data="{ activeStep: 1 }" class="relative">
                    <x-step :categories="$specification_categories" />

                    {{-- Container untuk semua steps --}}
                    <div class="relative w-full aspect-video sm:aspect-auto sm:h-[428px]">
                        @foreach ($specification_categories as $index => $category)
                            @php
                                $stepNumber = $index + 1;
                                $specification = $property_specifications->firstWhere(
                                    'specification_category_id',
                                    $category->id,
                                );
                            @endphp

                            <div x-show="activeStep === {{ $stepNumber }}"
                                class="absolute inset-0 bg-cover rounded-2xl bg-top p-4 flex justify-end"
                                style="background-image: url('{{ $specification?->image ? asset('storage/' . $specification->image) : asset('assets/images/side.jpg') }}')">

                                <div
                                    class="h-full w-3/5 lg:w-2/5 bg-slate-50 rounded-xl p-8 hidden md:flex flex-col justify-between">
                                    <div class="w-full">
                                        <h4 class="text-xl text-slate-700 font-bold">
                                            {{ $specification?->title ?? 'Judul belum ada' }}
                                        </h4>
                                        <h5 class="text-base text-slate-600 mt-4">
                                            {{ $specification?->description ?? 'Deskripsi belum tersedia' }}
                                        </h5>
                                    </div>

                                    <div class="flex gap-4 justify-between mt-8">
                                        <div class="flex gap-4 items-center">
                                            <h4
                                                class="text-slate-500 py-2 px-4 rounded-full w-16 text-center border-2 border-slate-300 text-sm">
                                                {{ $stepNumber }}/{{ count($specification_categories) }}
                                            </h4>
                                            <h4 class="text-slate-600 text-sm">{{ $category->name }}</h4>
                                        </div>
                                        <div class="flex gap-4 items-center">
                                            <button class="text-slate-500 hover:text-slate-600 text-sm cursor-pointer"
                                                @click="activeStep = activeStep > 1 ? activeStep - 1 : activeStep">
                                                Sebelumnya
                                            </button>
                                            <button class="text-emerald-700 hover:text-emerald-800 text-sm cursor-pointer"
                                                @click="activeStep = activeStep < {{ count($specification_categories) }} ? activeStep + 1 : activeStep">
                                                Selanjutnya
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Tampilan mobile --}}
                    @php
                        // Buat array data untuk Alpine.js
                        $specificationsData = [];
                        foreach ($specification_categories as $index => $category) {
                            $spec = $property_specifications->firstWhere('specification_category_id', $category->id);
                            $specificationsData[$index + 1] = [
                                'title' => $spec?->title ?? 'Judul belum ada',
                                'description' => $spec?->description ?? 'Deskripsi belum tersedia',
                                'category_name' => $category->name,
                                'step' => $index + 1,
                                'total' => count($specification_categories),
                            ];
                        }
                    @endphp

                    <div class="h-full w-full sm:bg-white mt-8 sm:rounded-xl p-4 sm:p-8 flex md:hidden flex-col justify-between"
                        x-data="{ specifications: @js($specificationsData) }">
                        <div class="w-full">
                            <h4 class="text-lg sm:text-xl text-slate-700 font-bold"
                                x-text="specifications[activeStep]?.title || 'Judul belum ada'">
                            </h4>
                            <h5 class="text-base text-slate-600 mt-4"
                                x-text="specifications[activeStep]?.description || 'Deskripsi belum tersedia'">
                            </h5>
                        </div>
                        <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between mt-8">
                            <div class="flex gap-4 items-center w-full justify-center">
                                <h4 class="text-slate-500 py-2 px-4 rounded-full w-16 text-center border-2 border-slate-300 text-xs"
                                    x-text="`${activeStep}/{{ count($specification_categories) }}`">
                                </h4>
                            </div>
                            <div class="flex gap-4 items-center w-full sm:w-auto justify-center sm:justify-start">
                                <button class="text-slate-500 hover:text-slate-600 text-sm cursor-pointer"
                                    @click="activeStep = activeStep > 1 ? activeStep - 1 : activeStep">
                                    Sebelumnya
                                </button>
                                <button class="text-emerald-700 hover:text-emerald-800 text-sm cursor-pointer"
                                    @click="activeStep = activeStep < {{ count($specification_categories) }} ? activeStep + 1 : activeStep">
                                    Selanjutnya
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- tipe --}}
                {{-- Blade Template dengan navigasi yang berfungsi --}}
                @php
                    // Buat array untuk navigasi
                    $typeHouseIds = $property->typeHouses->pluck('id')->toArray();
                    $firstTypeSlug = $property->typeHouses->first()
                        ? 'type_' . $property->typeHouses->first()->id
                        : 'type1';
                @endphp

                <div x-data="{
                    tab: '{{ $firstTypeSlug }}',
                    typeIds: @js($typeHouseIds),
                    getCurrentIndex() {
                        const currentId = parseInt(this.tab.replace('type_', ''));
                        return this.typeIds.indexOf(currentId);
                    },
                    goToPrevious() {
                        const currentIndex = this.getCurrentIndex();
                        if (currentIndex > 0) {
                            this.tab = 'type_' + this.typeIds[currentIndex - 1];
                        }
                    },
                    goToNext() {
                        const currentIndex = this.getCurrentIndex();
                        if (currentIndex < this.typeIds.length - 1) {
                            this.tab = 'type_' + this.typeIds[currentIndex + 1];
                        }
                    }
                }" class="w-full mx-auto mt-8">
                    {{-- Tab buttons - Dynamic dari database --}}
                    <div class="flex space-x-2 bg-gray-100 p-1 rounded-lg w-fit">
                        @foreach ($property->typeHouses as $typeHouse)
                            @php
                                $typeSlug = 'type_' . $typeHouse->id;
                            @endphp
                            <button :class="tab === '{{ $typeSlug }}' ? 'bg-white text-black shadow' : 'text-gray-500'"
                                @click="tab = '{{ $typeSlug }}'"
                                class="px-4 py-2 rounded-lg text-sm font-medium focus:outline-none cursor-pointer">
                                {{ $typeHouse->title }}
                            </button>
                        @endforeach
                    </div>

                    <div class="mt-8 w-full">
                        {{-- Loop untuk setiap type house --}}
                        @foreach ($property->typeHouses as $index => $typeHouse)
                            @php
                                $typeSlug = 'type_' . $typeHouse->id;
                                $typeImage = $typeHouse->image
                                    ? asset('storage/' . $typeHouse->image)
                                    : asset('assets/images/type' . $typeHouse->id . '.png');
                                $isFirst = $index === 0;
                                $isLast = $index === count($property->typeHouses) - 1;
                            @endphp

                            <div x-show="tab === '{{ $typeSlug }}'">
                                {{-- Desktop view --}}
                                <div class="w-full aspect-video bg-cover rounded-2xl bg-center p-4 flex justify-start"
                                    style="background-image: url('{{ $typeImage }}')">
                                    <div
                                        class="h-full w-3/5 lg:w-2/5 bg-slate-50 rounded-xl p-8 hidden md:flex flex-col justify-between">
                                        <div class="w-full">
                                            <h4 class="text-xl text-slate-700 font-bold">{{ $typeHouse->title }}</h4>
                                            <h5 class="text-base text-slate-600 mt-4">
                                                {{ $typeHouse->description ?? 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa atque quisquam necessitatibus maxime facere rem. Libero dolorum beatae tenetur nesciunt!' }}
                                            </h5>
                                        </div>
                                        <div class="flex gap-4 justify-start">
                                            <div class="flex gap-4 items-center">
                                                <button
                                                    :class="getCurrentIndex() === 0 ? 'text-slate-300 cursor-not-allowed' :
                                                        'text-slate-500 hover:text-slate-600 cursor-pointer'"
                                                    class="text-sm" @click="getCurrentIndex() > 0 ? goToPrevious() : null">
                                                    Sebelumnya
                                                </button>
                                                <button
                                                    :class="getCurrentIndex() === typeIds.length - 1 ?
                                                        'text-slate-300 cursor-not-allowed' :
                                                        'text-emerald-700 hover:text-emerald-800 cursor-pointer'"
                                                    class="text-sm"
                                                    @click="getCurrentIndex() < typeIds.length - 1 ? goToNext() : null">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Mobile view --}}
                                <div class="w-full mt-8 p-4 sm:p-8 flex md:hidden flex-col justify-between">
                                    <div class="w-full">
                                        <h4 class="text-lg sm:text-xl text-slate-700 font-bold">{{ $typeHouse->title }}
                                        </h4>
                                        <h5 class="text-base text-slate-600 mt-4">
                                            {{ $typeHouse->description ?? 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa atque quisquam necessitatibus maxime facere rem. Libero dolorum beatae tenetur nesciunt!' }}
                                        </h5>
                                    </div>

                                    <div
                                        class="flex gap-4 items-center w-full sm:w-auto justify-center sm:justify-start mt-8">
                                        <button
                                            :class="getCurrentIndex() === 0 ? 'text-slate-300 cursor-not-allowed' :
                                                'text-slate-500 hover:text-slate-600 cursor-pointer'"
                                            class="text-sm" @click="getCurrentIndex() > 0 ? goToPrevious() : null">
                                            Sebelumnya
                                        </button>
                                        <button
                                            :class="getCurrentIndex() === typeIds.length - 1 ?
                                                'text-slate-300 cursor-not-allowed' :
                                                'text-emerald-700 hover:text-emerald-800 cursor-pointer'"
                                            class="text-sm"
                                            @click="getCurrentIndex() < typeIds.length - 1 ? goToNext() : null">
                                            Selanjutnya
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full bg-white max-w-7xl mx-auto px-4 md:px-8 py-16">
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
                        @foreach ($faqs as $index => $faq)
                            <h2 id="accordion-flush-heading-{{ $index }}">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                    data-accordion-target="#accordion-flush-body-{{ $index }}"
                                    aria-expanded="true" aria-controls="accordion-flush-body-{{ $index }}">
                                    <span>{{ $faq->title }}</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-{{ $index }}" class="hidden"
                                aria-labelledby="accordion-flush-heading-{{ $index }}">
                                <div class="py-5 border-b border-gray-200 px-4">
                                    <p class="mb-2 text-gray-500">{{ $faq->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
