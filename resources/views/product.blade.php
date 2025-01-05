<!DOCTYPE html>
<html lang="en">
<x-head>Product</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-Header></x-Header>
    <div class="">
        <div class="p-6 m-6 p-2 lg:w-3/4 mx-auto lg:rounded-lg bg-white md:w-full md:rounded-none">
            <h3 class="text-center mb-6 xl:text-2xl font-bold md:text-xl">Daftar Produk iPhone</h3>
            <div class="flex flex-wrap justify-evenly gap-3 overflow-hidden p-2 pb-4">
                @foreach ($iphones as $iphone)
                <a href="{{ route('productDetail', $iphone->unit_id) }}" class="hover:border rounded-md">
                <div class="p-1 gap-1 xl:min-w-64 md:min-w-48 sm:min-w-40 m-4" 
                    data-iphone-name="{{ $iphone->iphone_id }}" 
                    data-iphone-color="{{ $iphone->color_id }}" 
                    data-aos="fade-up" data-aos-duration="1000" data-aos-offset="200" data-aos-delay=150>
                    <img src="" class="w-full mx-auto" alt="">
                    <p class="w-fit font-bold xl:text-lg mx-auto md:text-sm">{{ $iphone->iphone_name }}</p>
                    <p class="w-fit py-1 px-2 my-1 rounded-md font-bold text-white xl:text-lg mx-auto md:text-sm" style="background-color: {{ $iphone->color_code }}">{{ $iphone->color }}</p>
                    <p class="w-fit py-1 px-2 my-1 rounded-md bg-blue-500 text-white font-bold xl:text-lg mx-auto md:text-sm">{{ $iphone->storage }}</p>
                    <p class="w-fit py-1 px-2 my-1 text-red-500 font-bold xl:text-lg mx-auto md:text-sm">{{ "Rp " . number_format($iphone->rent_price,0,',','.') }} | Hari</p>
                </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
<x-the-script></x-the-script>
<script>
const iphone_images = @json($iphone_colors);

const iphoneDivs = document.querySelectorAll('[data-iphone-name]');

iphoneDivs.forEach(div => {
    const name = div.getAttribute('data-iphone-name');
    const color = div.getAttribute('data-iphone-color');
    const match = iphone_images.find(img => img.iphone_id == name && img.unit_color_id == color);

    if (match) {
        const imgElement = div.querySelector('img');
        imgElement.src = match.img;
    }else{
        const imgElement = div.querySelector('img');
        imgElement.src = 'https://i.ibb.co.com/MC9BD2m/quest-icon.png';
    }
});
</script>
</body>
</html>
