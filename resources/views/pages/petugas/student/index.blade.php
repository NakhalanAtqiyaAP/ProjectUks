@extends('layouts.template')

@section('content')
    <div class="mt-5 max-w-full mx-10">
        <div class="container mb-5">
            <div class="hedaer">
                <h2 class="text-3xl font-semibold mb-2">Data Siswa</h2>
                <p>Admin / Data Siswa</p>
            </div>
        </div>
        @if (Session::get('success'))
            <div class=" bg-green-300 bg-opacity-50 px-2 py-4 rounded-md flex justify-center items-center">
                {{ Session::get('success') }}</div>
        @endif
        <div class="handle">
            <a href="{{ route('student.create') }}"
                class="py-2 px-4 bg-yellow-500 hover:bg-yellow-600 transition duration-300 rounded-md text-white font-medium mb-5">Tambah
                Data Siswa</a>
        </div>
        <div class="relative top-6 overflow-x-auto shadow-md sm:rounded-lg" id="table">
            <input type="text" id="search" onkeyup="tableSearch()" placeholder="Cari data..."
                title="Type in a name" class="rounded-md mb-5">
                <div id="not-found-message" class="bg-red-300 text-center w-full py-2 text-black font-semibold mt-2 hidden">
                    Data not found.
                </div>

            <table id="table" class="w-full text-sm text-center rtl:text-right  text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nis
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rombel
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rayon
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                @php $no = 1 @endphp
                @foreach ($students as $item)
                    <tbody>
                        <tr>
                            <td class="px-6 py-4">
                                {{ $no++ }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['nis'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['name'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->rombel['rombel'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->rayon['rayon'] }}
                            </td>
                            <td class="flex gap-2 justify-center items-center">
                                <a href="{{ route('student.edit', $item['id']) }} "
                                    class="py-2 px-4 bg-green-500 hover:bg-green-600 transition duration-300 rounded-md text-white font-medium">Edit</a>
                                <form method="POST" action="{{ route('student.delete', $item->id) }}"
                                    onsubmit="return confirm('Are You Sure Want To Delete This?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="py-2 px-4 bg-red-500 hover:bg-red-600 transition duration-300 rounded-md text-white font-medium">
                                        Delete
                                    </button>
                                </form>

                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach

            </table>
        </div>
    </div>
@endsection

<script>
    function tableSearch() {
        const input = document.getElementById('search');
        const filter = input.value.toUpperCase();
        const table = document.getElementById("table");
        const tr = table.getElementsByTagName("tr");

        for (let i = 0; i < tr.length; i++) {
            const tds = tr[i].getElementsByTagName("td");
            let found = false;

            for (let j = 1; j < tds.length - 1; j++) { // Skip the first and last column (No and Action)
                const td = tds[j];
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }

            tr[i].style.display = found ? "" : "none";
            const notFoundMessage = document.getElementById('not-found-message');
            if (!found) {
                notFoundMessage.classList.remove('hidden');
            } else {
                notFoundMessage.classList.add('hidden');
            }
        }
    }
</script>
