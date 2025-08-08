@extends('components.layouts.admin.app')
@section('content')
    <div x-data="{ pageName: `Property` }">
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
        <div class="w-full flex items-center justify-between mb-4">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                Property Data
            </h3>
            <div class="flex gap-2 items-center">
                <button class="px-4 py-2 text-sm rounded-xl bg-sky-700 hover:bg-sky-800 text-white "
                    data-modal-target="add-property-modal" data-modal-toggle="add-property-modal">Add Property</button>
                <div id="add-property-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Add Property
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="add-property-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="w-full" method="POST" action="{{ route('admin.property.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="p-4 md:p-5 space-y-4">
                                    <div class="mb-5">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Name</label>
                                        <input type="text" id="name" name="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ old('name') }}" />
                                    </div>
                                    <div class="mb-5" x-data="imagePreview()" x-init="init()">
                                        <label for="image"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>

                                        <div class="flex items-center justify-center w-full relative">

                                            <template x-if="previewUrl">
                                                <button type="button" @click="removeImage"
                                                    class="p-1 text-sm rounded-full bg-red-500 hover:bg-red-600 text-white absolute top-2 right-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
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

                                                <input id="dropzone-file" type="file" class="hidden" name="image"
                                                    @change="previewImage" />
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <label for="location_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                                        <select id="location" name="location_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled>Choose a location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                                    {{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea id="description" rows="4" name="description"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write property description here...">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="mb-5">
                                        <label for="maps_url"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Maps URL</label>
                                        <input type="text" id="maps_url" name="maps_url"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ old('maps_url') }}" />
                                    </div>
                                    <div class="">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" name="is_published"
                                                value="1" {{ old('is_published') ? 'checked' : '' }}>
                                            <div
                                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                                            </div>
                                            <span
                                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Publish</span>
                                        </label>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Add</button>
                                    <button data-modal-hide="add-property-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                </div>
                            </form>
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
                                Name
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Image
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Location
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Status
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
                    @foreach ($properties as $property)
                        <tr>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $property->name }}
                            </td>
                            <td>
                                <div class="w-16 h-16 rounded-xl relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $property->image) }}"
                                        alt="img-{{ $property->name }}" class="w-full h-full object-cover object-center">
                                </div>
                            </td>
                            <td>{{ $property->location->name }}</td>
                            <td><span
                                    class="{{ $property->is_published ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' }} text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">{{ $property->is_published ? 'Published' : 'Unpublished' }}</span>
                            </td>
                            <td class="w-px whitespace-nowrap">
                                <div class="flex items-center gap-2">

                                    <a href="{{ route('admin.property.show', $property->slug) }}"
                                        class="p-3 text-sm rounded-full bg-sky-500 hover:bg-sky-600 text-white">
                                        <i data-feather="eye" class="size-3"></i>
                                    </a>

                                    <button data-modal-target="update-property-modal-{{ $property->id }}"
                                        data-modal-toggle="update-property-modal-{{ $property->id }}"
                                        class="p-3 text-sm rounded-full bg-yellow-500 hover:bg-yellow-600 text-white">
                                        <i data-feather="edit-2" class="size-3"></i>
                                    </button>

                                    <button data-modal-target="delete-property-modal-{{ $property->id }}"
                                        data-modal-toggle="delete-property-modal-{{ $property->id }}"
                                        class="p-3 text-sm rounded-full bg-red-500 hover:bg-red-600 text-white">
                                        <i data-feather="trash-2" class="size-3"></i>
                                    </button>
                                </div>
                            </td>
                        </tr> {{-- update-modal --}}
                        <div id="update-property-modal-{{ $property->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Update Property
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="update-property-modal-{{ $property->id }}">
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
                                    <form class="w-full" action="{{ route('admin.property.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="p-4 md:p-5 space-y-4">
                                            <input type="hidden" name="id" value="{{ $property->id }}">
                                            <div class="mb-5">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Name</label>
                                                <input type="text" id="name" name="name"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="{{ $property->name }}" />
                                            </div>
                                            <div class="mb-5" x-data="imagePreview('{{ old('image') ?? ($property->image ?? '') }}', 'dropzone-file-edit')" x-init="init()">
                                                <label for="image"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>

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

                                                        <input id="dropzone-file-edit" type="file" class="hidden"
                                                            name="image" @change="previewImage" />
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="mb-5">
                                                <label for="location_id"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                                                <select id="location" name="location_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected disabled>Choose a location</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}"
                                                            {{ $property->location->id == $location->id ? 'selected' : '' }}>
                                                            {{ $location->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-5">
                                                <label for="description"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                <textarea id="description" rows="4" name="description"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Write property description here...">{{ $property->description }}</textarea>
                                            </div>
                                            <div class="mb-5">
                                                <label for="maps_url"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Maps URL</label>
                                                <input type="text" id="maps_url" name="maps_url"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="{{ $property->maps_url }}" />
                                            </div>
                                            <div class="">
                                                <label class="inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer" name="is_published"
                                                        value="1" {{ $property->is_published ? 'checked' : '' }}>
                                                    <div
                                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                                                    </div>
                                                    <span
                                                        class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Publish</span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Update</button>
                                            <button data-modal-hide="update-property-modal-{{ $property->id }}"
                                                type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- delete modal --}}
                        <div id="delete-property-modal-{{ $property->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Delete Location
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="delete-property-modal-{{ $property->id }}"}}">
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
                                    <form class="w-full" action="{{ route('admin.property.destroy', $property->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div class="w-full">
                                                <input type="hidden" name="id" value="{{ $property->id }}">
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    Are you sure want to delete <span
                                                        class="font-bold">{{ $property->name }}</span>
                                                    location?
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
                                            <button data-modal-hide="delete-property-modal-{{ $property->id }}"}}"
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
