<!DOCTYPE html>
<html lang="en">
<x-head>Kelola Model</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-header></x-header>
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <p class="font-bold text-2xl text-center mb-4">Kelola iPhone</p>
        <div class="gap-4">
        <div class="flex mb-4 justify-center">
                <button class="bg-red-500 hover:bg-red-600 py-2 px-4 text-white rounded-md" id="hapus_terpilih">Hapus Terpilih</button>
        </div>
            <table class="bg-white w-full mb-4 mx-auto min-w-max table-auto text-left">
                <thead>
                    <tr>
                        <th class="border-y border-blue-gray-50 p-4">
                            <input type="checkbox" id="pilih_semua" class="ml-2 w-6 h-6">
                        </th>
                        <x-table-header>Nama iPhone</x-table-header>
                        {{-- <x-table-header>Stok Cadangan</x-table-header> --}}
                        <x-table-header>Total Stok Unit</x-table-header>
                        {{-- <x-table-header>Tampilkan</x-table-header> --}}
                        <x-table-header>Kontrol</x-table-header>
                    </tr>
                </thead>
                <tbody>
                    @if($iphones->isNotEmpty())
                    @foreach ($iphones as $iphone)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <input type="checkbox" class="checkbox_pilih ml-2 w-6 h-6" name="ids[]" value="{{ $iphone->id }}">
                            </td>
                            <x-table-contents>{{ $iphone->name }}</x-table-contents>
                            {{-- <x-table-contents>{{ $iphone->stok_spare }}</x-table-contents> --}}
                            <x-table-contents>{{ $iphone->stok_ready }}</x-table-contents>
                            {{-- <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex p-1">
                                    <input type="checkbox" class="ml-2 w-6 h-6" disabled name="visible" {{ $iphone->show == 1 ? 'checked':'' }}>
                                </div>
                            </td> --}}
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center gap-3">
                                    <div class="flex justify-end">
                                        <form action="{{ route('manageModelEdit', $iphone->id) }}" method="GET">
                                        <button type="submit" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        </form>
                                        <form action="{{ route('manageModelDelete', $iphone->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="mx-1 border hover:bg-blue-500 hover:text-white text-blue-500  border-blue-500 p-1 rounded-md">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                    {{-- <tr>
                        <x-table-contents></x-table-contents>
                        <form action="{{ route('manageModelAdd') }}" method="POST">
                            @csrf
                            <td class="p-4 border-b border-blue-gray-50"></td>
                            <td class="p-4 border-b border-blue-gray-50"></td>
                            <td class="p-4 border-b border-blue-gray-50"></td>
                            <td class="p-4 border-b border-blue-gray-50"></td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex justify-end">
                                    <button type="submit" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md underline">
                                        <svg class="h-8 w-full" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </form>
                    </tr> --}}
              </tbody>
            </table>
            @if(session('exist'))
            <div class="flex justify-center mb-4">
                <p class="text-center text-red-500">{{ session('exist') }}</p>
            </div>
            @endif
            <div class="flex">
                <button type="button" onclick="open_popup_add()" class="mx-auto hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md underline">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div id="popup-add" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md z-20">
            <h2 class="text-2xl font-bold mb-4">Tambah Model Baru</h2>
            <form action="{{ route('manageModelAdd', $id) }}" method="POST">
            @csrf
                <div class="mb-4 flex gap-2 items-center">
                    <label for="id" class="block text-sm font-medium w-8 text-gray-700">ID : </label>
                    <input type="text" name="id" value="{{ $id }}" disabled class="bg-white mt-1 block w-ful">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Model iPhone</label>
                    <input type="text" name="name" class="mt-1 p-2 block w-full rounded-md border shadow-sm" required>
                </div>
                <div class="flex justify-evenly space-x-4">
                    <button type="button" onclick="close_popup_add()" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function open_popup_add() {
        document.getElementById('popup-add').classList.remove('hidden');
    }
    function close_popup_add() {
        document.getElementById('popup-add').classList.add('hidden');
    }
    
    document.getElementById('pilih_semua').addEventListener('change', function () {
            let checkbox_pilih = document.querySelectorAll('.checkbox_pilih');
            checkbox_pilih.forEach(function (checkbox) {
                checkbox.checked = this.checked;
            }, this);
        });

        document.getElementById('hapus_terpilih').addEventListener('click', function() {
        const selectedIds = Array.from(document.querySelectorAll('.checkbox_pilih:checked')).map(checkbox => checkbox.value);

        if (selectedIds.length === 0) {
            alert('Tidak ada data terpilih');
            return;
        }

        if (confirm('hapus data terpilih?')) {
            $.ajax({
                url: '{{ route('manageModelDeleteSelected') }}',
                type: 'DELETE',
                data: {
                    ids: selectedIds,
                    _token: '{{ csrf_token() }}',
                },
                success: function() {
                    location.reload();
                }
            });
        }

        setTimeout(function(){
            location.reload();
        }, 1000);
    });

    $('#pilih_semua').click(function(){
            $('')
    })
</script>
</body>
</html>