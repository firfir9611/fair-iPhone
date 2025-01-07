<!DOCTYPE html>
<html lang="en">
<x-head>Penyewaan Berlangsung</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-Header></x-Header>
    <div class="py-6 lg:px-16 md:px-6 m-6 p-2 lg:w-3/4 md:w-full mx-auto lg:rounded-lg bg-white">
        <h3 class="text-center mb-6 text-2xl font-bold">Sedang Disewa</h3>
            @if($transactions->isNotEmpty())
            @foreach($transactions as $transaction)
            
            <div class="md:flex justify-between gap-2" data-aos="fade-up" data-aos-duration="2000">
                <div class="py-2 min-w-fit justify-items-center">
                    <img src="" id="img_{{ $transaction->transaction_id }}" class="xl:h-60 md:h-48 h-60" alt="">
                    <p class="font-bold lg:text-xl md:text-sm text-center">{{ $transaction->iphone_name }}</p>
                    <input type="hidden" value="{{ $transaction->unit_id }}" id="unit_id_{{ $transaction->transaction_id }}">
                    <input type="hidden" value="{{ $transaction->iphone_id }}" id="iphone_id_{{ $transaction->transaction_id }}">
                    <input type="hidden" value="{{ $transaction->color_id }}" id="color_id_{{ $transaction->transaction_id }}">
                    
                </div>
                <div class="w-full">
                    <div class="flex justify-start mb-5 w-full">
                        <div class="md:px-10 px-5 pt-10 w-1/2">
                            <p class="font-bold lg:text-sm text-xs">Warna</p>
                            <p class="font-bold lg:text-sm text-xs">Penyimpanan</p>
                            <p class="font-bold lg:text-sm text-xs">Mulai Sewa</p>
                            <p class="font-bold lg:text-sm text-xs">Dikembalikan</p>
                            <p class="font-bold lg:text-sm text-xs">Lama Penyewaan</p>
                            <p class="font-bold lg:text-sm text-xs">Waktu Tersisa</p>
                            <p class="font-bold lg:text-sm text-xs">Total Biaya</p>
                        </div>
                        <div class=" pt-10 w-1/2">
                            <p class="font-bold lg:text-sm text-xs">: {{ $transaction->color }}</p>
                            <p class="font-bold lg:text-sm text-xs">: {{ $transaction->storage }}</p>
                            <p class="font-bold lg:text-sm text-xs">: <span id="rent_start_{{ $transaction->transaction_id }}">{{ $transaction->rent_at }}</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span id="return_plan_{{ $transaction->transaction_id }}">{{ $transaction->return_plan }}</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span id="total_days_{{ $transaction->transaction_id }}">? Hari</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span id="days_remaining_{{ $transaction->transaction_id }}" class="">? Hari Tersisa</span></p>
                            <p class="font-bold lg:text-sm text-xs">: <span class="">{{  "Rp " . number_format($transaction->total_paid,0,',','.')  }}</span></p>
                            <p class="font-bold lg:text-sm text-xs"><span id="pinalty_{{ $transaction->transaction_id }}" class="text-red-500"></span></p>
                        </div>
                    </div>
                    <div class="w-full p-2 flex justify-end">
                        {{-- @if(session('success'.$transaction->transaction_id))
                            <div class="flex justify-center mb-4">
                                <p class="font-bold text-red-500">{{ session('success'.$transaction->transaction_id) }}</p>
                            </div>
                            @endif --}}
                            <div class="w-1/2">
                                <form action="{{ route('returnRequestSend', $transaction->transaction_id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="" name="penalty" id="pinalty_input_{{ $transaction->transaction_id }}">
                                    @if( $transaction->status == 0 )
                                    <button class="py-2 px-4 md:text-base text-xs bg-blue-500 rounded-md text-white return_btn" type="submit">Kembalikan Sekarang</button>
                                    @endif
                                </form>
                                @if( $transaction->status == 1 )
                                <form action="{{ route('returnRequestSendCancel', $transaction->transaction_id) }}" method="POST">
                                    @csrf
                                    <p class="font-bold mb-2 text-green-500">Permintaan terkirim!, tunggu admin mengonfirmasi pengembalian</p>
                                    <button class="py-2 px-4 md:text-base text-xs bg-gray-500 rounded-md text-white cancel_btn" type="submit">Batalkan Permintaan</button>
                                </form>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
            
            <hr class="mt-2" data-aos="fade-up" data-aos-duration="2000">
            @endforeach
            @else
            <p>No Data</p>
            @endif
    </div>
    <x-footer></x-footer>
