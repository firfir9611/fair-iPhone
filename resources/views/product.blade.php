<!DOCTYPE html>
<html lang="en">
<x-Head>Product</x-Head>
<body class="bg-gray-100">
    <x-Header></x-Header>
    <div class="">
        {{-- <div class="p-6 m-6 p-2 lg:w-3/4 mx-auto lg:rounded-lg bg-white md:w-full md:rounded-none">
            <h3 class="text-center mb-6 xl:text-2xl font-bold md:text-xl">Iphone 16 Pro Max Series</h3>
            <div class="flex flex-wrap justify-evenly gap-5 overflow-hidden p-2 pb-4">
                @for($i = 0; $i < 10; $i++)
                <div class="bg-gray-100 p-4 pt-0 rounded-md xl:min-w-64 md:min-w-48 sm:min-w-40">
                    <span class="-ml-6 bg-red-500 px-3 py-0 rounded-full text-white {{ $i>2 ? 'opacity-0':'' }}">new!</span>
                    <a href=""><h5 class="text-center font-bold xl:text-lg md:text-sm hover:underline">Iphone 16 Pro Max</h5></a>
                    <img src="{{ asset('img/iPhone_images/15_pro_natural_titanium.png') }}" class="w-full" alt="">
                    <h6 class="text-red-500 font-bold xl:text-lg md:text-sm text-center">Rp 45.000/day</h6>
                    <p>available : 100</p>
                    <button class="bg-blue-500 py-1 px-2 rounded-md text-white text-sm">Add to wishlist</button>
                </div>
                @endfor
        </div> --}}
        <div class="p-6 m-6 p-2 lg:w-3/4 mx-auto lg:rounded-lg bg-white md:w-full md:rounded-none">
            <h3 class="text-center mb-6 xl:text-2xl font-bold md:text-xl">Iphone 16 Pro Max Series</h3>
            <div class="flex flex-wrap justify-evenly gap-5 overflow-hidden p-2 pb-4">
                @for($i = 0; $i < 10; $i++)
                <div class="p-4 pt-0 rounded-md xl:min-w-64 md:min-w-48 sm:min-w-40 justify-items-center m-4" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="200">
                    <img src="{{ asset('img/iPhone_images/15_pro_natural_titanium.png') }}" class="w-full" alt="">
                    <span class="px-3 py-0 rounded-full text-red-500 ml-12 {{ $i>2 ? 'opacity-0':'' }}">new!</span>
                    <a href=""><h5 class="text-center font-bold xl:text-lg md:text-sm hover:underline">Iphone 16 Pro Max</h5></a>
                    <h6 class="text-red-500 font-bold xl:text-lg md:text-sm text-center my-4">Rp 45.000 | day</h6>
                    <button class="bg-blue-500 py-2 px-6 rounded-3xl mx-auto text-white text-sm">More Info</button>
                </div>
                @endfor
        </div>
    </div>
<x-the-script></x-the-script>
</body>
</html>
