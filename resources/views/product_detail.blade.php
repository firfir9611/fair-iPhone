<!DOCTYPE html>
<html lang="en">
<x-head>{{ $iphone->iphone_name }}</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-Header></x-Header>
    <div class="">
        <div class="p-6 m-6 p-2 lg:w-5/6 mx-auto lg:rounded-lg bg-white md:w-full md:rounded-none">
            <div class="md:flex justify-between gap-2" data-aos="fade-up" data-aos-duration="2000">
                <div class="py-2 min-w-fit justify-items-center">
                    <img src="{{ $image->img }}" class="xl:h-96 md:h-72 h-96" alt="">
                </div>
                <div class="w-full flex">
                    <div class="w-full py-5">
                    <p class="font-bold lg:text-xl md:text-sm md:px-10 px-5 py-2">{{ $iphone->iphone_name }}</p>
                        <div class="flex justify-start w-full">
                            <div class="md:px-10 px-5 xl:min-w-48 lg:min-w-16 min-w-12">
                                <p class="font-bold md:text-sm text-xs">Warna</p>
                                <p class="font-bold md:text-sm text-xs">Penyimpanan</p>
                                <p class="font-bold md:text-sm text-xs">Battery Health</p>
                                <p class="font-bold md:text-sm text-xs">Stok Tersedia</p>
                                <p class="font-bold md:text-sm text-xs">Selfie Cam</p>
                                <p class="font-bold md:text-sm text-xs">Rear Cam</p>
                                <p class="font-bold md:text-sm text-xs">Chipset</p>
                                <p class="font-bold md:text-sm text-xs">Dimensi</p>
                                <p class="font-bold md:text-sm text-xs">Layar</p>
                                <p class="font-bold md:text-sm text-xs">Versi iOS</p>
                                <p class="font-bold md:text-sm text-xs">Tgl Peluncuran</p>
                                <p class="font-bold md:text-sm text-xs">Harga</p>
                            </div>
                            <div class=" w-full">
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->color }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->storage }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->battery_health }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->unit_stok }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_selfie }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_rearcam }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_chipset}}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_dimention }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_display }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_os }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_launch_at }}</p>
                                <p class="font-bold md:text-sm text-xs">: <span class="text-red-500">{{ "Rp " . number_format($iphone->rent_price,0,',','.') }} | Hari</span></p>
                                <p class="font-bold md:text-sm text-xs">: <span class="text-red-500">{{ "Rp ".number_format((($iphone->rent_price*7)*0.9),0,',','.') }} | Minggu</span><span class="m-2 text-gray-400 line-through">{{ "Rp ".number_format(($iphone->rent_price*7),0,',','.') }} | Minggu</span></p>
                                <p class="font-bold md:text-sm text-xs">: <span class="text-red-500">{{ "Rp ".number_format((($iphone->rent_price*30)*0.85),0,',','.') }} | Bulan</span><span class="m-2 text-gray-400 line-through">{{ "Rp ".number_format(($iphone->rent_price*30),0,',','.') }} | Bulan</span></p>

                            </div>
                        </div>
                    </div>
                    <div class="w-fit md:px-10 px-5 py-10 justify-items-center">
                        <button class="py-2 md:min-w-40 min-w-20 my-1 md:text-base text-xs bg-blue-500 rounded-full text-white">Sewa Sekarang</button>
                    </div>
                </div>
            </div>
            <hr class="mt-2" data-aos="fade-up" data-aos-duration="2000">
        
    </div>
<x-the-script></x-the-script>
</body>
</html>
