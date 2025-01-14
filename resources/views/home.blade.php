<!DOCTYPE html>
<html lang="en">
<x-head>Welcome to Fair</x-head>
<body class="bg-gray-100 lg:bg-black lg:w-full overflow-x-hidden lg:overflow-hidden">
    {{-- <video class="hidden lg:block min-w-full min-h-full -z-10 fixed top-0" src="{{ asset('videos/introduce_new_iphone_16_series.mp4') }}" autoplay muted loop></video> --}}
    {{-- <video class="hidden lg:block min-w-full min-h-full -z-10 fixed top-0" src="https://vimeo.com/1043595477" type="video/mp4" autoplay muted loop></video> --}}
    {{-- <img class="hidden lg:block min-w-full min-h-full -z-10 fixed top-0" src="https://i.ibb.co.com/QpksSQX/new-iphone-bg-jpeg.jpg" alt="new-iphone-bg-jpeg"> --}}
    <iframe class="hidden lg:block -z-10 fixed top-0 h-full w-full border-none" width="1366" allow="fullscreen;autoplay" src="https://streamable.com/e/noyaji?autoplay=1&muted=1&nocontrols=1"></iframe>
    <x-header :active="request() -> is ('/')"></x-header>
    <div class="lg:hidden">
        <div class="m-0">
            <img src="{{ asset('img/new_iphone_16_series_bg.jpg') }}" class="" alt="">
            <a href="/product" class="flex justify-center -mt-24" data-aos="fade-up" data-aos-duration="2000">
                <button class="text-xl mx-auto bg-blue-500 hover:bg-blue-600 font-bold py-3 px-6 rounded-full text-white">Lihat Produk</button>
            </a>
        </div>
        <div class=" justify-items-center my-40 px-24" data-aos="fade-up" data-aos-duration="2000">
            <img src="{{ asset('img/iphone_16_pro_series.png') }}" class="" alt="">

        </div>
        <div class=" justify-items-center my-40 px-24" data-aos="fade-up" data-aos-duration="2000">
            <img src="{{ asset('img/iphone_16_series.png') }}" class="" alt="">

        </div>
        <div class=" justify-items-center my-5" data-aos="fade-up" data-aos-duration="2000">
            <img src="{{ asset('img/new_iphone_bg.jpeg.jpg') }}" class="" alt="">

        </div>
    </div>
      <main class="lg:block hidden">
        <div class="justify-center p-10 my-48">
            @if(Auth::check())
                <p class="text-center text-7xl text-white font-bold uppercase2" data-aos="fade" data-aos-duration="2000">Hello, {{ Auth::user()->name }}</p>
            @else
                <p class="text-center text-7xl text-white font-bold uppercase2" data-aos="fade" data-aos-duration="2000">Welcome !</p>
            @endif
            <div class="flex justify-center my-10">
                <a href="{{ route('product') }}" class="bg-blue-500 hover:bg-blue-600 font-bold py-3 px-6 rounded-full" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="3000">
                    <button  class="text-xl text-white">Lihat Produk</button>
                </a>
            </div>
        </div>
      </main>
<x-the-script></x-the-script>
</body>
</html>
