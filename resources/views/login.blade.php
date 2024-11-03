<!DOCTYPE html>
<html lang="en">
<x-Head>Login</x-Head>
<body class="bg-gray-100" x-data="{ isOpen: false }">
    <x-center-form-container x-show="!isOpen">
        <form action="{{ route('login.submit') }}" method="POST"
        class="flex flex-col w-full h-full pb-6 text-center rounded-3xl translate-y-0">
        @csrf
            <div class="flex justify-center gap-6">
                <img src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" class="h-10 w-auto" alt="">
                <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Login</h3>
            </div>
             <label for="email" class="mt-12 mb-2 text-sm text-start text-grey-900">Email</label>
             <input name="email" type="email" placeholder="Email here" class="border flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:border-blue-500 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
             <label for="password" class="mb-2 text-sm text-start text-grey-900">Password</label>
             <input name="password" type="password" placeholder="Password here" class="border flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:border-blue-500 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
            @if(session('failed'))
            <p class="text-red-500 text-sm">{{ session('failed') }}</p>
            @endif
             <div class="flex flex-row justify-between mb-8">
               <a href="javascript:void(0)" class="mr-4 text-sm font-medium text-blue-500">Forget password?</a>
             </div>
             <button type="submit" class="bg-blue-500 w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-lg">Sign In</button>
             <p class="text-sm leading-relaxed text-grey-900">Not registered yet? <a href="javascript:void(0)" class="font-bold text-blue-500" @click="isOpen = !isOpen">Create an Account</a></p>
           </form>
    </x-center-form-container>
    <x-center-form-container x-show="isOpen">
        <form action="{{ route('registration.submit') }}" method="POST"
        class="flex flex-col w-full h-full pb-6 text-center rounded-3xl translate-y-0">
        @csrf
            <div class="flex justify-center gap-6">
                <img src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" class="h-10 w-auto" alt="">
                <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Register</h3>
            </div>
             <label for="name" class="mt-12 mb-2 text-sm text-start text-grey-900">Full Name</label>
             <input name="name" type="text" placeholder="Full name here" class="border flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:border-blue-500 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
             <label for="email" class="mb-2 text-sm text-start text-grey-900">Email</label>
             <input name="email" type="email" placeholder="Email here" class="border flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:border-blue-500 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
             <label for="password" class="mb-2 text-sm text-start text-grey-900">Password</label>
             <input name="password" type="password" placeholder="Password here" class="border flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:border-blue-500 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-lg"/>
             <div class="flex flex-row justify-between mb-8">
             </div>
             <button type="submit" class="bg-blue-500 w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-lg">Register</button>
             <p class="text-sm leading-relaxed text-grey-900">Have an Account? <a href="javascript:void(0)" class="font-bold text-blue-500" @click="isOpen = !isOpen">Login to an Account</a></p>
           </form>
    </x-center-form-container>
</body>
</html>
