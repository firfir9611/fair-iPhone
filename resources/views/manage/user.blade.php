<!DOCTYPE html>
<html lang="en">
<x-Head>Kelola Pengguna</x-Head>
<body class="bg-gray-100">
    <x-header></x-header>
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <p class="font-bold text-2xl text-center mb-4">Kelola Pengguna</p>
        <div class="flex flex-wrap justify-center gap-4">
        <div class="flex justify-items-start">
                <button class="bg-red-500 hover:bg-red-600 py-2 px-4 text-white rounded-md" id="hapus_terpilih">Hapus Terpilih</button>
        </div>
            <table class="bg-white w-full mx-auto min-w-max table-auto text-left">
                <thead>
                    <tr>
                        <th class="border-y border-blue-gray-50 p-4">
                            <input type="checkbox" id="pilih_semua" class="ml-2 w-6 h-6">
                        </th>
                        <x-table-header>ID Pengguna</x-table-header>
                        <x-table-header>Nama Pengguna</x-table-header>
                        <x-table-header>Email</x-table-header>
                        <x-table-header>Kata Sandi</x-table-header>
                        <x-table-header>Role</x-table-header>
                        <x-table-header>Kontrol</x-table-header>
                    </tr>
                </thead>
                <tbody>
                    @if($users->isNotEmpty())
                    @foreach ($users as $user)
                        <tr>
                            <form action="{{ route('manageUserEdit', $user->id) }}" method="POST">
                            @csrf
                            <td class="p-4 border-b border-blue-gray-50">
                                <input type="checkbox" class="checkbox_pilih ml-2 w-6 h-6" name="ids[]" value="{{ $user->id }}">
                            </td>
                            <x-table-contents>
                                <input type="text" placeholder="" value="{{ $user->id }}" disabled class="bg-white" name="">
                            </x-table-contents>
                            <x-table-contents>
                                <input type="text" placeholder="" id="name-{{ $user->id }}" value="{{ $user->name }}" required disabled class="rounded-md bg-white" name="name">
                            </x-table-contents>
                            <x-table-contents>
                                <input type="text" placeholder="" id="email-{{ $user->id }}" value="{{ $user->email }}" required disabled class="rounded-md bg-white" name="email">
                            </x-table-contents>
                            <x-table-contents>
                                <input type="text" placeholder="" id="password-{{ $user->id }}" value="???" disabled class="rounded-md w-32 bg-white" name="password">
                            </x-table-contents>
                            <td class="p-4 border-b border-blue-gray-50">
                                <input type="text" placeholder="" id="roleShow-{{ $user->id }}" value="{{ $user->role }}" disabled class="bg-white" name="">
                                <select name="role" class="hidden p-2 border rounded-md" id="roleSelect-{{ $user->id }}">
                                    @if($user->role == 'gm')
                                    <option value="gm" selected>Gm</option>
                                    @endif
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected':'' }}>Admin</option>
                                    <option value="customer" {{ $user->role == 'customer' ? 'selected':'' }}>Customer</option>
                                </select>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex justify-end items-center gap-3">
                                    <div class="flex">
                                        <button type="submit" id="editSave-{{ $user->id }}" class="hidden mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                        <button type="button" id="editCancel-{{ $user->id }}" onclick="editCancelAct('{{ $user->id }}')" class="hidden mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                        <button type="button" id="edit-{{ $user->id }}" onclick="editAct('{{ $user->id }}')" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 p-1 rounded-md">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                            </form>
                                        @if($user->role != 'gm')
                                        <form action="{{ route('manageUserDelete', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="mx-1 border hover:bg-blue-500 hover:text-white text-blue-500  border-blue-500 p-1 rounded-md">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                    <tr>
                        <x-table-contents></x-table-contents>
                        <x-table-contents>
                            @if($users)
                            {{ $id }}
                            @else
                            1
                            @endif
                        </x-table-contents>
                        <form action="{{ route('manageUserAdd') }}" method="POST">
                            @csrf
                            <td class="p-4 border-b border-blue-gray-50">
                                <input class="p-2 border rounded-md" required type="text" name="name" placeholder="Masukan Nama Pengguna Baru">
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <input class="p-2 border rounded-md" required type="text" name="email" placeholder="Masukan Email Pengguna Baru">
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <input class="p-2 border rounded-md w-32" required maxlength="20" type="text" name="password" placeholder="Masukan Kata Sandi Pengguna Baru">
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <select name="role" class="p-2 border rounded-md">
                                    <option value="admin" selected>Admin</option>
                                    <option value="customer">Customer</option>
                                </select>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let editIndex;

    function editAct(id){
        const name = document.getElementById('name-'+id);
        const email = document.getElementById('email-'+id);
        const password = document.getElementById('password-'+id);
        const edit = document.getElementById('edit-'+id);
        const editCancel = document.getElementById('editCancel-'+id);
        const editSave = document.getElementById('editSave-'+id);
        const roleShow = document.getElementById('roleShow-'+id);
        const roleSelect = document.getElementById('roleSelect-'+id);

        name.removeAttribute('disabled');
        email.removeAttribute('disabled');
        password.removeAttribute('disabled');
        name.classList.add('p-2', 'border');
        email.classList.add('p-2', 'border');
        password.classList.add('p-2', 'border');
        password.value = '';
        roleShow.classList.add('hidden');
        if(roleShow.value == 'gm'){
            roleSelect.setAttribute('disabled', '');
        }
        roleSelect.classList.remove('hidden');
        edit.classList.add('hidden');
        editCancel.classList.remove('hidden');
        editSave.classList.remove('hidden');
        if(editIndex){
            if(editIndex != id){
                // alert("index :"+editIndex);
                editCancelAct(editIndex);
            }
        }
        editIndex = id;
    }
    function editCancelAct(id){
        const name = document.getElementById('name-'+id);
        const email = document.getElementById('email-'+id);
        const password = document.getElementById('password-'+id);
        const edit = document.getElementById('edit-'+id);
        const editCancel = document.getElementById('editCancel-'+id);
        const editSave = document.getElementById('editSave-'+id);
        const roleShow = document.getElementById('roleShow-'+id);
        const roleSelect = document.getElementById('roleSelect-'+id);

        name.value = name.getAttribute("value");
        name.setAttribute('disabled', '');
        email.value = email.getAttribute("value");
        email.setAttribute('disabled', '');
        password.value = '???';
        password.setAttribute('disabled', '');
        name.classList.remove('p-2', 'border');
        email.classList.remove('p-2', 'border');
        password.classList.remove('p-2', 'border');
        roleShow.classList.remove('hidden');
        if(roleShow.value == 'gm'){
            roleSelect.removeAttribute('disabled');
        }
        roleSelect.value = roleShow.getAttribute("value");
        roleSelect.classList.add('hidden');
        edit.classList.remove('hidden');
        editCancel.classList.add('hidden');
        editSave.classList.add('hidden');
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
                url: '{{ route('manageUserDeleteSelected') }}',
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
