<!DOCTYPE html>
<html lang="en">
<x-head>Profil Pengguna</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-header></x-header>
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <form action="{{ route('userEditSave', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex items-center">
            <div class="mx-auto flex items-center">
                @if($user->img)
                {{-- <img class="h-52 w-52 rounded-full border-2" src="{{ asset('storage/'.$user->img) }}"> --}}
                <img class="h-52 w-52 rounded-full border-2" src="https://i.ibb.co.com/5xGbNmx/profile-icon.png">
                @else
                {{-- <img class="h-52 w-52 rounded-full border-2" src="{{ asset('icons/profile-icon.png') }}"> --}}
                <img class="h-52 w-52 rounded-full border-2" src="https://i.ibb.co.com/5xGbNmx/profile-icon.png">
                @endif
                <svg fill="none" viewBox="0 0 24 24" id="arrow" stroke-width="1.5" stroke="currentColor" class="size-24 mx-8 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>              
                {{-- <img class="h-52 w-52 rounded-full border-2 hidden" id="preview" src=""> --}}
            </div>
        </div>
        <div class="flex justify-center my-8">
        <input class="w-1/4 bg-white border rounded-md hidden" type="file" id="img" name="img" accept="image/png, image/jpg, image/jpeg"><br>
        </div>
        <div class="px-24 mx-auto">
            <label for="name" class="font-bold text-xl">Nama :</label>
            <input type="text" name="name" value="{{ $user->name }}" id="name" disabled required class="w-3/4 mb-4 text-xl rounded-md bg-white"><br>
            <label for="email" class="font-bold text-xl">Email :</label>
            <input type="email" name="email" value="{{ $user->email }}" id="email" disabled required class="w-3/4 mb-4 text-xl rounded-md bg-white"><br>
            <label for="address" class="font-bold text-xl">Alamat :</label>
            <input type="text" name="address" value="{{ $user->address }}" id="address" disabled required class="w-3/4 mb-4 text-xl rounded-md bg-white"><br>
            <label for="phone_number" class="font-bold text-xl">No Whatsapp :</label>
            <input type="text" name="phone_number" value="{{ $user->phone_number }}" id="phone_number" disabled required class="w-3/4 mb-4 text-xl rounded-md bg-white"><br>
            <div class="flex justify-center gap-4">
                <button class="py-2 px-4 text-xl bg-blue-500 rounded-md text-white font-bold" id="ubah" type="button">Ubah</button>
                <button class="py-2 px-4 text-xl bg-blue-500 rounded-md text-white font-bold hidden" id="simpan" type="submit">Simpan</button>
            </div>
        </div>
        </form>
    </div>
    <x-footer></x-footer>
<script>
    const imageInput = document.getElementById('img');
    const ubah = document.getElementById('ubah');
    const simpan = document.getElementById('simpan');
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const address = document.getElementById('address');
    const phone_number = document.getElementById('phone_number');
    const arrow = document.getElementById('arrow');
    const preview = document.getElementById('preview');

    imageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result; // Set hasil pembacaan sebagai sumber gambar
            preview.classList.remove('hidden');
            arrow.classList.remove('hidden');
        };
        reader.readAsDataURL(file); // Baca file sebagai data URL
    } else {
        preview.style.display = 'none'; // Sembunyikan elemen gambar jika tidak ada file
    }
    });
    
    const nameOld = name.value;
    const emailOld = email.value;
    const addressOld = address.value;
    const phone_numberOld = phone_number.value;

    ubah.addEventListener('click', () => {
            // nameOld = name.value;
            // emailOld = email.value;
            // addressOld = address.value;
            // phone_numberOld = phone_number.value;

            if (name.hasAttribute('disabled')) {
                name.removeAttribute('disabled');
                name.classList.add('p-2', 'border');
                email.removeAttribute('disabled');
                email.classList.add('p-2', 'border');
                address.removeAttribute('disabled');
                address.classList.add('p-2', 'border');
                phone_number.removeAttribute('disabled');
                phone_number.classList.add('p-2', 'border');
                ubah.innerHTML = 'Batalkan';
                simpan.classList.remove('hidden');
                // imageInput.classList.remove('hidden');
            } else {
                name.value = nameOld;
                name.setAttribute('disabled', '');
                name.classList.remove('p-2', 'border');
                email.value = emailOld;
                email.setAttribute('disabled', '');
                email.classList.remove('p-2', 'border');
                address.value = addressOld;
                address.setAttribute('disabled', '');
                address.classList.remove('p-2', 'border');
                phone_number.value = phone_numberOld;
                phone_number.setAttribute('disabled', '');
                phone_number.classList.remove('p-2', 'border');
                ubah.innerHTML = 'Ubah';
                simpan.classList.add('hidden');
                // imageInput.classList.add('hidden');
                // preview.classList.add('hidden');
                // arrow.classList.add('hidden');
                // imageInput.value = '';
            }
        });
</script>
</body>
</html>