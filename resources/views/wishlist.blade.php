<!DOCTYPE html>
<html lang="en">
<x-head>Wishlist</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-Header></x-Header>
    <div class="py-6 lg:px-16 md:px-6 m-6 p-2 lg:w-3/4 md:w-full mx-auto lg:rounded-lg bg-white">
        <h3 class="text-center mb-6 text-2xl font-bold">Your Wishlist</h3>
            @foreach ($wish as $wishlist)
            <div class="md:flex justify-between gap-2" data-aos="fade-up" data-aos-duration="2000">
                <div class="py-2 min-w-fit justify-items-center">
                    <img src="{{ asset($wishlist->img) }}" class="xl:h-60 md:h-48 h-60" alt="">
                    <p class="font-bold lg:text-xl md:text-sm text-center">{{ $wishlist->name }}</p>
                </div>
                <div class="w-full flex">
                    <div class="flex justify-start w-full">
                        <div class="md:px-10 px-5 py-10 xl:min-w-48 lg:min-w-16 min-w-12">
                            <p class="font-bold md:text-sm text-xs">Warna</p>
                            <p class="font-bold md:text-sm text-xs">Penyimpanan</p>
                            <p class="font-bold md:text-sm text-xs">Mulai Sewa</p>
                            <p class="font-bold md:text-sm text-xs">Dikembalikan</p>
                            <p class="font-bold md:text-sm text-xs">Lama Penyewaan</p>
                            <p class="font-bold md:text-sm text-xs">Total Harga</p>
                        </div>
                        <div class=" py-10 w-full">
                            <p class="font-bold md:text-sm text-xs">: {{ $wishlist->color }}</p>
                            <p class="font-bold md:text-sm text-xs">: {{ $wishlist->storage }}</p>
                            <p class="font-bold md:text-sm text-xs">: <input type="date" name="" id="" class=""></p>
                            <p class="font-bold md:text-sm text-xs">: <input type="date" name="" id="" class=""></p>
                            <p class="font-bold md:text-sm text-xs">: 20 Hari</p>
                            <p class="font-bold md:text-sm text-xs">: <span class="ml-1 text-red-500">Rp {{ $wishlist->rent_price }} | hari</span></p>
                            {{-- <p class="mt-2 font-bold md:text-sm text-xs">!</p> --}}

                        </div>
                    </div>
                    <div class="w-fit md:px-10 px-5 py-10 justify-items-center">
                        <button class="py-2 md:min-w-28 min-w-20 my-1 md:text-base text-xs bg-red-500 rounded-full text-white">Delete</button><br>
                        <button class="py-2 md:min-w-28 min-w-20 my-1 md:text-base text-xs bg-blue-500 rounded-full text-white">Book Now</button>
                    </div>
                </div>
            </div>
            <hr class="mt-2" data-aos="fade-up" data-aos-duration="2000">
            @endforeach
    </div>
<x-the-script></x-the-script>
</body>
</html>
