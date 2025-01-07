<?php

namespace App\Http\Controllers;

use App\Models\transaction as transactions;
use App\Models\unit_id;
use App\Models\iphone_color;
use App\Models\return_request;
use Carbon\Carbon;
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

        unit_id::where('id',$request->unit_id)->update(['stok' => $unit->stok-1, 'stok_booked' => $unit->stok_booked+1]);

        return redirect()->route('booked');
    }
    public function productTransactionEnd($penalty,$id){
        $transaction = transactions::select('*')->where('id',$id)->first();
        $this_time = Carbon::now('GMT+7');
        $unit = unit_id::select('*')->where('id', $transaction->unit_id_id)->first();
        unit_id::where('id',$transaction->unit_id_id)->update(['stok' => $unit->stok+1, 'stok_booked' => $unit->stok_booked-1]);
        $total = $transaction->total_paid + $penalty;
        transactions::where('id',$id)->update(['return_at' => $this_time, 'total_paid' => $total]);

        return redirect()->route('booked');
    }

    public function booked(){
        $user_id = Auth::user()->id;
        $transactions = transactions::select(
            'transactions.id AS transaction_id','transactions.total_paid AS total_paid','transactions.rent_at AS rent_at','transactions.return_plan AS return_plan',
            'transactions.return_at AS return_at','transactions.status AS status','unit_colors.color AS color','unit_storages.capacity AS storage','iphones.name AS iphone_name',
            'unit_ids.iphone_id AS iphone_id','unit_ids.unit_color_id AS color_id','unit_ids.id AS unit_id','unit_ids.rent_price AS rent_price'
        )->where('transactions.user_id', $user_id)->whereRaw('transactions.return_at IS NULL')
        ->leftJoin('unit_ids','unit_ids.id','=','transactions.unit_id_id')
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')
        ->orderBy('transactions.status','desc')->orderBy('transactions.id','desc')->get();
        $iphone_colors = iphone_color::all();
        
        return view('booked',compact('transactions','iphone_colors'));
    }
    public function bookedReturned(){
        $user_id = Auth::user()->id;
        $transactions = transactions::select(
            'transactions.id AS transaction_id','transactions.total_paid AS total_paid','transactions.rent_at AS rent_at','transactions.return_plan AS return_plan',
            'transactions.return_at AS return_at','unit_colors.color AS color','unit_storages.capacity AS storage','iphones.name AS iphone_name',
            'unit_ids.iphone_id AS iphone_id','unit_ids.unit_color_id AS color_id','unit_ids.id AS unit_id'
        )->where('transactions.user_id', $user_id)->whereRaw('transactions.return_at IS NOT NULL')
        ->leftJoin('unit_ids','unit_ids.id','=','transactions.unit_id_id')
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')
        ->orderBy('transactions.id','desc')->get();
        $iphone_colors = iphone_color::all();
        
        return view('wishlist',compact('transactions','iphone_colors'));
    }

    public function returnRequest(){
        $return_requests = return_request::select(
            'return_requests.id AS return_request_id','transactions.id AS transaction_id','cust.name AS cust_name','return_requests.created_at AS created',
            'admin.name AS admin_name','iphones.name AS iphone_name','unit_colors.color AS color','unit_storages.capacity AS storage','return_requests.approve AS approve',
            'transactions.penalty AS penalty','transactions.total_paid AS total_paid'
        )->leftJoin('users AS admin','admin.id','=','return_requests.user_id')
        ->leftJoin('transactions','transactions.id','=','return_requests.transaction_id')
        ->leftJoin('unit_ids','unit_ids.id','=','transactions.unit_id_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')
        ->leftJoin('users AS cust','cust.id','=','transactions.user_id')
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->orderBy('return_requests.id','desc')->get();

        return view('manage.return_request', compact('return_requests'));
    }

    public function returnRequestSend(Request $request,$id){
        $return_request = new return_request();
        $return_request->transaction_id = $id;
        $return_request->save();

        transactions::where('id',$id)->update(['status' => 1, 'penalty' => $request->penalty]);

        return redirect()->route('booked');
    }
    public function returnRequestSendCancel($id){
        return_request::where('transaction_id',$id)->delete();
        transactions::where('id',$id)->update(['status' => 0]);

        return redirect()->route('booked');
    }

    public function returnRequestAcc($id){
        $returnRequest = return_request::find($id);
        $penalty = return_request::select('transactions.penalty AS penalty')->where('return_requests.id',$id)
            ->leftJoin('transactions','transactions.id','=','return_requests.transaction_id')->first();
        $user_id = Auth::user()->id;
        $this->productTransactionEnd($penalty->penalty,$returnRequest->transaction_id);
        return_request::where('transaction_id', $returnRequest->transaction_id)->update(['approve' => 1,'user_id' => $user_id]);

        return redirect()->back();
    }

    public function reportRentHistory(){
        $transactions = transactions::select(
            'transactions.id AS transaction_id','transactions.total_paid AS total_paid','transactions.rent_at AS rent_at','transactions.return_plan AS return_plan',
            'transactions.return_at AS return_at','unit_colors.color AS color','unit_storages.capacity AS storage','iphones.name AS iphone_name',
            'unit_ids.iphone_id AS iphone_id','unit_ids.unit_color_id AS color_id','unit_ids.id AS unit_id',
            'users.name AS user_name'
        )->whereRaw('transactions.return_at IS NOT NULL')
        ->leftJoin('unit_ids','unit_ids.id','=','transactions.unit_id_id')
        ->leftJoin('users','users.id','=','transactions.user_id')
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')
        ->orderBy('transactions.id','desc')->get();

        $description = '';

        return view('report.rent_history',compact('transactions','description'));
    }
    public function reportRentHistorySearchDate(Request $request){
        $transactions = transactions::select(
            'transactions.id AS transaction_id','transactions.total_paid AS total_paid','transactions.rent_at AS rent_at','transactions.return_plan AS return_plan',
            'transactions.return_at AS return_at','unit_colors.color AS color','unit_storages.capacity AS storage','iphones.name AS iphone_name',
            'unit_ids.iphone_id AS iphone_id','unit_ids.unit_color_id AS color_id','unit_ids.id AS unit_id',
            'users.name AS user_name'
        )->where('transactions.'.$request->opt,'>=',$request->start_date)->where('transactions.'.$request->opt,'<=',$request->end_date)
        ->leftJoin('unit_ids','unit_ids.id','=','transactions.unit_id_id')
        ->leftJoin('users','users.id','=','transactions.user_id')
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')
        ->orderBy('transactions.id','desc')->get();

        $description = 'Riwayat penyewaan iPhone dari tanggal '.$request->start_date.' sampai '.$request->end_date;

        return view('report.rent_history',compact('transactions','description'));
    }
    public function reportRentHistorySearchName(Request $request){
        $transactions = transactions::select(
            'transactions.id AS transaction_id','transactions.total_paid AS total_paid','transactions.rent_at AS rent_at','transactions.return_plan AS return_plan',
            'transactions.return_at AS return_at','unit_colors.color AS color','unit_storages.capacity AS storage','iphones.name AS iphone_name',
            'unit_ids.iphone_id AS iphone_id','unit_ids.unit_color_id AS color_id','unit_ids.id AS unit_id',
            'users.name AS user_name'
        )->where('iphones.name','like','%'.$request->name.'%')
        ->leftJoin('unit_ids','unit_ids.id','=','transactions.unit_id_id')
        ->leftJoin('users','users.id','=','transactions.user_id')
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')
        ->orderBy('transactions.id','desc')->get();

        $description = 'Riwayat penyewaan '.$request->name;

        return view('report.rent_history',compact('transactions','description'));
    }
}
