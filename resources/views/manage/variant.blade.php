<!DOCTYPE html>
<html lang="en">
<x-Head>Kelola Varian</x-Head>
<body class="bg-gray-100">
    <x-header></x-header>
        <div class="xl:flex justify-center gap-4">
        <div class="w-5/12 mx-auto my-4 bg-white rounded-md p-8">
            <p class="font-bold text-2xl text-center mb-4">Kelola Varian Warna</p>
            <div class="flex flex-wrap justify-center gap-4">
                <table class="bg-white w-full mx-auto min-w-max table-auto text-left">
                    <thead>
                        <tr>
                            <x-table-header>Nama Warna</x-table-header>
                            <x-table-header>Code Warna</x-table-header>
                            <x-table-header>Kontrol</x-table-header>
                        </tr>
                    </thead>
                    <tbody>
                        @if($unit_colors->isNotEmpty())
                        @foreach ($unit_colors as $unit_color)
                            <tr>
                                <form action="{{ route('manageVariantColorEdit', $unit_color->id) }}" method="POST">
                                @csrf
                                <x-table-contents>
                                    <input type="text" placeholder="" id="color-{{ $unit_color->id }}" value="{{ $unit_color->color }}" disabled class="rounded-md bg-white" name="color">
                                </x-table-contents>
                                <x-table-contents>
                                    <input type="color" placeholder="" id="color_code-{{ $unit_color->id }}" value="{{ $unit_color->color_code }}" disabled class="rounded-md bg-white" name="color_code">
                                </x-table-contents>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex justify-end items-center gap-3">
                                        <div class="flex">
                                            <button type="submit" id="editColorSave-{{ $unit_color->id }}" class="hidden mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <button type="button" id="editColorCancel-{{ $unit_color->id }}" onclick="editColorCancelAct('{{ $unit_color->id }}')" class="hidden mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <button type="button" id="editColor-{{ $unit_color->id }}" onclick="editColorAct('{{ $unit_color->id }}')" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                </form>
                                            <form action="{{ route('manageVariantColorDelete', $unit_color->id) }}" method="POST">
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
                        <tr>
                            <form action="{{ route('manageVariantColorAdd') }}" method="POST">
                                @csrf
                                <td class="p-4 border-b border-blue-gray-50">
                                    <input class="p-2 border rounded-md" required maxlength="20" type="text" name="color" placeholder="">
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <input class="p-2 border rounded-md" required maxlength="20" type="color" name="color_code">
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
                        </tr>
                  </tbody>
                </table>
            </div>
        </div>
        <div class="w-5/12 mx-auto my-4 bg-white rounded-md p-8">
            <p class="font-bold text-2xl text-center mb-4">Kelola Varian Penyimpanan</p>
            <div class="flex flex-wrap justify-center gap-4">
                <table class="bg-white w-full mx-auto min-w-max table-auto text-left">
                    <thead>
                        <tr>
                            <x-table-header>Kapasitas Penyimpanan</x-table-header>
                            <x-table-header>Kontrol</x-table-header>
                        </tr>
                    </thead>
                    <tbody>
                        @if($unit_storages->isNotEmpty())
                        @foreach ($unit_storages as $unit_storage)
                            <tr>
                                <form action="{{ route('manageVariantStorageEdit', $unit_storage->id) }}" method="POST">
                                @csrf
                                <x-table-contents>
                                    <div class="flex">
                                        <input type="text" placeholder="" id="capacity-{{ $unit_storage->id }}" value="{{ $unit_storage->capacity }}" disabled class="rounded-md bg-white" name="capacity">
                                    </div>
                                </x-table-contents>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex justify-end items-center gap-3">
                                        <div class="flex">
                                            <button type="submit" id="editStorageSave-{{ $unit_storage->id }}" class="hidden mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <button type="button" id="editStorageCancel-{{ $unit_storage->id }}" onclick="editStorageCancelAct('{{ $unit_storage->id }}')" class="hidden mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <button type="button" id="editStorage-{{ $unit_storage->id }}" onclick="editStorageAct('{{ $unit_storage->id }}')" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                </form>
                                            <form action="{{ route('manageVariantColorDelete', $unit_storage->id) }}" method="POST">
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
                        <tr>
                            <form action="{{ route('manageVariantStorageAdd') }}" method="POST">
                                @csrf
                                <td class="p-4 border-b flex items-center gap-2 border-blue-gray-50">
                                    <div>
                                    <input class="p-2 border rounded-md" required maxlength="20" type="text" name="capacity" placeholder="">
                                    <select name="capacity_type" class="p-2 border mb-2 rounded-md">
                                        <option value="GB" selected>GB</option>
                                        <option value="TB">TB</option>
                                    </select><br>
                                    </div>
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
                        </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
<script>
    let editIndex;
    
    function editColorAct(id){
        const color = document.getElementById('color-'+id);
        const color_code = document.getElementById('color_code-'+id);
        const editColor = document.getElementById('editColor-'+id);
        const editColorCancel = document.getElementById('editColorCancel-'+id);
        const editColorSave = document.getElementById('editColorSave-'+id);

        color.removeAttribute('disabled');
        color_code.removeAttribute('disabled');
        color.classList.add('p-2', 'border');
        color_code.classList.add('p-2', 'border');
        editColor.classList.add('hidden');
        editColorCancel.classList.remove('hidden');
        editColorSave.classList.remove('hidden');
        if(editIndex){
            if(editIndex != id){
                // alert("index :"+editIndex);
                editColorCancelAct(editIndex);
            }
        }
        editIndex = id;
    }
    function editColorCancelAct(id){
        const color = document.getElementById('color-'+id);
        const color_code = document.getElementById('color_code-'+id);
        const editColor = document.getElementById('editColor-'+id);
        const editColorCancel = document.getElementById('editColorCancel-'+id);
        const editColorSave = document.getElementById('editColorSave-'+id);

        color.value = color.getAttribute("value");
        color.setAttribute('disabled', '');
        color_code.value = color_code.getAttribute("value");
        color_code.setAttribute('disabled', '');
        color.classList.remove('p-2', 'border');
        color_code.classList.remove('p-2', 'border');
        editColor.classList.remove('hidden');
        editColorCancel.classList.add('hidden');
        editColorSave.classList.add('hidden');
    }

    let editIndexi;
    
    function editStorageAct(id){
        const capacity = document.getElementById('capacity-'+id);
        const editStorage = document.getElementById('editStorage-'+id);
        const editStorageCancel = document.getElementById('editStorageCancel-'+id);
        const editStorageSave = document.getElementById('editStorageSave-'+id);

        capacity.removeAttribute('disabled');
        capacity.classList.add('p-2', 'border');
        editStorage.classList.add('hidden');
        editStorageCancel.classList.remove('hidden');
        editStorageSave.classList.remove('hidden');
        if(editIndexi){
            if(editIndexi != id){
                // alert("index :"+editIndex);
                editStorageCancelAct(editIndexi);
            }
        }
        editIndexi = id;
    }
    function editStorageCancelAct(id){
        const capacity = document.getElementById('capacity-'+id);
        const editStorage = document.getElementById('editStorage-'+id);
        const editStorageCancel = document.getElementById('editStorageCancel-'+id);
        const editStorageSave = document.getElementById('editStorageSave-'+id);

        capacity.value = capacity.getAttribute("value");
        capacity.setAttribute('disabled', '');
        capacity.classList.remove('p-2', 'border');
        editStorage.classList.remove('hidden');
        editStorageCancel.classList.add('hidden');
        editStorageSave.classList.add('hidden');
    }
</script>
</body>
</html>