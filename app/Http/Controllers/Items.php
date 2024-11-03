<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\item;

use Illuminate\View\View;

class Items extends Controller
{
   public function index() : View
   {
       //get all products
       $items = Item::all();

       //render view with products
       return view('table', compact('items'));
   }

}
