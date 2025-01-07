<!DOCTYPE html>
<html lang="en">
<x-head>{{ $iphone->iphone_name }}</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-Header></x-Header>
    <div class="">
        <div class="p-6 m-6 p-2 lg:w-5/6 mx-auto lg:rounded-lg bg-white md:w-full md:rounded-none">
            <p class="text-center font-bold text-lg">Rincian Produk</p>
            <div class="md:flex justify-between gap-2" data-aos="fade-up" data-aos-duration="2000">
                <div class="py-2 min-w-fit justify-items-center">
                    <img src="{{ $image->img }}" class="xl:h-96 md:h-72 h-96" alt="">
                </div>
                <div class="w-full flex">
                    <div class="w-full py-5">
                    <p class="font-bold lg:text-xl md:text-sm md:px-10 px-5 py-2">{{ $iphone->iphone_name }}</p>
                        <div class="flex justify-start w-full">
                            <div class="md:px-10 px-5 w-1/2">
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
                            <div class=" w-1/2">
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->color }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->storage }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->battery_health }}</p>
                                <p class="font-bold md:text-sm text-xs {{ $iphone->unit_stok < 1 ? 'text-red-500':'' }}">: {{ $iphone->unit_stok }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_selfie }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_rearcam }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_chipset}}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_dimention }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_display }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_os }}</p>
                                <p class="font-bold md:text-sm text-xs">: {{ $iphone->iphone_launch_at }}</p>
                                <p class="font-bold md:text-sm text-xs">: <span class="text-red-500">{{ "Rp " . number_format($iphone->rent_price,0,',','.') }} | Hari</span></p>
                                {{-- <p class="font-bold md:text-sm text-xs">: <span class="text-red-500">{{ "Rp ".number_format((($iphone->rent_price*7)*0.9),0,',','.') }} | Minggu</span><span class="m-2 text-gray-400 line-through">{{ "Rp ".number_format(($iphone->rent_price*7),0,',','.') }} | Minggu</span></p>
                                <p class="font-bold md:text-sm text-xs">: <span class="text-red-500">{{ "Rp ".number_format((($iphone->rent_price*30)*0.85),0,',','.') }} | Bulan</span><span class="m-2 text-gray-400 line-through">{{ "Rp ".number_format(($iphone->rent_price*30),0,',','.') }} | Bulan</span></p> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="w-fit md:px-10 px-5 py-10 justify-items-center">
                        <button class="py-2 md:min-w-40 min-w-20 my-1 md:text-base text-xs bg-blue-500 rounded-full text-white">Sewa Sekarang</button>
                    </div> --}}
                </div>
            </div>
            <hr class="mt-2 mb-4">
            <form id="transaction_start" action="{{ route('productTransactionStart') }}" method="POST">
            @csrf
            <input type="hidden" name="unit_id" value="{{ $iphone->unit_id }}">
            <input type="hidden" required name="rented_price_input" id="rented_price_input" value="">
            <input type="hidden" required name="total_price_input" id="total_price_input" value="">
            <input type="hidden" required name="rented_battery_health" id="rented_battery_health" value="{{ $iphone->battery_health }}">
            <div data-aos="fade-up" data-aos-duration="2000">
                <p class="text-lg font-bold mb-2">Metode pembayaran</p>
                <div class="flex flex-wrap gap-4 mb-4">
                    <label class="flex items-center w-72 text-2x1 font-bold p-4 border-2 rounded-lg cursor-pointer hover:border-gray-400 focus-within:ring-2 focus-within:ring-indigo-500">
                      <input type="radio" name="payment" checked value="qris" class="hidden peer" />
                      <div class="h-16 border-2 rounded-md flex justify-center items-center overflow-hidden mr-3 peer-checked:border-indigo-500">
                        <img src="https://i.ibb.co.com/4KDXMcN/qris.jpg" class="h-full" alt="qris">
                      </div>
                      QRIS
                    </label>
                    <label class="flex items-center w-72 text-2x1 font-bold p-4 border-2 rounded-lg cursor-pointer hover:border-gray-400 focus-within:ring-2 focus-within:ring-indigo-500">
                      <input type="radio" name="payment" value="kidney" class="hidden peer" />
                      <div class="h-16 border-2 rounded-md flex justify-center items-center overflow-hidden mr-3 peer-checked:border-indigo-500">
                        <img src="https://i.ibb.co.com/kXtrwsn/kidney.jpg" class="h-full" alt="qris">
                      </div>
                      Ginjal :)
                    </label>
                </div>
            </div>
            <hr class="mb-4">    
            <div data-aos="fade-up" data-aos-duration="2000">
                <p class="font-bold text-lg mb-2">Durasi Penyewaan</p>
                <div class="mb-4">
                  <label for="price">Harga per hari</label>
                  <input type="number" value="{{ $iphone->rent_price }}" id="price" readonly required class="p-2 rounded-md border" name="rent_price">
                </div>      
                <div class="mb-4">
                  <label for="rent_start">Mulai Sewa</label>
                  <input type="date" id="rent_start" required readonly class="p-2 rounded-md border" name="rent_start">
                </div>      
                <div class="mb-4">
                  <label for="return_plan">Rencana Pengembalian</label>
                  <input type="date" id="return_plan" required class="p-2 rounded-md border" name="return_plan">
                </div>
                <div class="mb-4">
                  <label for="total_days">Total Hari :</label>
                  <input type="text" required readonly id="total_days" value="">
                </div>
                <div class="mb-4">
                  <label for="total_price">Total Harga :</label>
                  <input type="text" required readonly id="total_price" name="total_price" value="">
                </div>
            </div>
            <hr class="mb-4">
            <div data-aos="fade-up" data-aos-duration="2000">
                <p class="font-bold text-lg mb-2">Rincian Penyewaan</p>
                <div class="flex justify-center gap-2 mb-4">
                    <div class="w-1/2">
                        <p>Unit</p>
                        <p>Tanggal Mulai Sewa</p>
                        <p>Tanggal Pengembalian</p>
                        <p>Total Hari</p>
                        <p>Total Biaya</p>
                    </div>
                    <div class="w-1/2 text-right">
                        <p>{{ $iphone->iphone_name.' '.$iphone->color.' '.$iphone->storage }}</p>
                        <p id="rent_start_txt">0</p>
                        <p id="return_plan_txt">0</p>
                        <p id="total_days_txt">0</p>
                        <p id="total_price_txt_1">0</p>
                    </div>
                </div>
                <p class="font-bold text-lg">Rincian Biaya Penyewaan</p>
                <div class="flex justify-center gap-2 mb-4">
                    <div class="w-1/2">
                        <p>Total biaya sewa</p>
                        <p>PPN (12%)</p>
                        <p></p>
                    </div>
                    <div class="w-1/2 text-right">
                        <p id="total_price_txt_2">0</p>
                        <p id="total_ppn_txt">0</p>
                        <p class="mt-1 pt-1 border-t font-bold" id="final_price_txt">0</p>
                    </div>
                </div>
                @if(Auth::check())
                <div class="flex justify-center mb-4">
                  @if($iphone->unit_stok > 1)
                    <button onclick="open_popup_add()" class="bg-blue-500 rounded-md px-4 py-2 font-bold text-white" type="button">Bayar Sekarang</button>
                  @else
                    <button class="bg-gray-500 rounded-md px-4 py-2 font-bold text-white" disabled>Unit Habis</button>
                    @endif
                </div>
                @else
                <p class="font-bold text-red-500">Login untuk melakukan penyewaan!</p>
                @endif
                <p id="checkout_notes" class="font-bold text-red-500"></p>
            </div>
            <div id="popup-add" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
              <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md z-20">
                  <div id="qris_opt" class="hidden">
                    <h2 class="text-2xl font-bold mb-4">Bayar Menggunakan QRIS</h2>
                    <div class="flex justify-center">
                      <img src="https://i.ibb.co.com/H40cDs3/Qris-Rhiu.jpg" class="w-48 rounded-md">
                    </div>
                    <p id="payment_notes" class="text-center">Menunggu pembayaran</p>
                    {{-- <div class="flex justify-between">
                      <button type="button" onclick="close_popup_add()" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Batal</button>
                      <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Lanjut</button>
                    </div> --}}
                  </div>
                  <div id="kidney_opt" class="hidden">
                    <h2 class="text-2xl font-bold my-4">Get Some Help XD</h2>
                    <div class="flex justify-between">
                      <button type="button" onclick="close_popup_add()" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Ok</button>
                      {{-- <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Lanjut</button> --}}
                    </div>
                  </div>
              </div>
          </div>
        </form>
    </div>
    <x-footer></x-footer>
    <script>
        function open_popup_add() {
          const return_plan = document.getElementById('return_plan').value.trim();  
          if(return_plan){
          document.getElementById('popup-add').classList.remove('hidden');
            var payment = document.querySelector('input[name="payment"]:checked');

            if(payment.value == 'qris'){
              document.getElementById('qris_opt').classList.remove('hidden');
              setTimeout(function(){
                document.getElementById('payment_notes').innerHTML = 'Pembayaran Berhasil';
                setTimeout(function(){
                  document.getElementById('transaction_start').submit();
                }, 2000);
            }, 5000);
            }else if(payment.value == 'kidney'){
              document.getElementById('kidney_opt').classList.remove('hidden');
            }
          }else{
            document.getElementById('checkout_notes').innerHTML = 'Tentukan tanggal pengembalian sebelum melakukan pembayaran!';
          }

        }
        function close_popup_add() {
          var payment = document.querySelector('input[name="payment"]:checked');
          if(payment.value == 'qris'){
            document.getElementById('qris_opt').classList.add('hidden');
          }else if(payment.value == 'kidney') {
            document.getElementById('kidney_opt').classList.add('hidden');
          }
          document.getElementById('popup-add').classList.add('hidden');
        }


        // Ambil elemen input dan elemen untuk menampilkan hasil
        const rentStartInput = document.getElementById('rent_start');
        const rentStartInputTxt = document.getElementById('rent_start_txt');
        const returnPlanInput = document.getElementById('return_plan');
        const returnPlanInputTxt = document.getElementById('return_plan_txt');
        const totalDaysElement = document.getElementById('total_days');
        const totalDaysElementTxt = document.getElementById('total_days_txt');
        const totalPriceElement = document.getElementById('total_price');
        const totalPriceElementTxt1 = document.getElementById('total_price_txt_1');
        const totalPriceElementTxt2 = document.getElementById('total_price_txt_2');
        const totalPriceInput = document.getElementById('total_price_input');
        const priceInput = document.getElementById('price');
        const totalPpnTxt = document.getElementById('total_ppn_txt');
        const finalPriceTxt = document.getElementById('final_price_txt');
        const rentedPriceInput = document.getElementById('rented_price_input');
      
        // Fungsi untuk menghitung total hari dan total harga
        function calculateTotal() {
          const rentStartDate = new Date(rentStartInput.value);
          const returnPlanDate = new Date(returnPlanInput.value);
          const dailyPrice = parseFloat(priceInput.value) || 0;
      
          if (rentStartDate && returnPlanDate && returnPlanDate >= rentStartDate) {
            const timeDifference = returnPlanDate - rentStartDate;
            const totalDays = Math.ceil(timeDifference / (1000 * 60 * 60 * 24)); // Konversi ke hari
            const totalPrice = totalDays * dailyPrice;
            const ppnPrice = totalPrice * 0.12;
            const finalPrice = totalPrice * 1.12;
            // Tampilkan hasil
            totalDaysElement.value = `${totalDays}`;
            totalDaysElementTxt.innerHTML = `${totalDays} Hari`;
            totalPriceElement.value = `${totalPrice}`;
            totalPriceElementTxt1.innerHTML = `Rp ${totalPrice.toLocaleString('id-ID')}`;
            totalPriceElementTxt2.innerHTML = `Rp ${totalPrice.toLocaleString('id-ID')}`;
            totalPpnTxt.innerHTML = `Rp ${ppnPrice.toLocaleString('id-ID')}`;
            finalPriceTxt.innerHTML = `Total Biaya Akhir : Rp ${finalPrice.toLocaleString('id-ID')}`;
            returnPlanInputTxt.innerHTML = returnPlanInput.value;
            rentedPriceInput.value = totalPrice;
            totalPriceInput.value = finalPrice;
          } else {
            totalDaysElement.value = 0;
            totalDaysElementTxt.innerHTML = `0 Hari`;
            totalPriceElement.value = 0;
            totalPriceElementTxt1.innerHTML = `Rp 0`;
            totalPriceElementTxt2.innerHTML = `Rp 0`;
            totalPpnTxt.innerHTML = `Rp 0`;
            finalPriceTxt.innerHTML = `Rp 0`;
            rentedPriceInput.value = 0;
            totalPriceInput.value = 0;
          }
        }
        function setDefaultRentStartDate() {
          const today = new Date();
          const yyyy = today.getFullYear();
          const mm = String(today.getMonth() + 1).padStart(2, '0');
          const dd = String(today.getDate()).padStart(2, '0');
          const todayFormatted = `${yyyy}-${mm}-${dd}`;
                
          rentStartInput.value = todayFormatted; // Atur nilai default
          rentStartInputTxt.innerHTML = todayFormatted;
        }
    
        // Fungsi untuk mengatur minimal tanggal rencana pengembalian
        function setReturnPlanMinDate() {
          const rentStartDate = new Date(rentStartInput.value);
          const minReturnDate = new Date(rentStartDate);
          minReturnDate.setDate(minReturnDate.getDate() + 1); // Tambahkan 1 hari
        
          const yyyy = minReturnDate.getFullYear();
          const mm = String(minReturnDate.getMonth() + 1).padStart(2, '0');
          const dd = String(minReturnDate.getDate()).padStart(2, '0');
          const minDateFormatted = `${yyyy}-${mm}-${dd}`;
        
          returnPlanInput.setAttribute('min', minDateFormatted); // Atur minimal tanggal
          if (new Date(returnPlanInput.value) < minReturnDate) {
            returnPlanInput.value = minDateFormatted; // Reset jika tanggal tidak valid
          }
        }
      
        document.addEventListener('DOMContentLoaded', () => {
            setDefaultRentStartDate();
            setReturnPlanMinDate();
            calculateTotal();
          });
      
          // Update batas minimal tanggal pengembalian saat halaman dimuat
          rentStartInput.addEventListener('change', setReturnPlanMinDate);
                // Tambahkan event listener pada perubahan input
                rentStartInput.addEventListener('change', calculateTotal);
                returnPlanInput.addEventListener('change', calculateTotal);
                priceInput.addEventListener('input', calculateTotal);
      </script>
<x-the-script></x-the-script>
</body>
</html>
