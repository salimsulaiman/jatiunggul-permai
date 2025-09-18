@props(['categories'])

<div x-init="feather.replace()" class="flex items-center justify-between max-w-2xl mx-auto py-8 mb-4">
    @foreach ($categories as $index => $category)
        @php $stepNumber = $index + 1; @endphp

        <div class="flex items-center justify-center flex-col relative gap-2 cursor-pointer"
            @click="activeStep = {{ $stepNumber }}">
            <div class="flex items-center justify-center w-10 h-10 rounded-full border font-semibold transition"
                :class="activeStep === {{ $stepNumber }} ?
                    'bg-teal-600 text-white border-teal-600 shadow' :
                    'bg-white text-gray-600 border-gray-300 shadow'">

                <!-- Angka -->
                <span x-show="activeStep === {{ $stepNumber }}">{{ $stepNumber }}</span>

                <!-- Icon -->
                <i x-show="activeStep !== {{ $stepNumber }}" data-feather="{{ $category->icon }}" class="w-5 h-5"></i>
            </div>

            <span class="text-sm font-medium transition"
                :class="activeStep === {{ $stepNumber }} ? 'text-gray-800' : 'text-gray-600'">
                {{ $category->name }}
            </span>
        </div>

        @if (!$loop->last)
            <div class="flex-1 h-0.5 bg-gray-200 mx-2"></div>
        @endif
    @endforeach
</div>
