@extends('layouts.template')

@section('content')
    <div class="mt-5 max-w-full mx-10">
        <div class="container mb-5">
            <div class="hedaer">
                <h2 class="text-3xl font-semibold mb-2">Data Rombel</h2>
                <p>Admin / Data Rombel</p>
            </div>
            @if (Session::get('success'))
                <div class=" bg-green-300 bg-opacity-50 px-2 py-4 rounded-md flex justify-center items-center">{{ Session::get('success') }}</div>
            @endif
        </div>

        <div class="handle">
            <a href="{{route('rombel.create')}}" class="py-2 px-4 bg-yellow-500 hover:bg-yellow-600 transition duration-300 rounded-md text-white font-medium mb-5">Tambah Data Rombel</a>
        </div>
        <div class="relative top-6 overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center rtl:text-right  text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rombel
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                @php $no = 1 @endphp
                @foreach ($rombel as $item)
                    <tbody>
                        <tr>
                            <td class="px-6 py-4">
                                {{ $no++ }}
                            </td>
                            <td class="px-6 py-4">
                                {{$item['rombel']}}
                            </td>
                            <td class="flex gap-2 justify-center items-center">
                                <a href="{{ route('rombel.edit', $item['id']) }} " class="py-2 px-4 bg-green-500 hover:bg-green-600 transition duration-300 rounded-md text-white font-medium">Edit</a>
                                <form method="POST" action="{{ route('rombel.delete', $item->id) }}" onsubmit="return confirm('Are You Sure Want To Delete This?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-2 px-4 bg-red-500 hover:bg-red-600 transition duration-300 rounded-md text-white font-medium">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach

            </table>
        </div>

    </div>
@endsection
