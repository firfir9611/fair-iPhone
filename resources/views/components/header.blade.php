@props(['active'=> false])

<header  x-data="{ isOpen: false }" class="bg-white duration-300 {{ $active ? 'lg:opacity-20 lg:hover:opacity-80 hover:duration-300 hover:ease-in' : '' }}" {{ $attributes }}>
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="flex gap-2 -m-1.5 p-1.5">
          {{-- <img class="h-8 w-auto" src="{{ asset('favicon_io/android-chrome-192x192.png') }}" alt=""> --}}
          <img class="h-8 w-auto" src="https://i.ibb.co.com/vvp4S1N/android-chrome-192x192.png" alt="">
          <span class="text-xl">Fair iPhones Rental</span>
        </a>
      </div>
      <div class="flex lg:hidden">
        <button @click="isOpen = !isOpen" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class=""></span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-2">
        <x-header-nav href="/product" :active="request() -> is ('product','product/detail')">Produk</x-header-nav>
        {{-- <x-header-nav href="/wishlist" :active="request() -> is ('wishlist')">Daftar Keinginan</x-header-nav> --}}
        <x-header-nav href="/booked" :active="request() -> is ('booked')">Sedang Disewa</x-header-nav>
        <x-header-nav href="/contact" :active="request() -> is ('contact')">Kontak</x-header-nav>
        @if(Auth::check())
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'gm')
        <div x-data="{ isOpen: false }">
          <button  type="button" class="flex items-center gap-x-1 hover:bg-slate-100 rounded-md" aria-expanded="false" @click="isOpen = !isOpen">
              <x-header-nav href="#" :active="request() -> is ('manage/user')">Kelola</x-header-nav>
              <svg
              :class="{'rotate-180 transition ease-out duration-200': isOpen, 'rotate-0 transition ease-out duration-150': !isOpen }"
              class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
              </svg>
            </button>
            <div
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            @click.outside="isOpen = false"
            class="absolute -ml-56 z-10 mt-2 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
              <div class="p-4">
                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                  <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                  </div>
                  <div class="flex-auto">
                    <a href="{{ route('manageModel') }}" class="block font-semibold text-gray-900">
                      Kelola Model iPhone
                      <span class="absolute inset-0"></span>
                    </a>
                    <p class="mt-1 text-gray-600">Atur ketersediaan setiap model iPhone</p>
                  </div>
                </div>
                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                  <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                  </div>
                  <div class="flex-auto">
                    <a href="{{ route('manageVariant') }}" class="block font-semibold text-gray-900">
                      Kelola Varian iPhone
                      <span class="absolute inset-0"></span>
                    </a>
                    <p class="mt-1 text-gray-600">Atur ketersediaan varian untuk model iPhone</p>
                  </div>
                </div>
                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                  <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5h3m-6.75 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-15a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 4.5v15a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                  </div>
                  <div class="flex-auto">
                    <a href="{{ route('manageUnit') }}" class="block font-semibold text-gray-900">
                      Kelola Unit iPhone
                      <span class="absolute inset-0"></span>
                    </a>
                    <p class="mt-1 text-gray-600">Atur ketersediaan setiap unit iPhone</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        @endif
        @if(Auth::user()->role == 'gm')
        <div x-data="{ isOpen: false }">
          <button  type="button" class="flex items-center gap-x-1 hover:bg-slate-100 rounded-md" aria-expanded="false" @click="isOpen = !isOpen">
              <x-header-nav href="#" :active="request() -> is ('manage/user')">Alat Master</x-header-nav>
              <svg
              :class="{'rotate-180 transition ease-out duration-200': isOpen, 'rotate-0 transition ease-out duration-150': !isOpen }"
              class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
              </svg>
            </button>
            <div
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            @click.outside="isOpen = false"
            class="absolute -ml-56 z-10 mt-2 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
              <div class="p-4">
                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                  <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                  </div>
                  <div class="flex-auto">
                    <a href="{{ route('manageUser') }}" class="block font-semibold text-gray-900">
                      Kelola Pengguna
                      <span class="absolute inset-0"></span>
                    </a>
                    <p class="mt-1 text-gray-600">Atur email dan kata sandi pengguna</p>
                  </div>
                </div>
                
              </div>
            </div>
        </div>

        @endif
        @endif
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        @if(Auth::check())
        <form method="POST" action="{{ route('logout') }}" class="items-center flex hover:bg-gray-50 rounded-md">
            @csrf
            <a href="{{ route('userProfile') }}" class="flex gap-1 p-2 rounded-l-md hover:bg-gray-100">
              @if(Auth::user()->img)
              <img src="{{ asset('storage/'.Auth::user()->img) }}" class="h-6 w-6 rounded-full border" alt="">
              @else
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
              @endif
              <p>{{ Auth::user()->name }}</p>
            </a>
            <button type="submit" class="hover:bg-gray-100 flex rounded-e-md gap-2 text-sm font-semibold p-2">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
            </svg>
            </button>
        </form>
        @else
        <a href="/login" class="flex gap-2 hover:bg-gray-100 text-gray-900 text-sm font-semibold leading-6 p-2 rounded-md">
        <p>Login</p>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
        </svg>
        </a>
        @endif
      </div>
    </nav>
    <div class="lg:hidden" role="dialog" aria-modal="true">

      <div
      x-show="isOpen"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="translate-x-full"
      x-transition:enter-end="translate-x-0"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="translate-x-0"
      x-transition:leave-end="translate-x-full"
      @click.outside="isOpen= false"
      class="absolute inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="/" class="flex gap-2 -m-1.5 p-1.5">
            {{-- <img class="h-8 w-auto" src="{{ asset('favicon_io/android-chrome-192x192.png') }}" alt=""> --}}
            <img class="h-8 w-auto" src="https://i.ibb.co.com/vvp4S1N/android-chrome-192x192.png" alt="">
            <span class="text-xl">Fair iPhones Rental</span>
          </a>
          <button @click="isOpen = !isOpen" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
                <a href="/product" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Produk</a>
                <a href="/booked" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Sedang Disewa</a>
                <a href="/contact" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Kontak</a>
            </div>
            <div class="py-6">
                @if(Auth::check())
                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'gm')
                <div x-data="{ isOn: false }" class="-mx-3">
                  <button @click="isOn = !isOn" type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100" aria-controls="disclosure-1" aria-expanded="false">
                    Kelola
                    <svg :class="{'rotate-180 transition ease-out duration-100': isOn, 'rotate-0 transition ease-in duration-75': !isOn }" class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                      <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                  </button>
                  <div
                  x-show="isOn"
                  x-transition:enter="transition ease-out duration-100 transform"
                  x-transition:enter-start="opacity-0"
                  x-transition:enter-end="opacity-100"
                  x-transition:leave="transition ease-in duration-75 transform"
                  x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0"
                  class="mt-2 space-y-2" id="disclosure-1">
                    <a href="{{ route('manageModel') }}" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-100">Model iPhone</a>
                    <a href="{{ route('manageVariant') }}" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-100">Varian iPhone</a>
                    <a href="{{ route('manageUnit') }}" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-100">Unit iPhone</a>
                  </div>
                </div>
                @endif
                @if(Auth::user()->role == 'gm')
                <div x-data="{ isOn: false }" class="-mx-3">
                  <button @click="isOn = !isOn" type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100" aria-controls="disclosure-1" aria-expanded="false">
                    Alat Master
                    <svg :class="{'rotate-180 transition ease-out duration-100': isOn, 'rotate-0 transition ease-in duration-75': !isOn }" class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                      <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                  </button>
                  <div
                  x-show="isOn"
                  x-transition:enter="transition ease-out duration-100 transform"
                  x-transition:enter-start="opacity-0"
                  x-transition:enter-end="opacity-100"
                  x-transition:leave="transition ease-in duration-75 transform"
                  x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0"
                  class="mt-2 space-y-2" id="disclosure-1">
                    <a href="{{ route('manageUser') }}" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-100">Kelola Pengguna</a>
                  </div>
                </div>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
                    @csrf
                    <button type="submit" class="flex gap-2 -mx-3 block w-full rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <p>{{ Auth::user()->name }}</p>
                    <div class="flex flex-1 justify-end">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                    </div>
                    </button>
                </form>
                @else
                <a href="/login" class="flex gap-2 -mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">
                    <p>Login</p>
                    <div class="flex flex-1 justify-end">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                          <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg>
                    </div>
                </a>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</header>
