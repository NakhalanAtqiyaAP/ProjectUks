@extends('layouts.template')

@section('content')
    <div class="mt-5 max-w-full mx-10">
        <div class="container mb-5">
            <h2 class="text-3xl font-semibold mb-2">Edit Data Rayon</h2>
            <p>Home / Data Rayon / Edit Data Rayon</p>
        </div>
        <div class="container px-2 py-8 bg-gray-700bg-slate-100 rounded-md shadow-md">
            <form action="{{ route('rayon.update', $rayon['id']) }}" method="POST">
                @csrf
                @method('PATCH')

                @if ($errors->all())
                    <ul class="bg-red-500 rounded-md max-w-sm py-2 mx-2  bg-opacity-60">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="mb-5">
                    <label for="rayon" class="block mb-2 font-semibold">Rayon</label>
                    <input value="{{ $rayon->rayon }}" type="text" name="rayon" id="rayon"
                        placeholder="Masukan Rayon" class="w-full rounded-md">
                </div>
                <div class="mb-5">
                    <label for="user_id" class="block mb-2 font-semibold">Pembimbing Siswa</label>
                    <select name="user_id" id="user_id" class="w-full rounded-md">
                        <option selected hidden value="{{ $rayon->user->id }}">{{ $rayon->user->name }}</option>
                            @if ($rayon->user->role === 'ps')
                                <option value="{{ $rayon->user->id }}">{{ $rayon->user->name }}</option>
                            @endif
                    </select>
                </div>
                <button type="submit"
                    class="py-2 px-10 bg-blue-500 hover:bg-blue-600 transition duration-300 rounded-md text-white font-medium">Tambah</button>
            </form>
        </div>
    </div>
@endsection
