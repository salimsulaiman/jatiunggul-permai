@extends('components.layouts.app')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        @if (session('success'))
            <div class="sm:mx-auto sm:w-full sm:max-w-md mb-4">
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div
            class="w-full max-w-5xl mx-auto rounded-xl flex flex-col lg:flex-row overflow-hidden shadow-0 lg:shadow-2xl bg-white h-auto lg:h-[600px]">
            <!-- Left: Form -->
            <div class="w-full lg:w-1/2 py-10 px-4 sm:px-8 flex flex-col justify-between items-center gap-4 md:gap-0">
                <img src="{{ asset('assets/icons/logo-jatiunggul-dark.png') }}" alt="" class="h-8 md:h-10 w-auto mb-6">
                <div class="w-full flex flex-col gap-2 items-center">
                    <h1 class="font-semibold text-xl md:text-2xl text-slate-800">Welcome Back</h1>
                    <h4 class="text-xs md:text-sm text-slate-500 mb-3 text-center">Welcome Back. Please enter your details
                    </h4>
                    <form action="" class="w-full max-w-[280px] mx-auto space-y-3" method="POST"
                        action="{{ route('admin.login.check') }}">
                        @csrf
                        <!-- Email -->
                        <div class="flex w-full">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-md border-gray-300">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input type="email" name="email"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 outline-none ring-0"
                                placeholder="@gmail.com">
                        </div>
                        <!-- Password -->
                        <div class="flex w-full">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-md border-gray-300">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 2a4 4 0 0 0-4 4v3H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2h-1V6a4 4 0 0 0-4-4Zm2 7V6a2 2 0 1 0-4 0v3h4Zm-2 4a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input type="password" name="password"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 outline-none ring-0"
                                placeholder="********">
                        </div>
                        <!-- Button -->
                        <button
                            class="w-full py-2 px-4 text-center rounded-xl bg-sky-600 text-white hover:bg-sky-700 text-sm cursor-pointer">
                            Continue
                        </button>
                        @if ($errors->has('auth'))
                            <div class="w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                {{ $errors->first('auth') }}
                            </div>
                        @endif
                    </form>
                </div>
                <p class="text-center text-xs text-slate-500 mt-6">
                    Jati Unggul Permai – Hunian Nyaman, Investasi Masa Depan.<br>
                    &copy; 2025 Jati Unggul Permai. Seluruh hak cipta dilindungi.
                </p>
            </div>

            <!-- Right: Image -->
            <div class="w-full lg:w-1/2 h-60 sm:h-72 md:h-80 lg:h-full relative overflow-hidden hidden lg:block">
                <div class="absolute inset-0 bg-black/15 z-10"></div>
                <img src="{{ asset('assets/images/minima.jpg') }}" alt=""
                    class="w-full h-full object-cover object-center">
            </div>
        </div>

    </div>
@endsection
