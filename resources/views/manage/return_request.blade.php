<!DOCTYPE html>
<html lang="en">
<x-head>Konfirmasi Pengembalian</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-header></x-header>
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <p class="font-bold text-2xl text-center mb-4">Konfirmasi Pengembalian</p>
        <div class="flex flex-wrap justify-center gap-4">
        {{-- <div class="flex justify-items-start">
                <button class="bg-red-500 hover:bg-red-600 py-2 px-4 text-white rounded-md" id="hapus_terpilih">Hapus Terpilih</button>
        </div> --}}
            <table class="bg-white w-full mx-auto min-w-max table-auto text-left">
                <thead>
                    <tr>
                        {{-- <th class="border-y border-blue-gray-50 p-4">
                            <input type="checkbox" id="pilih_semua" class="ml-2 w-6 h-6">
                        </th> --}}
                        <x-table-header>ID Transaksi</x-table-header>
                        <x-table-header>Nama Pengguna</x-table-header>
                        <x-table-header>Nama Unit</x-table-header>
                        <x-table-header>Nama Konfirmator</x-table-header>
                        <x-table-header>Tanggal</x-table-header>
                        <x-table-header>Status</x-table-header>
                    </tr>
                </thead>
                <tbody>
                    @if($return_requests->isNotEmpty())
                    @foreach ($return_requests as $return_request)
                        <tr>
                            {{-- <td class="p-4 border-b border-blue-gray-50">
                                <input type="checkbox" class="checkbox_pilih ml-2 w-6 h-6" name="ids[]" value="{{ $unit_id->unit_id }}">
                            </td> --}}
                            <x-table-contents>{{ $return_request->transaction_id }}</x-table-contents>
                            <x-table-contents>{{ $return_request->cust_name }}</x-table-contents>
                            <x-table-contents>{{ $return_request->iphone_name.' '.$return_request->color.' '.$return_request->storage }}</x-table-contents>
                            @if($return_request->admin_name)
                            <x-table-contents>{{ $return_request->admin_name }}</x-table-contents>
                            @else
                            <x-table-contents>-</x-table-contents>
                            @endif
                            <x-table-contents>{{ $return_request->created }}</x-table-contents>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center gap-3">
                                    <div class="flex justify-center">
                                        @if($return_request->approve == 0)
                                        <form action="{{ route('returnRequestAcc', $return_request->return_request_id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="mx-1 border hover:bg-blue-500 hover:text-white text-blue-500  border-blue-500 p-1 rounded-md">
                                                Konfirmasi
                                            </button>
                                        </form>
                                        @else
                                        <p class="text-green-500">Terkonfirmasi</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @endif
              </tbody>
            </table>
            
    </div>
<script>

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
                url: '{{ route('manageUnitDeleteSelected') }}',
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
