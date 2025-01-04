<!DOCTYPE html>
<html lang="en">
<x-head>Wishlist</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-Header></x-Header>
    <div class="py-6 lg:px-16 md:px-6 m-6 p-2 lg:w-3/4 md:w-full mx-auto lg:rounded-lg bg-white">
        <h3 class="text-center mb-6 text-2xl font-bold">Sedang Disewa</h3>
            @if($transactinos->isNotEmpty())
            @foreach($transactions as $transaction)
            <div class="md:flex justify-between gap-2" data-aos="fade-up" data-aos-duration="2000">
                <div class="py-2 min-w-fit justify-items-center">
                    <img src="https://i.ibb.co.com/hgX9HRC/15-pro-white-titanium.png" class="xl:h-60 md:h-48 h-60" alt="">
                    <p class="font-bold lg:text-xl md:text-sm text-center">{{ $transaction->iphone_name }}</p>
                    {{-- <input type="hidden" value="{{ $transaction->transaction_id }}" class="transaction_id"> --}}
                </div>
                <div class="w-full flex">
                    <div class="flex justify-start w-full">
                        <div class="md:px-10 px-5 py-10 xl:min-w-60 md:min-w-44 min-w-32">
                            <p class="font-bold lg:text-sm text-xs">Warna</p>
                            <p class="font-bold lg:text-sm text-xs">Penyimpanan</p>
                            <p class="font-bold lg:text-sm text-xs">Mulai Sewa</p>
                            <p class="font-bold lg:text-sm text-xs">Dikemalikan</p>
                            <p class="font-bold lg:text-sm text-xs">Lama Penyewaan</p>
                            <p class="font-bold lg:text-sm text-xs">Waktu Tersisa</p>
                            <p class="font-bold lg:text-sm text-xs">Total Biaya</p>
                        </div>
                        <div class=" py-10 w-full">
                            <p class="font-bold lg:text-sm text-xs">: {{ $transaction->color }}</p>
                            <p class="font-bold lg:text-sm text-xs">: {{ $transaction->storage }}</p>
                            <p class="font-bold lg:text-sm text-xs">: <span id="rent_start_{{ $transaction->transaction_id }}">{{ $transaction->rent_at }}</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span id="return_plan_{{ $transaction->transaction_id }}">{{ $transaction->return_plan }}</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span id="total_days_{{ $transaction->transaction_id }}">? Hari</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span id="days_remaining_{{ $transaction->transaction_id }}" class="text-red-500">? Hari Tersisa</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span class="text-red-500">{{ $transaction->total_paid }}</span></p>
                        </div>
                    </div>
                    <div class="w-fit md:px-10 px-5 py-10 justify-items-center">
                        <button class="py-2 md:min-w-28 min-w-20 my-1 md:text-base text-xs bg-blue-500 rounded-full text-white">Perpanjang</button>
                    </div>
                </div>
            </div>
            <hr class="mt-2" data-aos="fade-up" data-aos-duration="2000">
            @endforeach
            @endif
    </div>
    <div class="py-6 lg:px-16 md:px-6 m-6 p-2 lg:w-3/4 md:w-full mx-auto lg:rounded-lg bg-white">
        <h3 class="text-center mb-6 text-2xl font-bold">Siap Diambil</h3>
            @for($i=0;$i<4;$i++)
            <div class="md:flex justify-between gap-2" data-aos="fade-up" data-aos-duration="2000">
                <div class="py-2 min-w-fit justify-items-center">
                    <img src="{{ asset('img/iPhone_images/Dummy/iPhone 16 Pro Natural Titanium.png') }}" class="xl:h-60 md:h-48 h-60" alt="">
                    <p class="font-bold lg:text-xl md:text-sm text-center">Iphone 13 Pro Max</p>
                </div>
                <div class="w-full flex">
                    <div class="flex justify-start w-full">
                        <div class="md:px-10 px-5 py-10 xl:min-w-60 md:min-w-44 min-w-32">
                            <p class="font-bold lg:text-sm text-xs">Color</p>
                            <p class="font-bold lg:text-sm text-xs">Storage</p>
                            <p class="font-bold lg:text-sm text-xs">Rent Start at</p>
                            <p class="font-bold lg:text-sm text-xs">Rent Return at</p>
                            <p class="font-bold lg:text-sm text-xs">Duration</p>
                            <p class="font-bold lg:text-sm text-xs">Total Price</p>
                        </div>
                        <div class=" py-10 w-full">
                            <p class="font-bold lg:text-sm text-xs">: Sierra Blue</p>
                            <p class="font-bold lg:text-sm text-xs">: 256GB</p>
                            <p class="font-bold lg:text-sm text-xs">: <span class="text-red-500">24 November 2024</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span class="text-red-500">30 November 2024</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span class="text-red-500">6 Days</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span class="text-red-500">Rp 270.000</span></p>
                            <p class="mt-2 font-bold lg:text-sm text-xs">Jangan lupa untuk mengambil perangkat saat hari penyewaan!</p>
                        </div>
                    </div>
                    <div class="w-fit md:px-10 px-5 py-10 justify-items-center">
                        <button class="py-2 md:min-w-28 min-w-20 my-1 md:text-base text-xs bg-red-500 rounded-full text-white">Batalkan</button>
                    </div>
                </div>
            </div>
            <hr class="mt-2" data-aos="fade-up" data-aos-duration="2000">
            @endfor
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const transactions = @json($transactions); // Laravel Blade directive to pass PHP data to JavaScript

    transactions.forEach(transaction => {
        const rentStartElement = document.getElementById(`rent_start_${transaction.transaction_id}`);
        const returnPlanElement = document.getElementById(`return_plan_${transaction.transaction_id}`);
        const totalDaysElement = document.getElementById(`total_days_${transaction.transaction_id}`);
        const daysRemainingElement = document.getElementById(`days_remaining_${transaction.transaction_id}`);

        if (rentStartElement && returnPlanElement) {
            const rentStart = new Date(rentStartElement.textContent);
            const returnPlan = new Date(returnPlanElement.textContent);
            const today = new Date();

            // Calculate total days
            const totalDays = Math.ceil((returnPlan - rentStart) / (1000 * 60 * 60 * 24));
            totalDaysElement.textContent = `${totalDays} Hari`;

            // Calculate remaining days
            const daysRemaining = Math.ceil((returnPlan - today) / (1000 * 60 * 60 * 24));
            daysRemainingElement.textContent = daysRemaining > 0 ? `${daysRemaining} Hari Tersisa` : 'Waktu Habis';
        }
    });
     });

</script>
<x-the-script></x-the-script>
</body>
</html>
