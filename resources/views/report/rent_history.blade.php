<!DOCTYPE html>
<html lang="en">
<x-head>Riwayat Penyewaan</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-header></x-header>
        <div class="w-fit mx-auto items-center flex flex-wrap px-4 py-2 gap-4 my-4 bg-white rounded-md p-8 print:hidden">
            <label for="by" class="text-lg">Cari Berdasarkan : </label>
            <select name="search_by" id="search_by" class="border rounded-md p-2">
                <option value="name">Nama iPhone</option>
                <option value="date">Rentang Tanggal</option>
            </select>
            <div id="by-date" >
                <form action="{{ route('reportRentHistorySearchDate') }}" method="POST" class="w-fit items-center flex flex-wrap px-4 gap-2">
                @csrf
                <label for="date_range" class="text-lg"> : </label>
                <select name="opt" id="opt" class="border rounded-md p-2">
                    <option value="rent_at">Mulai Sewa</option>
                    <option value="return_at">Pengembalian</option>
                </select>
                <div class="flex gap-2 items-center">
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="p-2 border rounded-md" required>
                    <label for=""> - </label>
                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="p-2 border rounded-md" required>
                </div>
                <div class="flex gap-2">
                    <button id="search_btn_1" type="submit" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 py-1 px-2 rounded-md underline">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path id="search_btn_icon_1" strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
                </form>
            </div>
            <div id="by-name" >
                <form action="{{ route('reportRentHistorySearchName') }}" method="POST" class="w-fit items-center flex flex-wrap px-4 gap-2">
                @csrf
                <label for="date_range" class="text-lg"> : </label>
                <div class="flex gap-2">
                    <select name="name" id="name_search" class="border rounded-md p-2">
                        @if($iphones->isNotEmpty())
                        @foreach($iphones as $iphone)
                        <option value="{{ $iphone->name }}">{{ $iphone->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="flex gap-2">
                    <button id="search_btn_2" type="submit" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 py-1 px-2 rounded-md underline">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path id="search_btn_icon_2" strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
                </form>
            </div>
            <button id="print_btn" type="button" onclick="printPage()" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 py-1 px-2 rounded-md underline">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                    <path id="print_btn_icon" strokeLinecap="round" strokeLinejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                </svg>
            </button>
        </div>
        </div>
    
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <p class="font-bold text-2xl text-center mb-4">Riyawat Penyewaan iPhone</p>
        <div class="flex flex-wrap justify-center gap-4">
        <div class="flex mt-4 mb-1 justify-items-start">
            @if($description)
            <p>{{ $description }}</p>
            @endif
        </div>
        <div class="overflow-x-scroll print:overflow-visible">
            <table class="bg-white w-full mx-auto min-w-max table-auto text-left print:scale-75">
                <thead>
                    <tr>
                        <x-table-header>ID Transaksi</x-table-header>
                        <x-table-header>Nama Pengguna</x-table-header>
                        <x-table-header>Nama Unit</x-table-header>
                        <x-table-header>Tanggal Rental</x-table-header>
                        <x-table-header>Tanggal Harus Kembali</x-table-header>
                        <x-table-header>Tanggal Kembali</x-table-header>
                        <x-table-header>Lama Penyewaan</x-table-header>
                        <x-table-header>Total Pembayaran</x-table-header>
                    </tr>
                </thead>
                <tbody>
                    @if($transactions->isNotEmpty())
                    @foreach ($transactions as $transaction)
                        <tr>
                            <x-table-contents><span id="transaction_id_{{ $transaction->transaction_id }}">{{ $transaction->transaction_id }}</span></x-table-contents>
                            <x-table-contents>{{ $transaction->user_name }}</x-table-contents>
                            <x-table-contents>{{ $transaction->iphone_name.' '.$transaction->color.' '.$transaction->storage }}</x-table-contents>
                            <x-table-contents><span class="rent_at_{{ $transaction->transaction_id }}">{{ $transaction->rent_at }}</span></x-table-contents>
                            <x-table-contents><span class="return_plan_{{ $transaction->transaction_id }}">{{ $transaction->return_plan }}</span></x-table-contents>
                            <x-table-contents><span class="return_at_{{ $transaction->transaction_id }}">{{ $transaction->return_at }}</span></x-table-contents>
                            <x-table-contents><span id="total_days_{{ $transaction->transaction_id }}"></span></x-table-contents>
                            <x-table-contents>{{ "Rp " . number_format($transaction->total_paid,0,',','.') }}</x-table-contents>
                        </tr>
                    @endforeach
                    @else
                    <p class="text-center text-2x1 text-gray-600 font-bold">Tidak ada data ditemukan!</p>
                    @endif
              </tbody>
            </table>
        </div>
        </div>
    </div>
{{-- <x-footer></x-footer> --}}
<script>
function printPage() {
    window.print();
}

document.getElementById('search_btn_1').addEventListener('click', function (event) {
        const searchBtnIcon1 = document.getElementById('search_btn_icon_1');
        setTimeout(function(){
            const button = event.target;
            button.disabled = true;
            // button.style.backgroundColor = '#A0AEC0';
            // button.classList.remove('text-blue-500');
            // button.classList.add('text-white');
            searchBtnIcon1.setAttribute('d','M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99');
        }, 50);
    });
document.getElementById('search_btn_2').addEventListener('click', function (event) {
        const searchBtnIcon2 = document.getElementById('search_btn_icon_2');
        const nameSearch = document.getElementById('name_search').value.trim();
        if (!nameSearch) {
            return;
        }
        setTimeout(function(){
            const button = event.target;
            button.disabled = true;
            // button.style.backgroundColor = '#A0AEC0';
            // button.classList.remove('text-blue-500');
            // button.classList.add('text-white');
            searchBtnIcon2.setAttribute('d','M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99');
        }, 50);
    });

document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua transaksi yang ada di tabel
    const transactions = document.querySelectorAll("tbody tr");
    const today = new Date().toISOString().split("T")[0];
    document.getElementById('start_date').value = today;
    document.getElementById('end_date').value = today;

    transactions.forEach(function (transaction) {
        // Ambil ID transaksi
        const transactionId = transaction.querySelector("td:first-child p").innerText.trim();

        // Ambil tanggal awal penyewaan dan tanggal rencana pengembalian
        const rentAt = transaction.querySelector(`.rent_at_${transactionId}`).innerText.trim();
        const returnAt = transaction.querySelector(`.return_at_${transactionId}`).innerText.trim();

        // Konversi tanggal ke objek Date
        const rentDate = new Date(rentAt);
        const returnDate = new Date(returnAt);

        // Hitung total hari
        const timeDifference = returnDate - rentDate; // Hasil dalam milidetik
        const totalDays = Math.ceil(timeDifference / (1000 * 60 * 60 * 24)); // Konversi ke hari

        // Tampilkan total hari di kolom terkait
        const totalDaysElement = document.getElementById(`total_days_${transactionId}`);
        if (!isNaN(totalDays)) {
            totalDaysElement.innerText = totalDays+' Hari';
        } else {
            totalDaysElement.innerText = "Tanggal tidak valid";
        }
    });

    const searchBy = document.getElementById("search_by");
    const byDate = document.getElementById("by-date");
    const byName = document.getElementById("by-name");

    function toggleSearchFields() {
        const selectedValue = searchBy.value;

        if (selectedValue === "date") {
            byDate.classList.remove("hidden");
            byName.classList.add("hidden");
        } else if (selectedValue === "name") {
            byDate.classList.add("hidden");
            byName.classList.remove("hidden");
        }
    }

    toggleSearchFields();
    searchBy.addEventListener("change", toggleSearchFields);
});

    
</script>
</body>
</html>
