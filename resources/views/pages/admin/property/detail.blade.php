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
            <div class="w-full  flex items-center justify-between">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Property Features
                </h3>
                <div class="flex gap-2 items-center">
                    <button class="px-4 py-2 text-sm rounded-xl bg-sky-700 hover:bg-sky-800 text-white "
                        data-modal-target="add-feature-modal" data-modal-toggle="add-feature-modal">Add Feature</button>
                    <div id="add-feature-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Add Feature
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="add-feature-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="w-full" method="POST" action="{{ route('admin.property-feature.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-4 md:p-5 space-y-4">
                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        <div class="mb-5">
                                            <label for="feature"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Feature</label>
                                            <input type="text" id="feature" name="feature"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        </div>
                                        <div class="mb-5" x-data="iconPreview()" x-init="init()">
                                            <label for="icon"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>

                                            <div class="flex items-center justify-center w-full relative">

                                                <template x-if="previewUrl">
                                                    <button type="button" @click="removeImage"
                                                        class="p-1 text-sm rounded-full bg-red-500 hover:bg-red-600 text-white absolute top-2 right-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M18 6L6 18M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </template>
                                                <label for="dropzone-file"
                                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 p-4">

                                                    <template x-if="previewUrl">
                                                        <img :src="previewUrl" alt="Preview"
                                                            class="object-contain h-full w-full rounded-lg" />
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

                                                    <input id="dropzone-file" type="file" class="hidden" name="icon"
                                                        @change="previewImage" />
                                                </label>
                                            </div>
                                        </div>

                                        <div class="">
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <textarea id="description" rows="4" name="description"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Write property description here...">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Add</button>
                                        <button data-modal-hide="add-feature-modal" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full">
            <table id="search-table">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                Feature
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Icon
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Description
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Action
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($features as $feature)
                        <tr>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $feature->feature }}
                            </td>
                            <td>
                                <div class="w-16 h-16 rounded-xl relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $feature->icon) }}"
                                        alt="img-{{ $feature->feature }}"
                                        class="w-full h-full object-cover object-center">
                                </div>
                            </td>
                            <td>{{ $feature->description }}</td>
                            <td class="w-px whitespace-nowrap">
                                <div class="flex items-center gap-2">

                                    <button data-modal-target="view-feature-modal-{{ $feature->id }}"
                                        data-modal-toggle="view-feature-modal-{{ $feature->id }}"
                                        class="p-3 text-sm rounded-full bg-sky-500 hover:bg-sky-600 text-white">
                                        <i data-feather="eye" class="size-3"></i>
                                    </button>

                                    <button data-modal-target="update-feature-modal-{{ $feature->id }}"
                                        data-modal-toggle="update-feature-modal-{{ $feature->id }}"
                                        class="p-3 text-sm rounded-full bg-yellow-500 hover:bg-yellow-600 text-white">
                                        <i data-feather="edit-2" class="size-3"></i>
                                    </button>

                                    <button data-modal-target="delete-feature-modal-{{ $feature->id }}"
                                        data-modal-toggle="delete-feature-modal-{{ $feature->id }}"
                                        class="p-3 text-sm rounded-full bg-red-500 hover:bg-red-600 text-white">
                                        <i data-feather="trash-2" class="size-3"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        {{-- view-modal --}}
                        <div id="view-feature-modal-{{ $feature->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Feature Data
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="view-feature-modal-{{ $feature->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="w-full">
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div class="mb-5">
                                                <label for="feature"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Feature</label>
                                                <input type="text" id="feature" name="feature" readonly
                                                    value="{{ $feature->feature }}"
                                                    class="bg-gray-50 border border-gray-300 read-only:bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                            </div>
                                            <div class="mb-5">
                                                <label for="icon"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>

                                                <div class="flex items-center justify-center w-full relative">
                                                    <div
                                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg bg-gray-100 dark:bg-gray-700 p-4">
                                                        @if ($feature->icon)
                                                            <img src="{{ asset('storage/' . $feature->icon) }}"
                                                                alt="Icon Preview"
                                                                class="object-contain h-full w-full rounded-lg" />
                                                        @else
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
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
                                                                    <span class="font-semibold">No icon available</span>
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="">
                                                <label for="description"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                <textarea id="description" rows="4" name="description" readonly
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 read-only:bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Write property description here...">{{ $feature->description }}</textarea>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="view-feature-modal-{{ $feature->id }}"
                                                type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- update-modal --}}
                        <div id="update-feature-modal-{{ $feature->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Update Feature
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="update-feature-modal-{{ $feature->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form class="w-full" action="{{ route('admin.property-feature.update') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="p-4 md:p-5 space-y-4">
                                            <input type="hidden" value="{{ $feature->id }}" name="id">
                                            <div class="mb-5">
                                                <label for="feature"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Feature</label>
                                                <input type="text" id="feature" name="feature"
                                                    value="{{ $feature->feature }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                            </div>
                                            <div class="mb-5" x-data="iconPreview('{{ old('icon') ?? ($feature->icon ?? '') }}', 'dropzone-file-edit')" x-init="init()">
                                                <label for="icon"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>

                                                <div class="flex items-center justify-center w-full relative">
                                                    <template x-if="previewUrl">
                                                        <button type="button" @click="removeImage"
                                                            class="p-1 text-sm rounded-full bg-red-500 hover:bg-red-600 text-white absolute top-2 right-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M18 6L6 18M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </template>

                                                    <label for="dropzone-file-edit"
                                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 p-4">

                                                        <template x-if="previewUrl">
                                                            <img :src="previewUrl" alt="Preview"
                                                                class="object-contain h-full w-full rounded-lg" />
                                                        </template>

                                                        <template x-if="!previewUrl">
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 16">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4
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

                                                        <input id="dropzone-file-edit" type="file" class="hidden"
                                                            name="icon" @change="previewImage" />
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="">
                                                <label for="description"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                <textarea id="description" rows="4" name="description"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 read-only:bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Write property description here...">{{ $feature->description }}</textarea>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Update</button>
                                            <button data-modal-hide="update-feature-modal-{{ $feature->id }}"
                                                type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- delete modal --}}
                        <div id="delete-feature-modal-{{ $feature->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Delete Feature
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="delete-feature-modal-{{ $feature->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form class="w-full"
                                        action="{{ route('admin.property-feature.destroy', $feature->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div class="w-full">
                                                <input type="hidden" name="id" value="{{ $feature->id }}">
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    Are you sure want to delete <span
                                                        class="font-bold">{{ $feature->feature }}</span>
                                                    feature?
                                                    This action
                                                    cannot be undone.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button type="submit"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Delete</button>
                                            <button data-modal-hide="delete-feature-modal-{{ $feature->id }}"}}"
                                                type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function iconPreview(initialUrl = null, inputId = 'dropzone-file') {
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
