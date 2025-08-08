@extends('components.layouts.admin.app')
@section('content')
    <div x-data="{ pageName: `Offering Section` }">
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
            <div class="w-full flex items-center justify-between mb-4">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Offering Section Data
                </h3>
            </div>
            <div class="w-full">
                <form class="w-full" action="{{ route('admin.offering-section.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-4 md:p-5 space-y-4">
                        <input type="hidden" name="id" value="{{ $offering_section->id }}">
                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Title</label>
                            <input type="text" id="title" name="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $offering_section->title }}" />
                        </div>
                        @foreach ($offering_section->details as $index => $detail)
                            <div class="w-full">
                                <h2 class="mb-3 text-slate-500 font-medium">Section {{ $index + 1 }}</h2>
                                <div class="w-full rounded-2xl border-2 border-dashed border-slate-300 p-4 space-y-4">
                                    <div class="mb-5">
                                        <label for="sub_title"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Sub Title</label>
                                        <input type="text" id="sub_title" name="details[{{ $detail->id }}][sub_title]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ $detail->sub_title }}" />
                                    </div>
                                    <div class="mb-5" x-data="imagePreview('{{ old('details.' . $detail->id . '.image') ?? ($detail->image ?? '') }}', 'dropzone-file-edit-{{ $detail->id }}')" x-init="init()">
                                        <label for="image"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>

                                        <div class="flex items-center justify-center w-full relative">

                                            <template x-if="previewUrl">
                                                <button type="button" @click="removeImage"
                                                    class="p-1 text-sm rounded-full bg-red-500 hover:bg-red-600 text-white absolute z-20 top-2 right-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M18 6L6 18M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </template>
                                            <label for="dropzone-file-edit-{{ $detail->id }}"
                                                class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 p-4">

                                                <template x-if="previewUrl">
                                                    <img :src="previewUrl" alt="Preview"
                                                        class="object-cover h-full w-full rounded-lg absolute" />
                                                </template>

                                                <template x-if="!previewUrl">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                                                                                                                                                                                                                                                                                                                                             5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4
                                                                                                                                                                                                                                                                                                                                             0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                        </svg>
                                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                            <span class="font-semibold">Click to upload</span> or
                                                            drag and drop
                                                        </p>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                                            SVG, PNG, JPG or GIF (MAX. 800x400px)
                                                        </p>
                                                    </div>
                                                </template>

                                                <input id="dropzone-file-edit-{{ $detail->id }}" type="file"
                                                    class="hidden" name="details[{{ $detail->id }}][image]"
                                                    @change="previewImage" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea id="description" rows="4" name="details[{{ $detail->id }}][description]"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write property description here...">{{ $detail->description }}</textarea>
                                    </div>
                                    <div class="mb-5">
                                        <label for="button_text"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Button Text</label>
                                        <input type="text" id="button_text"
                                            name="details[{{ $detail->id }}][button_text]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ $detail->button_text }}" />
                                    </div>
                                    <div class="">
                                        <label for="url"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            URL</label>
                                        <input type="text" id="url" name="details[{{ $detail->id }}][url]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ $detail->url }}" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update</button>
                    </div>
                </form>
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
