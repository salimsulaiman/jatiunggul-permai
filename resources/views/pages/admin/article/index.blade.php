@extends('components.layouts.admin.app')
@section('content')
    <div x-data="{ pageName: `Article` }">
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
                Article Data
            </h3>
            <div class="flex gap-2 items-center">
                <button class="px-4 py-2 text-sm rounded-xl bg-sky-700 hover:bg-sky-800 text-white "
                    data-modal-target="add-article-modal" data-modal-toggle="add-article-modal">Add Article</button>
                <div id="add-article-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-4xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Add Article
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="add-article-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form id="article-form" class="w-full" method="POST"
                                action="{{ route('admin.article.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="p-4 md:p-5 space-y-4">
                                    <div class="mb-5">
                                        <label for="title"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Title</label>
                                        <input type="text" id="title" name="title"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ old('title') }}" />
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
                                        <label for="summary"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Summary</label>
                                        <textarea id="summary" rows="4" name="summary"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write property summary here...">{{ old('summary') }}</textarea>
                                    </div>

                                    <div class="mb-5">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                                        <input type="hidden" name="content" class="content-input">
                                        <div class="content-editor rounded-b-lg overflow-hidden"></div>
                                    </div>

                                    <div class="mb-5">
                                        <label for="category_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                        <select id="location" name="category_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled>Choose a category</option>
                                            @foreach ($article_categories as $article_categorie)
                                                <option value="{{ $article_categorie->id }}"
                                                    {{ old('category_id') == $article_categorie->id ? 'selected' : '' }}>
                                                    {{ $article_categorie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="status"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                        <select id="location" name="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled>Choose a status</option>
                                            <option value="draft">Draft</option>
                                            <option value="publish">Publish</option>
                                            <option value="hidden">Hidden</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Add</button>
                                    <button data-modal-hide="add-article-modal" type="button"
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
                                Title
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Image
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Summary
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
                    @foreach ($articles as $article)
                        <tr>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $article->title }}
                            </td>
                            <td>
                                <div class="w-16 h-16 rounded-xl relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="img-{{ $article->name }}"
                                        class="w-full h-full object-cover object-center">
                                </div>
                            </td>
                            <td class="line-clamp-3 whitespace-nowrap">{{ $article->summary }}</td>
                            @php
                                $statusColors = [
                                    'publish' => 'bg-green-500 text-white',
                                    'draft' => 'bg-slate-500 text-white',
                                    'hidden' => 'bg-yellow-500 text-white',
                                ];
                            @endphp
                            <td>
                                <div
                                    class="{{ $statusColors[$article->status] ?? '' }} px-4 py-1 text-xs rounded-full w-fit">
                                    {{ ucfirst($article->status) }}
                                </div>
                            </td>
                            <td class="w-px whitespace-nowrap">
                                <div class="flex items-center gap-2">

                                    <button data-modal-target="view-article-modal-{{ $article->id }}"
                                        data-modal-toggle="view-article-modal-{{ $article->id }}"
                                        class="p-3 text-sm rounded-full bg-sky-500 hover:bg-sky-600 text-white">
                                        <i data-feather="eye" class="size-3"></i>
                                    </button>

                                    <button data-modal-target="update-article-modal-{{ $article->id }}"
                                        data-modal-toggle="update-article-modal-{{ $article->id }}"
                                        class="p-3 text-sm rounded-full bg-yellow-500 hover:bg-yellow-600 text-white">
                                        <i data-feather="edit-2" class="size-3"></i>
                                    </button>

                                    <button data-modal-target="delete-article-modal-{{ $article->id }}"
                                        data-modal-toggle="delete-article-modal-{{ $article->id }}"
                                        class="p-3 text-sm rounded-full bg-red-500 hover:bg-red-600 text-white">
                                        <i data-feather="trash-2" class="size-3"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        {{-- view-modal --}}
                        <div id="view-article-modal-{{ $article->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-4xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Article Data
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="view-article-modal-{{ $article->id }}">
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
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                                <input type="text" value="{{ $article->title }}"
                                                    class="bg-gray-50 border border-gray-300 read-only:bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    readonly />
                                            </div>
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                                <input type="text" value="{{ $article->slug }}"
                                                    class="bg-gray-50 border border-gray-300 read-only:bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    readonly />
                                            </div>

                                            {{-- Image --}}
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                                @if (!empty($article->image))
                                                    <img src="{{ asset('storage/' . $article->image) }}" alt="Image"
                                                        class="object-contain h-64 w-full rounded-lg border" />
                                                @else
                                                    <p class="text-gray-500 italic">No image uploaded</p>
                                                @endif
                                            </div>

                                            {{-- Summary --}}
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Summary</label>
                                                <textarea rows="4"
                                                    class="bg-gray-50 border border-gray-300 read-only:bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    readonly>{{ $article->summary }}</textarea>
                                            </div>

                                            {{-- Content --}}
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                                                <div
                                                    class="bg-gray-50 border border-gray-300 read-only:bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    {!! $article->content !!}
                                                </div>
                                            </div>

                                            {{-- Category --}}
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                <input type="text" value="{{ $article->category->name ?? '-' }}"
                                                    class="bg-gray-50 border border-gray-300 read-only:bg-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    readonly />
                                            </div>

                                            {{-- Status --}}
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                @php
                                                    $statusColors = [
                                                        'publish' => 'bg-green-100 text-green-800',
                                                        'draft' => 'bg-sky-100 text-sky-800',
                                                        'hidden' => 'bg-yellow-100 text-yellow-800',
                                                    ];
                                                    $status = strtolower($article->status);
                                                @endphp
                                                <span
                                                    class="px-3 py-1 rounded-full text-sm font-medium {{ $statusColors[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                                    {{ ucfirst($article->status) }}
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="view-article-modal-{{ $article->id }}"
                                                type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- update-modal --}}
                        <div id="update-article-modal-{{ $article->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-4xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Update Article
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="update-article-modal-{{ $article->id }}">
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
                                    <form id="article-form" class="w-full" action="{{ route('admin.article.update') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="p-4 md:p-5 space-y-4">
                                            <input type="hidden" name="id" value="{{ $article->id }}">
                                            <div class="mb-5">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                                <input type="text" name="title"
                                                    value="{{ old('title', $article->title) }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required />
                                            </div>
                                            <div class="mb-5" x-data="imagePreview('{{ old('image') ?? ($article->image ?? '') }}', 'dropzone-file-edit')" x-init="init()">
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
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Summary</label>
                                                <textarea name="summary" rows="4"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('summary', $article->summary) }}</textarea>
                                            </div>
                                            <div class="mb-5">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                                                <input type="hidden" name="content" class="content-input"
                                                    value="{{ $article->content }}" />
                                                <div class="content-editor rounded-b-lg overflow-hidden dark:text-white">
                                                    {!! $article->content !!}</div>
                                            </div>
                                            <div class="mb-5">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                <select name="category_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @foreach ($article_categories as $cat)
                                                        <option value="{{ $cat->id }}" @selected($article->category_id == $cat->id)>
                                                            {{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                <select name="status"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="publish" @selected($article->status == 'publish')>Publish</option>
                                                    <option value="draft" @selected($article->status == 'draft')>Draft</option>
                                                    <option value="hidden" @selected($article->status == 'hidden')>Hidden</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Update</button>
                                            <button data-modal-hide="update-article-modal-{{ $article->id }}"
                                                type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- delete modal --}}
                        <div id="delete-article-modal-{{ $article->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Delete Article
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="delete-article-modal-{{ $article->id }}"}}">
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
                                    <form class="w-full" action="{{ route('admin.article.destroy', $article->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div class="w-full">
                                                <input type="hidden" name="id" value="{{ $article->id }}">
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    Are you sure want to delete <span
                                                        class="font-bold">{{ $article->title }}</span>

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
                                            <button data-modal-hide="delete-article-modal-{{ $article->id }}"}}"
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Object untuk menyimpan instance Quill
            const quillInstances = new Map();

            // Fungsi untuk menginisialisasi Quill editor
            function initializeQuillEditor(container, modalId) {
                const editorEl = container.querySelector('.content-editor');
                const inputEl = container.querySelector('.content-input');

                if (!editorEl || !inputEl) {
                    console.warn(`Container ${modalId}: Tidak ditemukan .content-editor atau .content-input`);
                    return null;
                }

                // Cek apakah Quill sudah diinisialisasi
                if (quillInstances.has(modalId)) {
                    console.log(`Quill untuk ${modalId} sudah ada`);
                    return quillInstances.get(modalId);
                }

                // Berikan ID unik untuk editor jika belum ada
                if (!editorEl.id) {
                    editorEl.id = `quill-editor-${modalId}`;
                }

                try {
                    // Inisialisasi Quill
                    const quill = new Quill(editorEl, {
                        modules: {
                            toolbar: [
                                [{
                                    header: [1, 2, false]
                                }],
                                ['bold', 'italic', 'underline'],
                                ['image'],
                                [{
                                    list: 'ordered'
                                }, {
                                    list: 'bullet'
                                }],
                            ],
                        },
                        placeholder: 'Type some content',
                        theme: 'snow',
                    });

                    quill.getModule('toolbar').addHandler('image', function() {
                        let fileInput = document.createElement('input');
                        fileInput.setAttribute('type', 'file');
                        fileInput.setAttribute('accept', 'image/*');
                        fileInput.click();

                        fileInput.onchange = () => {
                            let file = fileInput.files[0];
                            if (file) {
                                let formData = new FormData();
                                formData.append('image', file);
                                formData.append('_token',
                                    '{{ csrf_token() }}'); // pastikan csrf_token dimasukkan

                                fetch('{{ route('quill.upload') }}', {
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(result => {
                                        let range = quill.getSelection();
                                        quill.insertEmbed(range.index, 'image', result.url);
                                    })
                                    .catch(err => console.error(err));
                            }
                        };
                    });



                    // Simpan instance
                    quillInstances.set(modalId, quill);

                    // Event listener untuk form submit
                    const form = container.querySelector('form') || container.closest('form');
                    if (form) {
                        // Remove existing listener jika ada untuk mencegah duplikasi
                        const existingHandler = form._quillSubmitHandler;
                        if (existingHandler) {
                            form.removeEventListener('submit', existingHandler);
                        }

                        // Create new handler
                        function handleFormSubmit(e) {
                            inputEl.value = quill.root.innerHTML;
                            console.log(`Form ${modalId} disubmit dengan konten:`, inputEl.value);
                        }

                        // Store reference untuk cleanup nanti
                        form._quillSubmitHandler = handleFormSubmit;
                        form.addEventListener('submit', handleFormSubmit);
                    }

                    console.log(`Quill editor untuk ${modalId} berhasil diinisialisasi`);
                    return quill;

                } catch (error) {
                    console.error(`Error menginisialisasi Quill untuk ${modalId}:`, error);
                    return null;
                }
            }

            // Fungsi untuk handle ketika modal terbuka
            function handleModalOpen(modalElement) {
                const modalId = modalElement.id;

                if (!modalId) return;

                // Delay untuk memastikan modal sudah ter-render
                setTimeout(() => {
                    initializeQuillEditor(modalElement, modalId);
                }, 100);
            }

            // Event delegation untuk tombol yang membuka modal
            document.addEventListener('click', function(e) {
                const button = e.target.closest('[data-modal-toggle], [data-modal-target]');
                if (!button) return;

                const modalTarget = button.getAttribute('data-modal-target') || button.getAttribute(
                    'data-modal-toggle');

                if (modalTarget) {
                    const modalElement = document.getElementById(modalTarget);

                    if (modalElement && (modalTarget === 'add-article-modal' || modalTarget.includes(
                            'update-article-modal'))) {
                        // Delay untuk memastikan modal terbuka
                        setTimeout(() => {
                            handleModalOpen(modalElement);
                        }, 200);
                    }
                }
            });

            // MutationObserver untuk mendeteksi ketika modal menjadi visible
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        const target = mutation.target;

                        // Cek jika modal menjadi visible (class 'hidden' dihilangkan)
                        if (target.id &&
                            (target.id === 'add-article-modal' || target.id.includes(
                                'update-article-modal')) &&
                            !target.classList.contains('hidden')) {

                            setTimeout(() => {
                                handleModalOpen(target);
                            }, 100);
                        }
                    }
                });
            });

            // Observe modal add
            const addModal = document.getElementById('add-article-modal');
            if (addModal) {
                observer.observe(addModal, {
                    attributes: true,
                    attributeFilter: ['class']
                });
            }

            // Observe semua modal update
            document.querySelectorAll('[id^="update-article-modal-"]').forEach(modal => {
                observer.observe(modal, {
                    attributes: true,
                    attributeFilter: ['class']
                });
            });

            // Inisialisasi langsung untuk modal yang mungkin sudah visible
            setTimeout(() => {
                // Cek add modal
                if (addModal && !addModal.classList.contains('hidden')) {
                    handleModalOpen(addModal);
                }

                // Cek update modals
                document.querySelectorAll('[id^="update-article-modal-"]:not(.hidden)').forEach(modal => {
                    handleModalOpen(modal);
                });
            }, 500);

            // Fungsi untuk membersihkan instance saat modal ditutup (opsional)
            document.addEventListener('click', function(e) {
                const button = e.target.closest('[data-modal-hide]');
                if (!button) return;

                const modalTarget = button.getAttribute('data-modal-hide');

                if (modalTarget && (modalTarget === 'add-article-modal' || modalTarget.includes(
                        'update-article-modal'))) {
                    console.log(`Modal ${modalTarget} ditutup`);

                    // Optional: Reset content untuk add modal
                    if (modalTarget === 'add-article-modal') {
                        const quillInstance = quillInstances.get(modalTarget);
                        if (quillInstance) {
                            // Reset content saat modal ditutup
                            setTimeout(() => {
                                quillInstance.setText('');
                            }, 300);
                        }
                    }
                }
            });

            // Utility functions untuk debugging dan akses eksternal
            window.getQuillInstances = function() {
                return quillInstances;
            };

            window.getQuillInstance = function(modalId) {
                return quillInstances.get(modalId);
            };

            window.reinitializeQuill = function(modalId) {
                const modalElement = document.getElementById(modalId);
                if (modalElement) {
                    quillInstances.delete(modalId);
                    return initializeQuillEditor(modalElement, modalId);
                }
                return null;
            };

            // Force initialization untuk debugging
            window.forceInitAllQuill = function() {
                const modals = document.querySelectorAll('#add-article-modal, [id^="update-article-modal-"]');
                modals.forEach(modal => {
                    if (!modal.classList.contains('hidden')) {
                        handleModalOpen(modal);
                    }
                });
            };

            console.log('Universal Modal Quill script loaded');
        });
    </script>
@endsection
