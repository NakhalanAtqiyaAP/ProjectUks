@extends('layouts.template')

@section('content')
    <div class="mt-5 max-w-full mx-10">
        <div class="container mb-5">
            <h2 class="text-3xl font-semibold mb-2">Tambah Data Siswa</h2>
            <p>Home / Data Siswa / Tambah Data Siswa</p>
        </div>
        <div class="container px-2 py-8 bg-gray-700 rounded-md shadow-md">
            <form action="{{ route('student.store') }}" method="POST">
                @csrf

                @if ($errors->all())
                    <ul class="bg-red-500 rounded-md max-w-sm py-2 mx-2  bg-opacity-60">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="mb-5">
                    <label for="nis" class="block mb-2 font-semibold">Nis</label>
                    <input type="number" name="nis" id="nis" placeholder="Masukan Nis" class="w-full rounded-md">
                </div>
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-semibold">Name</label>
                    <input type="text" name="name" id="name" placeholder="Masulkan Name"
                        class="w-full rounded-md">
                </div>
                <div class="mb-5">
                    <label for="rombel_id" class="block mb-2 font-semibold">Rombel</label>
                    <select name="rombel_id" id="rombel_id" class="w-full rounded-md">
                        <option selected disabled hidden>Pilih Rombel</option>
                        @foreach ($rombel as $item)
                            <option value="{{$item->id}}" class="">{{$item->rombel}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <label for="rayon_id" class="block mb-2 font-semibold">Rayon</label>
                    <select name="rayon_id" id="rayon_id" class="w-full rounded-md">
                        <option selected disabled hidden>Pilih Rayon</option>
                        @foreach ($rayon as $item)
                            <option value="{{$item->id}}" class="">{{$item->rayon}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    class="py-2 px-10 bg-blue-500 hover:bg-blue-600 transition duration-300 rounded-md text-white font-medium">Tambah</button>
            </form>
        </div>
    </div>
@endsection
