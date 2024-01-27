@extends('layouts.template')

@section('content')
    <div class="mt-5 max-w-full mx-10 ">
        <div class="container mb-5">
            <h2 class="text-3xl font-semibold mb-2">Dashboard, {{ Auth::user()->name }} </h2>
            <p>Home / Dashboard</p>
        </div>

        @if (Session::get('success'))
            <div class="py-2 px-4 bg-green-500 bg-opacity-60">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card grid grid-cols-3 gap-10">
            <div
                class="block max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-5 text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">Peserta Didik</h5>
                <div class="font-normal text-gray-700 dark:text-gray-400 flex items-center gap-2">
                    <span class="text-3xl bg-slate-200 rounded-full"><iconify-icon
                            icon="fa6-solid:street-view"></iconify-icon></span>
                    <p class="text-3xl font-semibold text-blue-700">{{ $students }}</p>
                </div>
            </div>
            <div
                class="block max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-5 text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">Administrator</h5>
                <div class="font-normal text-gray-700 dark:text-gray-400 flex items-center gap-2">
                    <span class="text-3xl bg-slate-200 rounded-full"><iconify-icon
                            icon="fa6-solid:street-view"></iconify-icon></span>
                    <p class="text-3xl font-semibold text-blue-700">
                        {{ $admin }}</p>
                </div>
            </div>
            <div
                class="block max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-5 text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">Pembimbing Siswa
                </h5>
                <div class="font-normal text-gray-700 dark:text-gray-400 flex items-center gap-2">
                    <span class="text-3xl bg-slate-200 rounded-full"><iconify-icon
                            icon="fa6-solid:street-view"></iconify-icon></span>
                    <p class="text-3xl font-semibold text-blue-700">
                        {{ $ps }}</p>
                </div>
            </div>

            <div
                class="block max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-5 text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">Rombel</h5>
                <div class="font-normal text-gray-700 dark:text-gray-400 flex items-center gap-2">
                    <span class="text-3xl rounded-full"><iconify-icon icon="fa6-solid:book-open"></iconify-icon></span>

                    <p class="text-3xl font-semibold text-blue-700">{{ $rombles }}</p>
                </div>
            </div>
            <div
                class="block max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-5 text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">Rayon</h5>
                <div class="font-normal text-gray-700 dark:text-gray-400 flex items-center gap-2">
                    <span class="text-3xl rounded-full"><iconify-icon icon="fa6-solid:book-open"></iconify-icon></span>
                    <p class="text-3xl font-semibold text-blue-700">{{ $rayons }}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
