<!DOCTYPE html>
<html lang="en">
<x-Head>Welcome to Fair</x-Head>
<body class="bg-gray-100">
    <video class="hidden lg:block min-w-full min-h-full -z-10 fixed top-0" src="{{ asset('videos/introduce_new_iphone_16_series.mp4') }}" autoplay muted loop></video>
    <x-Header :active="request() -> is ('/')"></x-Header>
    <div class="lg:hidden">
        <div class=" justify-items-center">
            <img src="{{ asset('img/new_iphone_16_series_bg.jpg') }}" class="" alt="">
            <a href="/product" class="bg-blue-500 font-bold p-3 rounded-md relative bottom-24" data-aos="fade-up" data-aos-duration="2000"><button class="text-xl text-white">Go to Product</button></a>
        </div>
    </div>
      <main>
        <div class="flex justify-center p-10">
            <a href="/product" class=" hidden lg:block bg-blue-500 font-bold p-3 rounded-md fixed bottom-64" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="3000">
                <button  class="text-xl text-white">Go to Product</button>
            </a>
        </div>
      </main>
<x-the-script></x-the-script>
</body>
</html>
