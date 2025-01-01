<?php

namespace App\Http\Controllers;

use App\Models\transaction as transactions;
use Illuminate\Http\Request;

class transaction extends Controller
{
    public function index(){
        $wish = transactions::select('*')
        ->leftJoin('unit_ids','unit_ids.id', '=', 'transactions.unit_id_id')
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')->get();

        return view('wishlist', compact('wish'));
    }
}
