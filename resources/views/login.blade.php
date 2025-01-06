<!DOCTYPE html>
<html lang="en">
<x-head>Login</x-head>
<body class="bg-gray-100">
    <x-center-form-container x-show="!isOpen">
        <form action="{{ route('login.submit') }}" method="POST"
        class="flex flex-col w-full h-full pb-6 text-center rounded-3xl translate-y-0">
        @csrf
            <div class="flex justify-center gap-6">
                <img src="{{ asset('fair_icon.png') }}" class="h-10 w-auto" alt="">
                <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Login</h3>
            </div>
             <label for="email" class="mt-12 mb-2 text-sm text-start text-grey-900">Email</label>
             <input name="email" id="email" type="email" required placeholder="Tuliskan alamat emailmu disini" class="border w-full px-5 py-4 mr-2 text-sm outline-none focus:border-blue-500 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
             <label for="password" class="mb-2 text-sm text-start text-grey-900">Kata Sandi</label>
             <div class="flex border rounded-lg mb-4">
                <input name="password" id="password" required type="password" id="password" placeholder="Ketikan kata sandimu disini" class="w-full px-5 py-4 text-sm outline-none focus:border-blue-500 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900"/>
                <button class="p-2 my-1.5 h-full" id="toggle-password" type="button">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" id="toggle-password1" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                      <path stroke-linecap="round" id="toggle-password2" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
             </div>
            @if(session('failed'))
            <p class="text-red-500 text-sm">{{ session('failed') }}</p>
            @endif
            @if(session('registered'))
            <p class="text-green-500 text-sm">{{ session('registered') }}</p>
            @endif
             {{-- <div class="flex flex-row justify-between mb-8">
               <a href="javascript:void(0)" class="mr-4 text-sm font-medium text-blue-500">Forget password?</a>
             </div> --}}
             <button type="submit" id="login_btn" class="bg-blue-500 w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-lg">Masuk</button>
             <p class="text-sm leading-relaxed text-grey-900">Belum punya akun?? <a href="/register" class="font-bold text-blue-500">Buat akun baru</a></p>
           </form>
    </x-center-form-container>
<script>    
    document.getElementById('login_btn').addEventListener('click', function (event) {
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();

        if (!email || !password) {
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
