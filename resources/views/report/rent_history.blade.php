<!DOCTYPE html>
<html lang="en">
<x-head>Riwayat Penyewaan</x-head>
<body class="bg-gray-100 overflow-x-hidden">
    <x-header></x-header>
    <div class="w-11/12 mx-auto my-4 bg-white rounded-md p-8">
        <p class="font-bold text-2xl text-center mb-4">Riyawat Penyewaan iPhone</p>
        <div class="flex flex-wrap justify-center gap-4">
        <div class="flex justify-items-start">
                
        </div>
            <table class="bg-white w-full mx-auto min-w-max table-auto text-left">
                <thead>
                    <tr>
                        <x-table-header>ID Transaksi</x-table-header>
                        <x-table-header>Nama Pengguna</x-table-header>
                        <x-table-header>Nama Unit</x-table-header>
                        <x-table-header>Tanggal Rental</x-table-header>
                        <x-table-header>Tanggal Harus Kembali</x-table-header>
                        <x-table-header>Tanggal Kembali</x-table-header>
                        <x-table-header>Total Hari</x-table-header>
                        <x-table-header>Total Pembayaran</x-table-header>
                        <x-table-header>Tanggal</x-table-header>
                    </tr>
                </thead>
                <tbody>
                    @if($transactions->isNotEmpty())
                    @foreach ($transactions as $transaction)
                        <tr>
                            <x-table-contents>{{ $transaction->transaction_id }}</x-table-contents>
                            <x-table-contents>{{ $transaction->user_name }}</x-table-contents>
                            <x-table-contents>{{ $transaction->iphone_name.' '.$return_request->color.' '.$return_request->storage }}</x-table-contents>
                            <x-table-contents><span class="rent_at_{{ $transaction->transaction_id }}">{{ $transaction->rent_at }}</span></x-table-contents>
                            <x-table-contents><span class="return_plan_{{ $transaction->transaction_id }}">{{ $transaction->return_plan }}</span></x-table-contents>
                            <x-table-contents><span class="return_plan_{{ $transaction->transaction_id }}">{{ $transaction->return_at }}</span></x-table-contents>
                            <x-table-contents><span id="total_days_{{ $transaction->transaction_id }}"></span></x-table-contents>
                            <x-table-contents>{{ "Rp " . number_format($transaction->total_paid,0,',','.') }}</x-table-contents>
                            <x-table-contents>{{ $return_request->created }}</x-table-contents>
                        </tr>
                    @endforeach
                    @endif
              </tbody>
            </table>
        </div>
    </div>
<x-footer></x-footer>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua transaksi yang ada di tabel
    const transactions = document.querySelectorAll("tbody tr");

    transactions.forEach(function (transaction) {
        // Ambil ID transaksi
        const transactionId = transaction.querySelector("x-table-contents:first-child").innerText.trim();

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
});

    
</script>
</body>
</html>
