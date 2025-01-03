<!DOCTYPE html>
<html lang="en">
<x-head>Product</x-head>
<body class="bg-gray-100 overflow-hidden">
    <x-Header></x-Header>
    <div class="">
        <div class="p-6 m-6 p-2 lg:w-5/6 mx-auto lg:rounded-lg bg-white md:w-full md:rounded-none">
        @for($i=0;$i<1;$i++)
            <div class="md:flex justify-between gap-2" data-aos="fade-up" data-aos-duration="2000">
                <div class="py-2 min-w-fit justify-items-center">
                    <img src="{{ asset('img/iPhone_images/Dummy/iPhone 16 Green.png') }}" class="xl:h-96 md:h-72 h-96" alt="">
                </div>
                <div class="w-full flex">
                    <div class="w-full py-5">
                    <p class="font-bold lg:text-xl md:text-sm md:px-10 px-5 py-2">Iphone 13 Pro Max</p>
                        <div class="flex justify-start w-full">
                            <div class="md:px-10 px-5 xl:min-w-48 lg:min-w-16 min-w-12">
                                <p class="font-bold md:text-sm text-xs">Color</p>
                                <p class="font-bold md:text-sm text-xs">Storage</p>
                                <p class="font-bold md:text-sm text-xs">Remaining</p>
                                <p class="font-bold md:text-sm text-xs">Selfie Cam</p>
                                <p class="font-bold md:text-sm text-xs">Rear Cam</p>
                                <p class="font-bold md:text-sm text-xs">Battery Health</p>
                                <p class="font-bold md:text-sm text-xs">Chipset</p>
                                <p class="font-bold md:text-sm text-xs">Dimention</p>
                                <p class="font-bold md:text-sm text-xs">Display</p>
                                <p class="font-bold md:text-sm text-xs">OS</p>
                                <p class="font-bold md:text-sm text-xs">Launch at</p>
                                <p class="font-bold md:text-sm text-xs">Price</p>
                            </div>
                            <div class=" w-full">
                                <p class="font-bold md:text-sm text-xs">:
                                    <select name="color" id="" class="font-bold md:text-sm text-xs -ml-1">
                                        <option value="sierra blue">Sierra Blue</option>
                                        <option value="sierra blue">Yellow</option>
                                        <option value="sierra blue">Green</option>
                                    </select>
                                </p>
                                <p class="font-bold md:text-sm text-xs">: 256GB</p>
                                <p class="font-bold md:text-sm text-xs">: 20</p>
                                <p class="font-bold md:text-sm text-xs">: 48MP, 4K60</p>
                                <p class="font-bold md:text-sm text-xs">: 12MP, 4K60</p>
                                <p class="font-bold md:text-sm text-xs">: 78%</p>
                                <p class="font-bold md:text-sm text-xs">: Apple A17 Pro</p>
                                <p class="font-bold md:text-sm text-xs">: 157.5x77.4x7.7mm</p>
                                <p class="font-bold md:text-sm text-xs">: Super Retina OLED, 1242x2688</p>
                                <p class="font-bold md:text-sm text-xs">: iOS 18.5.1</p>
                                <p class="font-bold md:text-sm text-xs">: 24 Sept 2024</p>
                                <p class="font-bold md:text-sm text-xs">: <span class="text-red-500">Rp 45.000 | Day</span></p>
                                <p class="font-bold md:text-sm text-xs">: <span class="text-red-500">Rp 300.000 | Week</span><span class="m-2 text-gray-400 line-through">Rp 315.000 | Week</span></p>
                                <p class="font-bold md:text-sm text-xs">: <span class="text-red-500">Rp 1.200.000 | Month</span><span class="m-2 text-gray-400 line-through">Rp 1.350.000 | Month</span></p>

                            </div>
                        </div>
                    </div>
                    <div class="w-fit md:px-10 px-5 py-10 justify-items-center">
                        <button class="py-2 md:min-w-40 min-w-20 my-1 md:text-base text-xs bg-blue-500 rounded-full text-white">Add to Wishlist</button>
                    </div>
                </div>
            </div>
            <hr class="mt-2" data-aos="fade-up" data-aos-duration="2000">
            @endfor
    </div>
<x-the-script></x-the-script>
</body>
</html>
