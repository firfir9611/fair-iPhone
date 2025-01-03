<!DOCTYPE html>
<html lang="en">
<x-head>Kelola Unit</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-header></x-header>
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <div class="mx-auto w-3/4 border p-12 rounded-md">
            <form action="{{ route('manageUnitEditSave', $unit_id->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <p class="text-2xl font-bold mb-4 text-center">Ubah Data Unit iPhone</p>
                <div class="flex justify-between">
                    <div>
                        <label for="id">ID Unit : </label>
                        <input class="bg-white" name="id" type="text" value="{{ $unit_id->id }}" disabled>
                    </div>
                    <button class="border border-blue-500 rounded-md bg-white hover:bg-blue-500 text-blue-500 hover:text-white py-1 px-2" type="submit">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                        </svg>
                    </button>
                </div>
                {{-- <div class="mb-4">
                    <label for="img">Gambar iPhone (Rasio Gambar 3:4) : </label>
                    <input class="w-1/4 bg-white border rounded-md" type="file" name="img" accept="image/png, image/jpg, image/jpeg"><br>
                </div> --}}
                {{-- <label for="img_front">Gambar iPhone bagian depan (Rasio Gambar 3:4) : </label>
                <input class="w-1/4 bg-white border rounded-md" type="file" name="img_front" accept="image/png, image/jpg, image/jpeg"><br>
                <label for="img_back">Gambar iPhone bagian belakang (Rasio Gambar 3:4) : </label>
                <input class="w-1/4 bg-white border rounded-md" type="file" name="img_back" accept="image/png, image/jpg, image/jpeg"><br>
                <label for="img_top">Gambar iPhone bagian atas (Rasio Gambar 3:4) : </label>
                <input class="w-1/4 bg-white border rounded-md" type="file" name="img_top" accept="image/png, image/jpg, image/jpeg"><br>
                <label for="img_bottom">Gambar iPhone bagian bawah (Rasio Gambar 3:4) : </label>
                <input class="w-1/4 bg-white border rounded-md" type="file" name="img_bottom" accept="image/png, image/jpg, image/jpeg"><br>
                <label for="img_left">Gambar iPhone bagian kiri (Rasio Gambar 3:4) : </label>
                <input class="w-1/4 bg-white border rounded-md" type="file" name="_left" accept="image/png, image/jpg, image/jpeg"><br>
                <label for="img_right">Gambar iPhone bagian kanan (Rasio Gambar 3:4) : </label>
                <input class="w-1/4 bg-white border rounded-md" type="file" name="img_right" accept="image/png, image/jpg, image/jpeg"><br> --}}
                <div class="mb-4">
                    <label for="show">Tampilkan : </label>
                    <input class="border rounded-md h-4 w-4" type="checkbox" name="show" {{ $unit_id->show == 1 ? 'checked':'' }}><br>
                </div>
                <div class="mb-4">
                    <label for="name">Nama Iphone : </label><br>
                    <input class="p-2 border rounded-md w-full" value="{{ $unit_id->iphone_name }}" type="text" disabled name="iphone_name" required>
                </div>
                <div class="mb-4">
                    <label for="rent_price">Harga Sewa : </label><br>
                    <input class="p-2 border rounded-md w-full" value="{{ $unit_id->rent_price }}" type="number" placeholder="Masukan Harga Sewa iPhone" name="rent_price" required>
                </div>
                <div class="mb-4">
                    <label for="battery_health">Battery Health : </label><br>
                    <input class="p-2 border rounded-md w-full" value="{{ $unit_id->battery_health }}" type="text" placeholder="Masukan Kesehatan Baterai iPhone" name="battery_health" required>
                </div>
                <div class="mb-4">
                    <label for="stok">Stok : </label><br>
                    <input class="p-2 border rounded-md w-full" value="{{ $unit_id->stok }}" type="number" placeholder="Masukan Kesehatan Baterai iPhone" name="stok" required>
                </div>
                <div class="mb-4">
                    <label for="color"> Warna : </label>
                    <select name="color" class="p-2 border rounded-md">
                        @if($iphone_colors->isNotEmpty())
                        @foreach ($iphone_colors as $iphone_color)
                            <option value="{{ $iphone_color->unit_color_id }}" >{{ $iphone_color->color }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-4">
                <label for="storage"> Penyimpanan : </label>
                <select name="storage" class="p-2 border rounded-md">
                    @if($iphone_storages->isNotEmpty())
                    @foreach ($iphone_storages as $iphone_storage)
                        <option value="{{ $iphone_storage->unit_storage_id }}">{{ $iphone_storage->capacity }}</option>
                    @endforeach
                    @endif
                </select>
                </div>
            </form>
            {{-- <label for="unit_code"> Kode Unit : </label>
                @if($unit_codes->isNotEmpty())
                    @foreach($unit_codes as $unit_code)
                    <form action="{{ route('manageUnitCodeDelete', $unit_code->id) }}" method="POST">
                        @csrf
                        <div class="flex flex-wrap gap-2">
                            <div class="flex gap-1 p-2 items-center bg-blue-500 rounded-md">
                            <p class="font-bold text-white">{{ $unit_code->code }} | </p>
                            <button type="submit" class="hover:bg-red-600">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                </svg>
                            </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    @endif
                <form action="{{ route('manageUnitCodeAdd', $unit_id->id) }}" method="POST">
                    @csrf
                    <div class="flex items-center gap-2">
                        <button class="border border-blue-500 rounded-md bg-white hover:bg-blue-500 text-blue-500 hover:text-white p-1" type="submit">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                        </button>
                    </div>
                </form> --}}
            
        </div>
    </div>
</body>
</html>