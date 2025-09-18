@extends('components.layouts.admin.app')
@section('content')
    <div x-data="{ pageName: `Property`, subPage: `{{ $property->name }}` }">
        @include('components.admin.breadcrumb')
    </div>
    <div
        class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-6 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-8">
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="w-full mb-4">
            <div class="w-full h-[48vw] md:h-[24vw] rounded-xl bg-slate-100 mb-4 relative overflow-hidden">
                <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}"
                    class="w-full h-full object-cover object-center">
            </div>

            <div class="w-full flex flex-col gap-4">
                <div class="w-full">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $property->name }}</h1>
                    <h4 class="text-sm text-gray-600 dark:text-gray-400">{{ $property->location->name }}</h4>
                </div>
                <p class="text-base text-slate-600 dark:text-slate-400 leading-relaxed">{{ $property->description }}</p>
                <div class="flex gap-2 mb-4">
                    <span
                        class="px-4 py-1 rounded-full text-white text-sm {{ $property->is_published ? 'bg-green-600' : 'bg-slate-400' }} w-fit">
                        {{ $property->is_published ? 'Published' : 'Unpublished' }}
                    </span>
                    <a href="{{ $property->maps_url }}" target="_blank"
                        class="px-4 py-1 rounded-full text-white text-sm bg-sky-700 hover:bg-sky-800 w-fit">Maps
                        Link</a>

                </div>
            </div>



            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#property-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="feature-tab"
                            data-tabs-target="#feature" type="button" role="tab" aria-controls="feature"
                            aria-selected="false">Feature</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="specification-tab" data-tabs-target="#specification" type="button" role="tab"
                            aria-controls="specification" aria-selected="false">Specification</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="type-tab" data-tabs-target="#type" type="button" role="tab" aria-controls="type"
                            aria-selected="false">Type</button>
                    </li>
                </ul>
            </div>
            <div id="property-tab-content">
                <div class="hidden" id="feature" role="tabpanel" aria-labelledby="feature-tab">
                    @include('pages.admin.property.tabs.feature', [
                        'features' => $features,
                        'tableId' => 'search-table-feature',
                    ])
                </div>
                <div class="hidden" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                    @include('pages.admin.property.tabs.specification', [
                        'specifications' => $specifications,
                        'categories' => $categories,
                        'tableId' => 'search-table-specification',
                    ])
                </div>
                <div class="hidden" id="type" role="tabpanel" aria-labelledby="type-tab">
                    @include('pages.admin.property.tabs.type', [
                        'types' => $types,
                        'tableId' => 'search-table-type',
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function imagePreview(initialUrl = null, inputId = 'dropzone-file') {
            return {
                previewUrl: initialUrl && initialUrl !== '' ? `/storage/${initialUrl}` : null,
                inputId: inputId,
                init() {},
                previewImage(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.previewUrl = URL.createObjectURL(file);
                    }
                },
                removeImage() {
                    this.previewUrl = null;
                    document.getElementById(this.inputId).value = null;
                }
            }
        }
    </script>
@endsection