<script>
    const cancelButtons = document.getElementsByClassName('cancel_btn');

// Iterasi setiap tombol
Array.from(cancelButtons).forEach(function(button) {
    button.addEventListener('click', function(event) {
        setTimeout(function() {
            const clickedButton = event.target;
            clickedButton.disabled = true;
            clickedButton.style.backgroundColor = '#A0AEC0';
            clickedButton.innerHTML = 'Membatalkan Permintaan';
        }, 50);
    });
});
    const returnButtons = document.getElementsByClassName('return_btn');

// Iterasi setiap tombol
Array.from(returnButtons).forEach(function(button) {
    button.addEventListener('click', function(event) {
        setTimeout(function() {
            const clickedButton = event.target;
            clickedButton.disabled = true;
            clickedButton.style.backgroundColor = '#A0AEC0';
            clickedButton.innerHTML = 'Mengirim Permintaan';
        }, 50);
    });
});

    
    document.addEventListener('DOMContentLoaded', function () {
        const transactions = @json($transactions);
        const iphone_colors = @json($iphone_colors);


        transactions.forEach(transaction => {
            const rentStartElement = document.getElementById(`rent_start_${transaction.transaction_id}`);
            const returnPlanElement = document.getElementById(`return_plan_${transaction.transaction_id}`);
            const totalDaysElement = document.getElementById(`total_days_${transaction.transaction_id}`);
            const daysRemainingElement = document.getElementById(`days_remaining_${transaction.transaction_id}`);
            const name = document.getElementById(`iphone_id_${transaction.transaction_id}`);
            const color = document.getElementById(`color_id_${transaction.transaction_id}`);
            const pinalty = document.getElementById(`pinalty_${transaction.transaction_id}`);
            const pinaltyInput = document.getElementById(`pinalty_input_${transaction.transaction_id}`);
            const imgSrc = document.getElementById(`img_${transaction.transaction_id}`);
            const match = iphone_colors.find(img => img.iphone_id == name.value && img.unit_color_id == color.value);

            if (match) {
                imgSrc.src = match.img;
            }else{
                imgSrc.src = 'https://i.ibb.co.com/MC9BD2m/quest-icon.png';
            }

            if (rentStartElement && returnPlanElement) {
                const rentStart = new Date(rentStartElement.textContent);
                const returnPlan = new Date(returnPlanElement.textContent);
                const today = new Date();

                // Calculate total days
                const totalDays = Math.ceil((returnPlan - rentStart) / (1000 * 60 * 60 * 24));
                totalDaysElement.textContent = `${totalDays} Hari`;

                // Calculate remaining days
                const daysRemaining = Math.ceil((returnPlan - today) / (1000 * 60 * 60 * 24));
                daysRemainingElement.textContent = daysRemaining > 0 ? `${daysRemaining} Hari Tersisa` : (`${daysRemaining}`*-1)+' Hari Terlewat!, Pengembalian Terlambat';
                if(daysRemaining < 3 && daysRemaining > 0) {
                    daysRemainingElement.classList.add('text-orange-300');
                }else if(daysRemaining < 1){
                    daysRemainingElement.classList.add('text-red-500');
                } 
                if(daysRemaining < 0){
                    const p = (-1*daysRemaining)*(`${transaction.rent_price}`*0.1);
                    pinaltyInput.value = p;
                    pinalty.textContent = `Denda Rp ${p.toLocaleString('id-ID')}`;
                }


            }
        });
    });

</script>
<x-the-script></x-the-script>
</body>
</html>
