@extends('layouts.template')

@section('content')
        <form class="max-w-md mx-auto mt-52" action="{{ route('login.auth') }}" method="POST">
            @csrf
            @method('POST')
            @if (Session::get('failed'))
                <div class="px-2 py-4 bg-red-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('failed') }} </div>
            @endif
            @if (Session::get('logout'))
                <div class="px-2 py-4 bg-indigo-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('logout') }} </div>
            @endif
            @if (Session::get('canAccess'))
                <div class="px-2 py-4 bg-yellow-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('canAccess') }} </div>
            @endif
            @if (Session::get('AlreadyAccess'))
                <div class="px-2 py-4 bg-yellow-300 bg-opacity-60 mb-10 rounded-md">{{ Session::get('AlreadyAccess') }} </div>
            @endif
            <section class="bg-gray-50 dark:bg-gray-900">
                    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                Login Untuk Masuk Halaman
                            </h1>
                            <form class="space-y-4 md:space-y-6" action="#">
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com" required="">
                                    @error('email')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                                </div>
                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                    @error('password')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-start">

                                    </div>
                                <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-cyan-700 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ">Login</button>
                               
                            </form>
                        </div>
                    </div>
                </div>
              </section>
      
@endsection
