<!DOCTYPE html>
<html lang="en">
<x-head>Riwayat Penyewaan</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-header></x-header>
        <div class="flex gap-2">
            <label for="by" class="text-lg">Cari Berdasarkan : </label>
            <select name="search_by" id="search_by" class="border rounded-md p-2">
                <option value="name">Nama iPhone</option>
                <option value="date">Rentang Tanggal</option>
            </select>
            <div id="by-date" class="w-fit mx-auto items-center flex flex-wrap px-4 py-2 gap-4 my-4 bg-white rounded-md p-8 print:hidden">
                <form action="{{ route('reportRentHistorySearchDate') }}" method="POST">
                @csrf
                <label for="date_range" class="text-lg"> : </label>
                <select name="opt" id="opt" class="border rounded-md p-2">
                    <option value="rent_at">Mulai Sewa</option>
                    <option value="return_at">Pengembalian</option>
                </select>
                <div class="flex gap-2">
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="p-2 border rounded-md" required>
                    <label for=""> - </label>
                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="p-2 border rounded-md" required>
                </div>
                <div class="flex gap-2">
                    <button id="search_btn" type="submit" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 py-1 px-2 rounded-md underline">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path id="search_btn_icon" strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
                </form>
            </div>
            <div id="by-name" class="w-fit mx-auto items-center flex flex-wrap px-4 py-2 gap-4 my-4 bg-white rounded-md p-8 print:hidden">
                <form action="{{ route('reportRentHistorySearchName') }}" method="POST">
                @csrf
                <label for="date_range" class="text-lg"> : </label>
                <div class="flex gap-2">
                    <input type="text" id="name_search" name="name" maxlength="30" value="{{ old('name') }}" class="p-2 border rounded-md" required>
                </div>
                <div class="flex gap-2">
                    <button id="search_btn" type="submit" class="mx-1 hover:bg-blue-500 hover:text-white text-blue-500 border border-blue-500 py-1 px-2 rounded-md underline">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path id="search_btn_icon" strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
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
    
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <p class="font-bold text-2xl text-center mb-4">Riyawat Penyewaan iPhone</p>
        <div class="flex flex-wrap justify-center gap-4">
        <div class="flex justify-items-start">
                
        </div>
        <div class="overflow-x-scroll">
            <table class="bg-white w-full mx-auto min-w-max table-auto text-left">
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
