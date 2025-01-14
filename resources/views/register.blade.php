<!DOCTYPE html>
<html lang="en">
<x-head>Buat Akun</x-head>
<body class="bg-gray-100" x-data="{ isOpen: false }">
    <x-center-form-container>
        <form action="{{ route('registration.submit') }}" method="POST"
        class="flex flex-col w-full h-full pb-6 text-center rounded-3xl translate-y-0">
        @csrf
            <div class="flex justify-center gap-6">
                <img src="{{ asset('fair_icon.png') }}" class="h-10 w-auto" alt="">
                <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Buat Akun Baru</h3>
            </div>
             <label for="name" class="mt-12 mb-2 text-sm text-start text-grey-900">Nama</label>
             <input name="name" id="name" required type="text" maxlength="40" placeholder="Ketikan nama lengkapmu disini" class="border w-full px-5 py-4 mr-2 text-sm outline-none focus:border-blue-500 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
             <label for="email" class="mb-2 text-sm text-start text-grey-900">Email</label>
             <input name="email" id="email" required type="email" maxlength="40" placeholder="Ketikan alamat emailmu disini" class="border w-full px-5 py-4 mr-2 text-sm outline-none focus:border-blue-500 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
             <label for="address" class="mb-2 text-sm text-start text-grey-900">Alamat</label>
             <input name="address" id="address" required type="text" maxlength="100" placeholder="Ketikan alamatmu disini" class="border w-full px-5 py-4 mr-2 text-sm outline-none focus:border-blue-500 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
             <label for="phone_number" class="mb-2 text-sm text-start text-grey-900">No Whatsapp</label>
             <input name="phone_number" id="phone_number" maxlength="15" minlength="10" required type="text" placeholder="Ketikan nomer whatsappmu disini" class="border w-full px-5 py-4 mr-2 text-sm outline-none focus:border-blue-500 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
             <label for="gender" class="text-sm text-start text-grey-900">Jenis Kelamin</label>
             <div class="flex p-2 mb-4">
                <input name="gender" type="radio" value="male" checked/>
                <label for="gender" class="ml-2 mr-6">Laki - Laki</label>
                <input name="gender" type="radio" value="female"/>
                <label for="gender" class="ml-2">Perempuan</label>
             </div>
             <label for="password" class="mb-2 text-sm text-start text-grey-900">Kata Sandi</label>
             <div class="flex border rounded-lg mb-4">
                <input name="password" id="password" minlength="8" maxlength="24" required type="password" id="password" placeholder="Ketikan kata sandimu disini" class="w-full px-5 py-4 text-sm outline-none focus:border-blue-500 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900"/>
                <button class="p-2 my-1.5 h-full" id="toggle-password" type="button">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" id="toggle-password1" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                      <path stroke-linecap="round" id="toggle-password2" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
             </div>
             <div class="mb-8">
                @if(session('failed'))
                    <p class="text-red-500 text-sm">{{ session('failed') }}</p>
                @endif
             </div>
             <button type="submit" id="register_btn" class="bg-blue-500 w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-lg">Buat Akun</button>
             <p class="text-sm leading-relaxed text-grey-900">Sudah punya akun? <a href="/login" class="font-bold text-blue-500">Login ke akunmu</a></p>
           </form>
    </x-center-form-container>
    <script>
        document.getElementById('register_btn').addEventListener('click', function (event) {
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const name = document.getElementById('name').value.trim();
        const address = document.getElementById('address').value.trim();
        const phone_number = document.getElementById('phone_number').value.trim();

        if (!email || !password || !name || !address || !phone_number) {
            return;
        }

        if (!email.includes('@')) {
            return;
        }

        setTimeout(function(){
            const button = event.target;
            button.disabled = true;
            button.style.backgroundColor = '#A0AEC0';
            button.innerHTML = 'Mohon Tunggu';
        }, 50);
    });
        
        const passwordField = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');
        const togglePassword1 = document.getElementById('toggle-password1');
        const togglePassword2 = document.getElementById('toggle-password2');

        togglePassword.addEventListener('click', () => {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            if(passwordField.type === 'text'){
                togglePassword1.setAttribute('d', 'M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88');
                togglePassword2.setAttribute('d', '');
            } else{
                togglePassword1.setAttribute('d', 'M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z');
                togglePassword2.setAttribute('d', 'M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z');
            }
        });
    </script>
</body>
</html>
