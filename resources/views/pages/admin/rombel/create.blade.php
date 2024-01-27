@extends('layouts.template')

@section('content')
    <div class="mt-5 max-w-full mx-10">
        <div class="container mb-5">
            <h2 class="text-3xl font-semibold mb-2">Tambah Data User</h2>
            <p>Home / Data Rayon / Tambah Data User</p>
        </div>
        <div class="container px-2 py-8 bg-gray-700 rounded-md shadow-md">
            <form action="{{ route('rombel.store') }}" method="POST">
                @csrf
                
                @if ($errors->all())
                    <ul class="bg-red-500 rounded-md max-w-sm py-2 mx-2  bg-opacity-60">
                        @foreach ($errors->all() as $error)
                            <li >{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                
                <div class="mb-5">
                    <label for="rombel" class="block mb-2 font-semibold">Rombel</label>
                    <input type="text" name="rombel" id="rombel" placeholder="Masukan Rombel" class="w-full rounded-md">
                </div>

                <button type="submit"
                    class="py-2 px-10 bg-blue-500 hover:bg-blue-600 transition duration-300 rounded-md text-white font-medium">Tambah</button>
            </form>
        </div>
    </div>
@endsection
