@props(['active'=> false])

<header  x-data="{ isOpen: false }" class="bg-white duration-300 {{ $active ? 'lg:opacity-20 lg:hover:opacity-80 hover:duration-300 hover:ease-in' : '' }}" {{ $attributes }}>
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="flex gap-2 -m-1.5 p-1.5">
          <img class="h-8 w-auto" src="{{ asset('favicon_io/android-chrome-192x192.png') }}" alt="">
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

      <div class="hidden lg:flex lg:gap-x-12">
        <x-header-nav href="/product" :active="request() -> is ('product')">Product</x-header-nav>
        <x-header-nav href="/wishlist" :active="request() -> is ('wishlist')">Wishlist</x-header-nav>
        <x-header-nav href="/contact" :active="request() -> is ('contact')">Contact</x-header-nav>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        @if(Auth::check())
        <form method="POST" action="{{ route('logout') }}" >
            @csrf
            <button type="submit" class="flex gap-2 hover:bg-gray-100 text-gray-900 text-sm font-semibold leading-6 p-2 rounded-md">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            <p>{{ Auth::user()->name }}</p>
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
            <img class="h-8 w-auto" src="{{ asset('favicon_io/android-chrome-192x192.png') }}" alt="">
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
                <a href="/product" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Product</a>
                <a href="/wishlist" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Wishlist</a>
                <a href="/contact" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Contact</a>
            </div>
            <div class="py-6">
                @if(Auth::check())
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
