<?php

namespace App\Http\Controllers;

use App\Models\transaction as transactions;
use App\Models\unit_id;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class transaction extends Controller
{
    public function index(){
        $wish = transactions::select('*')
        ->leftJoin('unit_ids','unit_ids.id', '=', 'transactions.unit_id_id')
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')->get();

        return view('wishlist', compact('wish'));
    }
    public function productTransactionStart(Request $request){
        $transaction = new transactions();
        $transaction->user_id = Auth::user()->id;
        $transaction->unit_id_id = $request->unit_id;
        $transaction->rented_price = $request->rented_price_input;
        $transaction->total_paid = $request->total_price_input;
        $transaction->rented_battery_health = $request->rented_battery_health;
        $transaction->rent_at = $request->rent_start;
        $transaction->return_plan = $request->return_plan;
        $transaction->save();
        $unit = unit_id::select('*')->where('id', $request->unit_id)->first();

        unit_id::where('id',$request->unit_id)->update(['stok' => $unit->stok-1, 'stok_booked' => $unit->stok_booked]);

        return redirect()->route('booked');
    }

    public function booked(){
        $user_id = Auth::user()->id;
        $transactions = transactions::select(
            'transactions.id AS transaction_id','transactions.total_paid AS total_paid','transactions.rent_at AS rent_at','transactions.return_plan AS return_plan',
            'transactions.return_at AS return_at','unit_colors.color AS color','unit_storages.capacity AS storage','iphones.name AS iphone_name'
        )->where('transactions.id', $user_id)
        ->leftJoin('unit_ids','unit_ids.id','=','transactions.id')
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')->get();

        return view('booked','transactions');
    }
}
