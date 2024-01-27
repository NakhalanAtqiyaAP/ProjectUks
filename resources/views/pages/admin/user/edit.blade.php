@extends('layouts.template')

@section('content')
    <div class="mt-5 max-w-full mx-10">
        <div class="container mb-5">
            <h2 class="text-3xl font-semibold mb-2">Edit Data User</h2>
            <p>Home / Data Rayon / Edit Data User</p>
        </div>
        <div class="container px-2 py-8 bg-gray-700 rounded-md shadow-md">
            <form action="{{ route('user.update', $user['id']) }}" method="POST">
                @csrf
                @method('PATCH')


                <div class="mb-5">
                    <label for="name" class="block mb-2 font-semibold">Nama</label>
                    <input value="{{ $user->name }}" type="text" name="name" id="name" placeholder="Update Nama"
                        class="w-full rounded-md">
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 font-semibold">Email</label>
                    <input value="{{ $user->email }}" type="email" name="email" id="email"
                        placeholder="Update Email" class="w-full rounded-md">
                </div>
                <div class="mb-5">
                    <label for="role" class="block mb-2 font-semibold">Role</label>
                    <select name="role" id="role" class="w-full rounded-md">
                        <option selected hidden disabled>Pilih</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="ps" {{ $user->role == 'ps' ? 'selected' : '' }}>Pembimbing Siswa</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 font-semibold">Email</label>
                    <input value="" type="password" name="password" id="email"
                        placeholder="Update Password" class="w-full rounded-md">
                </div>
                <button type="submit"
                    class="py-2 px-10 bg-blue-500 hover:bg-blue-600 transition duration-300 rounded-md text-white font-medium">Tambah</button>
            </form>
        </div>
    </div>
@endsection
