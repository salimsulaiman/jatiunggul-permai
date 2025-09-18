<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jati Unggul | Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/icons/logo-square.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3/dist/style.css"> --}}
    @vite('resources/css/style.css')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
</head>

<body x-data="{ page: '{{ $page ?? '' }}', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false, 'isProfileInfoModal': false, 'isProfilePasswordModal': false, 'isProfilePictureModal': false, 'isDeleteProfilePictureModal': false, 'isProfilePictureModal': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">

    <x-admin.preload></x-admin.preload>
    <div class="flex h-screen overflow-hidden">
        <x-admin.sidebar></x-admin.sidebar>
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <x-admin.overlay></x-admin.overlay>
            <x-admin.header></x-admin.header>
            <main>
                <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6 w-full">
                    <div class="h-fit w-full">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
        @php
            $successMessage = session('success');
            $isAdd = str_contains($successMessage, 'added') || str_contains($successMessage, 'created');
            $isUpdate = str_contains($successMessage, 'updated');
            $isDelete = str_contains($successMessage, 'deleted') || str_contains($successMessage, 'removed');
        @endphp

        @if ($successMessage)
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition id="toast-interactive"
                class="w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-sm dark:bg-gray-800 dark:text-gray-400 absolute bottom-4 right-4"
                role="alert">
                <div class="flex">
                    {{-- Ikon berdasarkan tipe aksi --}}
                    <div
                        class="inline-flex items-center justify-center shrink-0 w-8 h-8 {{ $isAdd
                            ? 'text-green-500 bg-green-100 dark:text-green-300 dark:bg-green-900'
                            : ($isUpdate
                                ? 'text-yellow-500 bg-yellow-100 dark:text-yellow-300 dark:bg-yellow-900'
                                : ($isDelete
                                    ? 'text-red-500 bg-red-100 dark:text-red-300 dark:bg-red-900'
                                    : 'text-blue-500 bg-blue-100 dark:text-blue-300 dark:bg-blue-900')) }} rounded-lg">
                        @if ($isAdd)
                            {{-- Ikon tambah --}}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        @elseif ($isUpdate)
                            {{-- Ikon update --}}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5h2M4 20h16M14.5 6.5l3 3L7 20H4v-3L14.5 6.5z" />
                            </svg>
                        @elseif ($isDelete)
                            {{-- Ikon hapus --}}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 001-1V5a1 1 0 00-1-1h-2.586a1 1 0 01-.707-.293l-.707-.707A1 1 0 0012.586 3h-1.172a1 1 0 00-.707.293l-.707.707A1 1 0 009.586 4H7a1 1 0 00-1 1v1a1 1 0 001 1h10z" />
                            </svg>
                        @else
                            {{-- Ikon default --}}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 18 20" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                            </svg>
                        @endif
                    </div>

                    <div class="ms-3 text-sm font-normal">
                        <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Success</span>
                        <div class="mb-2 text-sm font-normal">{{ $successMessage }}</div>
                    </div>

                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white items-center justify-center shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-interactive" aria-label="Close">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof simpleDatatables.DataTable !== 'undefined') {
                document.querySelectorAll("table[id^='search-table']").forEach(function(table) {
                    const dataTable = new simpleDatatables.DataTable(table, {
                        searchable: true,
                        sortable: true
                    });

                    function refreshIconsAndUI() {
                        setTimeout(() => {
                            feather.replace();
                            initFlowbite();
                        }, 0);
                    }

                    dataTable.on("datatable.page", refreshIconsAndUI);
                    dataTable.on("datatable.sort", refreshIconsAndUI);
                    dataTable.on("datatable.search", refreshIconsAndUI);
                    dataTable.on("datatable.update", refreshIconsAndUI);

                    refreshIconsAndUI();
                });
            }
        });
    </script>


    <script>
        feather.replace();
    </script>
</body>

</html>
