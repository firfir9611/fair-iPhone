<!DOCTYPE html>
<html lang="en">
<x-head>Ubah Model</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-header></x-header>
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <div class="mx-auto w-3/4 border p-12 rounded-md">
            <form action="{{ route('manageModelEditSave', $iphone->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <p class="text-2xl font-bold mb-4 text-center">Ubah Data iPhone</p>
                <div class="flex justify-between">
                    <div>
                        <label for="id">ID iPhone : </label>
                        <input class="bg-white" name="id" type="text" value="{{ $iphone->id }}" disabled>
                    </div>
                    <button class="border border-blue-500 rounded-md bg-white hover:bg-blue-500 text-blue-500 hover:text-white py-1 px-2" type="submit">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                        </svg>
                    </button>
                </div>
                {{-- <label for="img">Gambar iPhone (Rasio Gambar 3:4) : </label>
                <input class="w-1/4 bg-white border rounded-md mt-2" type="file" name="img" accept="image/png, image/jpg, image/jpeg"><br> --}}
                <label for="show">Tampilkan : </label>
                <input class="border rounded-md mt-2 h-4 w-4" type="checkbox" name="show" {{ $iphone->show == 1 ? 'checked':'' }}><br>
                {{-- <label for="model">Model Iphone : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->model }}" type="text" placeholder="Masukan Model iPhone" name="model" required> --}}
                <label for="name">Nama Iphone : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->name }}" type="text" placeholder="Masukan Nama iPhone" name="name" required>
                <label for="display">Layar : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->display }}" type="text" placeholder="Masukan Spesifikasi Layar iPhone" name="display" required>
                <label for="os">OS : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->os }}" type="text" placeholder="Masukan Spesifikasi OS iPhone" name="os" required>
                <label for="rearcam">Kamera Belakang : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->rearcam }}" type="text" placeholder="Masukan Spesifikasi Kamera Belakang iPhone" name="rearcam" required>
                <label for="selfie">Kamera Selfie : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->selfie }}" type="text" placeholder="Masukan Spesifikasi Kamera Selfie iPhone" name="selfie" required>
                <label for="chipset">Chipset : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->chipset }}" type="text" placeholder="Masukan Nama iPhone" name="chipset" required>
                <label for="battery">Kapasitas Baterai : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->battery }}" type="text" placeholder="Masukan Kapasitas Baterai iPhone" name="battery" required>
                <label for="dimention">Dimensi Ukuran : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->dimention }}" type="text" placeholder="Masukan Nama iPhone" name="dimention" required>
                <label for="launch_at">Waktu Peluncuran : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->launch_at }}" type="date" name="launch_at" required>
                {{-- <label for="stok_spare">Stok Cadangan : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->stok_spare }}" disabled type="number" min="0" name="stok_spare" required> --}}
                <label for="stok_ready">Stok Tersedia : </label><br>
                <input class="p-2 border rounded-md w-full mb-2" value="{{ $iphone->stok_ready }}" disabled type="number" min="0" name="stok_ready" required>
            </form>
                {{-- <label for="colors">Daftar Warna : </label>
                <div class="flex gap-2 flex-wrap items-center">
                        @if($unit_current_colors)
                        @foreach($unit_current_colors as $unit_current_color)
                        <form action="{{ route('manageModelVariantColorDelete', $unit_current_color->iphone_color_id) }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap gap-2">
                                <div class="flex gap-1 p-2 items-center rounded-md" style="background-color: {{ $unit_current_color->color_code }}">
                                <p class="font-bold text-white">{{ $unit_current_color->color }} | </p>
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
                    <form action="{{ route('manageModelVariantColorAdd', $iphone->id) }}" method="POST">
                        @csrf
                        <div class="flex items-center gap-2">
                            <select name="colors" class="p-2 border rounded-md">
                                @if($unit_colors->isNotEmpty())
                                @foreach ($unit_colors as $unit_color)
                                    @php
                                        $exists = $unit_current_colors->contains('unit_color_id', $unit_color->id);
                                    @endphp
                                    @if (!$exists)
                                        <option value="{{ $unit_color->id }}">{{ $unit_color->color }}</option>
                                    @endif
                                @endforeach
                                @endif
                            </select>
                            <button class="border border-blue-500 rounded-md bg-white hover:bg-blue-500 text-blue-500 hover:text-white p-1" type="submit">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div> --}}
                <label for="storage">Daftar Storage : </label>
                <div class="flex gap-2 flex-wrap items-center">
                        @if($unit_current_storages)
                        @foreach($unit_current_storages as $unit_current_storage)
                        <form action="{{ route('manageModelVariantStorageDelete', $unit_current_storage->iphone_storage_id) }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap gap-2">
                                <div class="flex gap-1 p-2 items-center rounded-md bg-blue-500">
                                <p class="font-bold text-white">{{ $unit_current_storage->capacity }} | </p>
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
                    <form action="{{ route('manageModelVariantStorageAdd', $iphone->id) }}" method="POST">
                        @csrf
                        <div class="flex items-center gap-2">
                            <select name="capacity" class="p-2 border rounded-md">
                                @if($unit_storages->isNotEmpty())
                                @foreach ($unit_storages as $unit_storage)
                                    @php
                                        $exists = $unit_current_storages->contains('unit_storage_id', $unit_storage->id);
                                    @endphp
                                    @if (!$exists)
                                        <option value="{{ $unit_storage->id }}">{{ $unit_storage->capacity }}</option>
                                    @endif
                                @endforeach
                                @endif
                            </select>
                            <button class="border border-blue-500 rounded-md bg-white hover:bg-blue-500 text-blue-500 hover:text-white p-1" type="submit">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>