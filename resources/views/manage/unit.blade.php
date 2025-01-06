<!DOCTYPE html>
<html lang="en">
<x-head>Ubah Unit</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-header></x-header>
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <p class="font-bold text-2xl text-center mb-4">Kelola Unit</p>
        {{-- <div class="flex justify-items-start">
                <button class="bg-red-500 hover:bg-red-600 py-2 px-4 text-white rounded-md" id="hapus_terpilih">Hapus Terpilih</button>
        </div> --}}
        <div class="overflow-x-scroll">
            <table class="bg-white w-full mx-auto min-w-max table-auto text-left">
                <thead>
                    <tr>
                        {{-- <th class="border-y border-blue-gray-50 p-4">
                            <input type="checkbox" id="pilih_semua" class="ml-2 w-6 h-6">
                        </th> --}}
                        <x-table-header>ID Unit</x-table-header>
                        <x-table-header>Nama iPhone</x-table-header>
                        <x-table-header>Harga Sewa</x-table-header>
                        <x-table-header>Battery Health</x-table-header>
                        <x-table-header>Warna</x-table-header>
                        <x-table-header>Penyimpanan</x-table-header>
                        <x-table-header>Stok</x-table-header>
                        <x-table-header>Status</x-table-header>
                        <x-table-header>Kontrol</x-table-header>
                    </tr>
                </thead>
                <tbody>
                    @if($unit_ids->isNotEmpty())
                    @foreach ($unit_ids as $unit_id)
                        <tr>
                            {{-- <td class="p-4 border-b border-blue-gray-50">
                                <input type="checkbox" class="checkbox_pilih ml-2 w-6 h-6" name="ids[]" value="{{ $unit_id->unit_id }}">
                            </td> --}}
                            <x-table-contents>{{ $unit_id->unit_id }}</x-table-contents>
                            <x-table-contents>{{ $unit_id->iphone_name }}</x-table-contents>
                            <x-table-contents>{{ $unit_id->rent_price }}</x-table-contents>
                            <x-table-contents>{{ $unit_id->battery_health }}</x-table-contents>
                            <x-table-contents>{{ $unit_id->color_name }}</x-table-contents>
                            <x-table-contents>{{ $unit_id->storage_capacity }}</x-table-contents>
                            <x-table-contents>{{ $unit_id->stok }}</x-table-contents>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center p-1">
                                    <p class="font-b">{{ $unit_id->show == 1 ? 'Tertampil':'Disembunyikan'}}</p>
                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center gap-3">
                                    <div class="flex justify-end">
                                        <form action="{{ route('manageUnitEdit', $unit_id->unit_id) }}" method="GET">
                                        <button type="submit" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        </form>
                                        <form action="{{ route('manageUnitDelete', $unit_id->unit_id) }}" method="POST">
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
                        <x-table-contents>
                            @if($unit_ids)
                            {{ $id }}
                            @else
                            1
                            @endif
                        </x-table-contents>
                        <form action="{{ route('manageUnitAdd') }}" method="POST">
                            @csrf
                            <td class="p-4 border-b border-blue-gray-50">
                                <select name="iphone_id" class="p-2 border rounded-md" required>
                                    @if($iphones->isNotEmpty())
                                    @foreach ($iphones as $iphone)
                                    <option value="{{ $iphone->id }}">{{ $iphone->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <input class="p-2 border rounded-md w-24" required type="number" name="rent_price">
                            </td>
                            <td class="p-4 border-b flex items-center gap-2 border-blue-gray-50">
                                <input class="p-2 border rounded-md w-16" required type="number" name="battery_health">
                                <p>%</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <select name="color_id" class="p-2 border rounded-md" required>
                                    @if($unit_colors->isNotEmpty())
                                    @foreach ($unit_colors as $unit_color)
                                    <option value="{{ $unit_color->id }}">{{ $unit_color->color }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <select name="storage_id" class="p-2 border rounded-md" required>
                                    @if($unit_storages->isNotEmpty())
                                    @foreach ($unit_storages as $unit_storage)
                                    <option value="{{ $unit_storage->id }}">{{ $unit_storage->capacity }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">

                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex justify-end">
                                    <button type="submit" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md underline">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </form>
                    </tr> --}}
              </tbody>
            </table>
        </div>
            <div class="flex justify-center">
                <button type="button" onclick="open_popup_add()" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md underline">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            </div>
    </div>
    <div id="popup-add" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md z-20">
            <h2 class="text-2xl font-bold mb-4">Tambah Unit Baru</h2>
            <form action="{{ route('manageUnitAdd', $id) }}" method="POST">
            @csrf
                <div class="mb-4">
                    <label for="iphone_id" class="block text-sm font-medium text-gray-700">Model iPhone</label>
                    <select id="iphone_choose" name="iphone_id" class="p-2 border w-full rounded-md" required>
                        @if($iphones->isNotEmpty())
                        @foreach ($iphones as $iphone)
                        <option value="{{ $iphone->id }}">{{ $iphone->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-4">
                    <label for="color" class="block text-sm font-medium text-gray-700">Warna iPhone</label>
                    <select id="color_choose" name="color" class="p-2 border w-full rounded-md" required>
                        
                    </select>
                </div>
                <div class="mb-4">
                    <label for="storage" class="block text-sm font-medium text-gray-700">Penyimpanan iPhone</label>
                    <select id="storage_choose" name="storage" class="p-2 border w-full rounded-md" required>
                        
                    </select>
                </div>
                {{-- <div class="mb-4">
                    <label for="color" class="block text-sm font-medium text-gray-700">Warna iPhone</label>
                    <select  name="color" class="p-2 border w-full rounded-md" required>
                        @if($unit_colors->isNotEmpty())
                        @foreach ($unit_colors as $unit_color)
                        <option value="{{ $unit_color->id }}">{{ $unit_color->color }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-4">
                    <label for="storage" class="block text-sm font-medium text-gray-700">Penyimpanan iPhone</label>
                    <select name="storage" class="p-2 border w-full rounded-md" required>
                        @if($unit_storages->isNotEmpty())
                        @foreach ($unit_storages as $unit_storage)
                        <option value="{{ $unit_storage->id }}">{{ $unit_storage->capacity }}</option>
                        @endforeach
                        @endif
                    </select>
                </div> --}}
                <div class="mb-4">
                    <label for="rent_price" class="block text-sm font-medium text-gray-700">Harga Sewa</label>
                    <input type="number" id="price"  name="rent_price" required class="p-2 border rounded-md w-full" placeholder="Sewa per Hari">
                </div>
                <div class="mb-4 flex gap-2">
                    <div class="">
                        <label for="stok"  class="block text-sm font-medium text-gray-700">Stok Unit</label>
                        <input type="number" id="stok" name="stok" required class="p-2 border rounded-md w-full" placeholder="Stok Unit">
                    </div>
                    <div class="">
                        <label for="battery_health" class="block text-sm font-medium text-gray-700">Battery Health</label>
                        <input type="text" id="battery_health" name="battery_health" required class="p-2 border rounded-md w-full" placeholder="Kesehatan Baterai">
                    </div>
                </div>
                <div class="flex justify-evenly space-x-4">
                    <button type="button" onclick="close_popup_add()" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Batal</button>
                    <button type="submit" id="save_btn" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <x-footer></x-footer>
<script>
    document.getElementById('save_btn').addEventListener('click', function (event) {
        const price = document.getElementById('price').value.trim();
        const stok = document.getElementById('stok').value.trim();
        const battery_health = document.getElementById('battery_health').value.trim();

        if (!price || !stok || !battery_health) {
            return;
        }

        setTimeout(function(){
            const button = event.target;
            button.disabled = true;
            button.style.backgroundColor = '#A0AEC0';
            button.innerHTML = 'Menyimpan Data';
        }, 50);
    });

    const iphone_colors = @json($unit_colors);
    const iphone_storages = @json($unit_storages);

    console.log(iphone_colors);
    console.log(iphone_storages);
    
    function updateOptions(selectElement, options, keyName) {
        // Kosongkan elemen <select>
        selectElement.innerHTML = '';

        // Tambahkan opsi baru
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option[keyName+'_id'];
            opt.textContent = option[keyName + '_name'];
            selectElement.appendChild(opt);
        });
    }

    // Event listener untuk perubahan pada iPhone model
    document.getElementById('iphone_choose').addEventListener('change', function() {
        const selectedIphoneId = this.value;

        // Filter data warna dan penyimpanan berdasarkan iPhone ID
        const filteredColors = iphone_colors.filter(item => item.iphone_id == selectedIphoneId);
        const filteredStorages = iphone_storages.filter(item => item.iphone_id == selectedIphoneId);

        // Perbarui elemen <select> untuk warna dan penyimpanan
        const colorSelect = document.getElementById('color_choose');
        const storageSelect = document.getElementById('storage_choose');

        updateOptions(colorSelect, filteredColors, 'color');
        updateOptions(storageSelect, filteredStorages, 'storage');
    });

    function open_popup_add() {
        document.getElementById('popup-add').classList.remove('hidden');
        const getIphoneID = document.getElementById('iphone_choose');
        const selectedIphoneId = getIphoneID.value;

        // Filter data warna dan penyimpanan berdasarkan iPhone ID
        const filteredColors = iphone_colors.filter(item => item.iphone_id == selectedIphoneId);
        const filteredStorages = iphone_storages.filter(item => item.iphone_id == selectedIphoneId);

        // Perbarui elemen <select> untuk warna dan penyimpanan
        const colorSelect = document.getElementById('color_choose');
        const storageSelect = document.getElementById('storage_choose');

        updateOptions(colorSelect, filteredColors, 'color');
        updateOptions(storageSelect, filteredStorages, 'storage');
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
