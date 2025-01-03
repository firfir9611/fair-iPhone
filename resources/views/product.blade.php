<!DOCTYPE html>
<html lang="en">
<x-head>Product</x-head>
<body class="bg-gray-100">
    <x-Header></x-Header>
    <div class="">
        <div class="p-6 m-6 p-2 lg:w-3/4 mx-auto lg:rounded-lg bg-white md:w-full md:rounded-none">
            <h3 class="text-center mb-6 xl:text-2xl font-bold md:text-xl">Iphone 15 Series</h3>
            <div class="flex flex-wrap justify-evenly gap-5 overflow-hidden p-2 pb-4">
                @foreach ($iphones as $iphone)
                <div class="p-4 pt-0 rounded-md gap-1 xl:min-w-64 md:min-w-48 sm:min-w-40 m-4" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="200" data-aos-delay=150>
                    {{-- <img src="{{ asset('storage/'.$iphone->img_front) }}" class="w-full mx-auto" alt=""> --}}
                    <img src="{{ $iphone->img }}" class="w-full mx-auto" alt="">
                    <p class="w-fit font-bold xl:text-lg mx-auto md:text-sm hover:underline">{{ $iphone->iphone_name }}</p>
                    <p class="w-fit py-1 px-2 my-1 rounded-md font-bold text-white xl:text-lg mx-auto md:text-sm hover:underline" style="background-color: {{ $iphone->color_code }}">{{ $iphone->color }}</p>
                    <p class="w-fit py-1 px-2 my-1 rounded-md bg-blue-500 text-white font-bold xl:text-lg mx-auto md:text-sm hover:underline">{{ $iphone->storage }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
<x-the-script></x-the-script>
</body>
</html>
