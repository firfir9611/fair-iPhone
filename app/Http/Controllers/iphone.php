<?php

namespace App\Http\Controllers;

use App\Models\iphone as iphones;
use App\Models\iphone_color;
use App\Models\iphone_storage;
use App\Models\unit_color;
use App\Models\unit_id;
use App\Models\unit_img;
use App\Models\unit_storage;
use App\Models\unit_code;
use App\Models\transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class iphone extends Controller
{
    
    public function home(){
        return view('home');
    }

    public function index() {
        
        $iphones = unit_id::select(
            'unit_ids.id AS unit_id','unit_colors.color AS color','unit_colors.color_code AS color_code','unit_storages.capacity AS storage',
            'iphones.name AS iphone_name','iphones.img AS img','unit_ids.show AS show_unit',
            'unit_ids.iphone_id AS iphone_id','unit_ids.unit_color_id AS color_id','unit_ids.rent_price AS rent_price'
        )->where('unit_ids.show', 1)
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','unit_ids.unit_storage_id')->orderBy('iphones.id')->get();
        // $iphone_15_series = iphones::select('*')->where('model', 'like', 'ip_15%')->get();
        $iphone_colors = iphone_color::all();

        return view('product', compact('iphones','iphone_colors'));
    }

    public function productDetail($id){
        $iphone = unit_id::select(
            'unit_ids.id AS unit_id','unit_colors.color AS color','unit_colors.color_code AS color_code','unit_storages.capacity AS storage',
            'iphones.name AS iphone_name','iphones.img AS img','iphones.stok_ready AS iphone_stok','iphones.display AS iphone_display',
            'iphones.os AS iphone_os', 'iphones.rearcam AS iphone_rearcam','iphones.selfie AS iphone_selfie','iphones.chipset AS iphone_chipset',
            'iphones.battery AS iphone_battery','iphones.dimention AS iphone_dimention', 'iphones.launch_at AS iphone_launch_at',
            'unit_ids.show AS show_unit','unit_ids.iphone_id AS iphone_id','unit_ids.unit_color_id AS color_id','unit_ids.rent_price AS rent_price',
            'unit_ids.stok AS unit_stok','unit_ids.battery_health AS battery_health'
        )->where('unit_ids.id', $id)
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','unit_ids.unit_storage_id')->first();

        $image = iphone_color::select('*')->where('iphone_colors.unit_color_id', $iphone->color_id)
            ->where('iphone_colors.iphone_id', $iphone->iphone_id)->first();

        return view('product_detail',compact('iphone','image'));
    }

    public function manageModel(){
        $id = iphones::max('id')+1;
        $iphones = iphones::all();

        return view('manage.model', compact('iphones','id'));
    }

    public function manageModelEdit($id){
        $iphone = iphones::select('*')->where('id', $id)->first();
        $unit_colors = unit_color::all();
        $unit_current_colors = iphone_color::select(
            'iphone_colors.id AS iphone_color_id','unit_colors.id AS unit_color_id','unit_colors.color AS color', 'unit_colors.color_code AS color_code'
        )->where('iphone_colors.iphone_id',$id)
        ->leftJoin('unit_colors','unit_colors.id','=','iphone_colors.unit_color_id')->get();
        $unit_storages = unit_storage::all();
        $unit_current_storages = iphone_storage::select(
            'iphone_storages.id AS iphone_storage_id','unit_storages.id AS unit_storage_id','unit_storages.capacity AS capacity'
        )->where('iphone_storages.iphone_id',$id)
        ->leftJoin('unit_storages','unit_storages.id','=','iphone_storages.unit_storage_id')->orderBy('unit_storages.id')->get();
        $img = iphone_color::select('*')->where('iphone_id', $id)->get();

        return view('manage.model_edit', compact('iphone','unit_colors','unit_storages','unit_current_colors','unit_current_storages','img'));
    }

    public function manageModelEditSave(Request $request, $id){
        if($request->show){
            $visible = 1;
        }else{
            $visible = 0;
        }

        iphones::where('id', $id)->update([
            // 'model' => $request->model,
            'name' => $request->name,
            'display' => $request->display,
            'os' => $request->os,
            'rearcam' => $request->rearcam,
            'selfie' => $request->selfie,
            'chipset' => $request->chipset,
            'battery' => $request->battery,
            'dimention' => $request->dimention,
            'launch_at' => $request->launch_at,
            'show' => $visible
        ]);

        if($request->file()){
            iphones::where('id', $id)->update(['img' => $request->file('img')->store('iphones/series')]);
        }

        return redirect()->route('manageModel');
    }

    public function manageModelDelete($id){
        iphones::where('id', $id)->delete();

        return redirect()->back();
    }

    public function manageModelDeleteSelected(Request $request){
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:iphones,id'
        ]);
        iphones::whereIn('id', $request->ids)->delete();

        return redirect()->back();
    }

    public function manageModelAdd(Request $request, $id){
        
        // $model = 'ip_'.$request->model_number.$request->model_type;
        // if($request->model_type == ''){
        //     $type_name = '';
        // }else if($request->model_type == 'plus'){
        //     $type_name = 'Plus';
        // }else if($request->model_type == 'pro'){
        //     $type_name = 'Pro';
        // }else if($request->model_type == 'pro_max'){
        //     $type_name = 'Pro Max';
        // }
        // $name = 'iPhone '.$request->model_number.' '.$type_name;

        // $iphone->name = $name;
        // $iphone->model = $model;
        // $iphone->rent_price = $request->rent_price;
        // $iphone->save();
        $iphone_exist = iphones::where('name', $request->name)->first();

        if($iphone_exist){
            return redirect()->route('manageModel')->with('exist','Nama Model iPhone sudah ada!, gunakan nama model lain');
        }else{
            $iphone = new iphones();
            $iphone->name = $request->name;
            $iphone->save();
    
            return redirect()->route('manageModelEdit', $id);
        }

    }

    public function manageModelVariantColorAdd(Request $request, $id){
        $iphone_color = new iphone_color();
        $iphone_color->iphone_id = $id;
        $iphone_color->unit_color_id = $request->colors;
        $iphone_color->save();

        return redirect()->back();
    }

    public function manageModelVariantColorDelete($id){
        iphone_color::where('id', $id)->delete();

        return redirect()->back();
    }

    public function manageModelVariantStorageAdd(Request $request, $id){
        $iphone_storage = new iphone_storage();
        $iphone_storage->iphone_id = $id;
        $iphone_storage->unit_storage_id = $request->capacity;
        $iphone_storage->save();

        return redirect()->back();
    }

    public function manageModelVariantStorageDelete($id){
        iphone_storage::where('id', $id)->delete();

        return redirect()->back();
    }

    public function manageVariant(){
        $unit_colors = unit_color::all();
        $unit_storages = unit_storage::all();

        return view('manage.variant', compact('unit_colors','unit_storages'));
    }

    public function manageVariantColorEdit(Request $request, $id){
        unit_color::where('id', $id)->update(['color' => $request->color, 'color_code' => $request->color_code]);

        return redirect()->back();
    }
    public function manageVariantColorDelete($id){
        unit_color::where('id', $id)->delete();

        return redirect()->back();
    }
    public function manageVariantColorAdd(Request $request){
        $unit_color = new unit_color();
        $unit_color->color = $request->color;
        $unit_color->color_code = $request->color_code;
        $unit_color->save();

        return redirect()->back();
    }

    public function manageVariantStorageEdit(Request $request, $id){
        unit_storage::where('id', $id)->update(['capacity' => $request->capacity]);

        return redirect()->back();
    }
    public function manageVariantStorageDelete($id){
        unit_storage::where('id', $id)->delete();

        return redirect()->back();
    }
    public function manageVariantStorageAdd(Request $request){
        $unit_storage = new unit_storage();
        $unit_storage->capacity = $request->capacity.$request->capacity_type;
        $unit_storage->save();

        return redirect()->back();
    }

    public function manageUnit(){
        $id = unit_id::max('id')+1;
        $unit_ids = unit_id::select(
            'unit_ids.id AS unit_id','unit_ids.stok AS stok','unit_ids.show AS show','unit_ids.battery_health AS battery_health','unit_ids.rent_price AS rent_price',
            'iphones.id AS iphone_id','iphones.name AS iphone_name','unit_ids.stok_booked AS stok_booked',
            'unit_colors.id AS color_id','unit_colors.color AS color_name',
            'unit_storages.id AS storage_id','unit_storages.capacity AS storage_capacity',
            'unit_imgs.top AS img_top','unit_imgs.bottom AS img_bottom','unit_imgs.left AS img_left','unit_imgs.right AS img_right'
        )->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')
        ->leftJoin('unit_imgs','unit_imgs.unit_id_id','=','unit_ids.id')->orderBy('iphones.id')->get();
        $iphones = iphones::all();
        $unit_colors = iphone_color::select(
            'iphone_colors.iphone_id AS iphone_id','iphone_colors.unit_color_id AS color_id','unit_colors.color AS color_name'
        )->leftJoin('unit_colors','unit_colors.id','=','iphone_colors.unit_color_id')->get();
        $unit_storages = iphone_storage::select(
            'iphone_storages.iphone_id AS iphone_id','iphone_storages.unit_storage_id AS storage_id','unit_storages.capacity AS storage_name'
        )->leftJoin('unit_storages','unit_storages.id','=','iphone_storages.unit_storage_id')->get();

        return view('manage.unit', compact('unit_ids','id','iphones','unit_colors','unit_storages'));
    }
    public function manageUnitEdit($id){
        $unit_id = unit_id::select(
            'unit_ids.id AS id','unit_ids.stok AS stok','unit_ids.stok_booked AS stok_booked','unit_ids.show AS show','unit_ids.battery_health AS battery_health','unit_ids.rent_price AS rent_price',
            'iphones.id AS iphone_id','iphones.name AS iphone_name',
            'unit_colors.id AS color_id','unit_colors.color AS color_name',
            'unit_storages.id AS storage_id','unit_storages.capacity AS storage_capacity',
            'unit_imgs.top AS img_top','unit_imgs.bottom AS img_bottom','unit_imgs.left AS img_left','unit_imgs.right AS img_right'
        )->where('unit_ids.id',$id)
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')
        ->leftJoin('unit_imgs','unit_imgs.unit_id_id','=','unit_ids.id')->first();
        $iphone_colors = iphone_color::select(
            'iphone_colors.id AS iphone_color_id','unit_colors.id AS unit_color_id','unit_colors.color AS color', 'unit_colors.color_code AS color_code'
        )->where('iphone_colors.iphone_id',$unit_id->iphone_id)
        ->leftJoin('unit_colors','unit_colors.id','=','iphone_colors.unit_color_id')->get();
        $iphone_storages = iphone_storage::select(
            'iphone_storages.id AS iphone_storage_id','unit_storages.id AS unit_storage_id','unit_storages.capacity AS capacity'
        )->where('iphone_storages.iphone_id',$unit_id->iphone_id)
        ->leftJoin('unit_storages','unit_storages.id','=','iphone_storages.unit_storage_id')->get();
        // $iphone_colors = unit_color::all();
        // $iphone_storages = unit_storage::all();

        $unit_codes = unit_code::select('*')->where('unit_id_id', $id)->get();

        return view('manage.unit_edit', compact('unit_id','iphone_colors','iphone_storages','unit_codes'));
    }
    public function manageUnitEditSave(Request $request, $id){
        $unit_id = unit_id::select(
            'unit_ids.id AS unit_id','unit_ids.stok AS stok','unit_ids.show AS show','unit_ids.battery_health AS battery_health','unit_ids.rent_price AS rent_price',
            'iphones.id AS iphone_id','iphones.name AS iphone_name',
            'unit_colors.id AS color_id','unit_colors.color AS color_name',
            'unit_storages.id AS storage_id','unit_storages.capacity AS storage_capacity',
            'unit_imgs.top AS img_top','unit_imgs.bottom AS img_bottom','unit_imgs.left AS img_left','unit_imgs.right AS img_right'
        )->where('unit_ids.id',$id)
        ->leftJoin('iphones','iphones.id','=','unit_ids.iphone_id')
        ->leftJoin('unit_colors','unit_colors.id','=','unit_ids.unit_color_id')
        ->leftJoin('unit_storages','unit_storages.id','=','unit_ids.unit_storage_id')
        ->leftJoin('unit_imgs','unit_imgs.unit_id_id','=','unit_ids.id')->first();

        $existing_unit = unit_id::where('unit_color_id', $request->color)
        ->where('unit_storage_id', $request->storage)
        // ->where('rent_price', $request->rent_price)
        ->where('id', '!=', $id)->first();

        if($request->show) {
            unit_id::where('id',$id)->update(['show' => 1]);
        }else{
            unit_id::where('id',$id)->update(['show' => 0]);
        }
        if($request->img){
            iphone_color::where('iphone_id', $unit_id->iphone_id)->where('unit_color_id',$unit_id->color_id)->update(['img' => $request->file('img')->store('iphones/unit/splash')]);
        }
        if($request->img_front){
            unit_img::where('unit_id_id', $id)->update(['img_front' => $request->file('img_front')->store('iphones/unit/'.$id.'/front')]);
        }
        if($request->img_back){
            unit_img::where('unit_id_id', $id)->update(['img_back' => $request->file('img_back')->store('iphones/unit/'.$id.'/back')]);
        }
        if($request->img_top){
            unit_img::where('unit_id_id', $id)->update(['img_top' => $request->file('img_top')->store('iphones/unit/'.$id.'/top')]);
        }
        if($request->img_bottom){
            unit_img::where('unit_id_id', $id)->update(['img_bottom' => $request->file('img_bottom')->store('iphones/unit/'.$id.'/bottom')]);
        }
        if($request->img_left){
            unit_img::where('unit_id_id', $id)->update(['img_left' => $request->file('img_left')->store('iphones/unit/'.$id.'/left')]);
        }
        if($request->img_right){
            unit_img::where('unit_id_id', $id)->update(['img_right' => $request->file('img_right')->store('iphones/unit/'.$id.'/right')]);
        }
        if($existing_unit){
            $existing_unit->stok += $unit_id->stok;
            $existing_unit->save();
            unit_id::where('id', $id)->delete();

            $stok = unit_id::where('iphone_id', $unit_id->iphone_id)->sum('stok');
        $stok_booked = unit_id::where('iphone_id', $unit_id->iphone_id)->sum('stok_booked');
        $total_stok = $stok+$stok_booked;
        iphones::where('id',$unit_id->iphone_id)->update(['stok_ready' => $total_stok]);

        return redirect()->route('manageUnit')->with('double','Terdapat kesaman model, warna, dan penyimpanan!, stok terjumlahkan');
        }else{
            unit_id::where('id',$id)->update([
                'rent_price' => $request->rent_price,
                'battery_health' => $request->battery_health,
                'unit_color_id' => $request->color,
                'unit_storage_id' => $request->storage,
                'stok' => $request->stok
            ]);

            $stok = unit_id::where('iphone_id', $unit_id->iphone_id)->sum('stok');
            $stok_booked = unit_id::where('iphone_id', $unit_id->iphone_id)->sum('stok_booked');
            $total_stok = $stok+$stok_booked;
        iphones::where('id',$unit_id->iphone_id)->update(['stok_ready' => $total_stok]);
        return redirect()->route('manageUnit');
    }
    return redirect()->route('manageUnit');

        
    }
    public function manageUnitDelete($id){
        $unit_id = unit_id::select('*')->where('id',$id)->first();
        unit_id::where('id',$id)->delete();
        $stok = unit_id::where('iphone_id', $unit_id->iphone_id)->sum('stok');
        $stok_booked = unit_id::where('iphone_id', $unit_id->iphone_id)->sum('stok_booked');
        $total_stok = $stok+$stok_booked;
        iphones::where('id',$unit_id->iphone_id)->update(['stok_ready' => $total_stok]);
        return redirect()->back();
    }
    public function manageUnitDeleteSelected(Request $request){
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:unit_ids,id'
        ]);
        unit_id::whereIn('id', $request->ids)->delete();

        return redirect()->back();
    }
    public function manageUnitAdd(Request $request, $id){
        $existing_unit = unit_id::where('unit_color_id', $request->color)
        ->where('unit_storage_id', $request->storage)
        // ->where('rent_price', $request->rent_price)
        ->where('id', '!=', $id)->first();

        if($existing_unit){
            $existing_unit->stok += $request->stok;
            $existing_unit->save();

            return redirect()->route('manageUnit')->with('double','Terdapat kesaman model, warna, dan penyimpanan!, stok terjumlahkan');
        }else{
            $unit_id = new unit_id();
            $unit_id->iphone_id = $request->iphone_id;
            $unit_id->unit_color_id = $request->color;
            $unit_id->unit_storage_id = $request->storage;
            $unit_id->rent_price = $request->rent_price;
            $unit_id->battery_health = $request->battery_health;
            $unit_id->stok = $request->stok;
            $unit_id->save();
        }

        $stok = unit_id::where('iphone_id', $request->iphone_id)->sum('stok');
        $stok_booked = unit_id::where('iphone_id', $request->iphone_id)->sum('stok_booked');
        $total_stok = $stok+$stok_booked;
        iphones::where('id',$request->iphone_id)->update(['stok_ready' => $total_stok]);


        return redirect()->back();
    }

    public function manageUnitCodeDelete($id){
        $unit_code = unit_code::select('*')->where('id',$id)->first();
        $unit_id = unit_id::select('*')->where('id',$unit_code->unit_id_id)->first();
        unit_id::where('id',$unit_code->unit_id_id)->update(['stok' => $unit_id->stok-1]);
        unit_code::where('id',$id)->delete();


        return redirect()->back();
    }
    public function manageUnitCodeAdd($id){
        $unit_code = new unit_code();
        $unit_code->unit_id_id = $id;
        $unit_code->code = Str::uuid();
        $unit_code->save();
        $unit_count = unit_code::count();

        $unit_id = unit_id::select('*')->where('id',$unit_code->unit_id_id)->first();
        unit_id::where('id',$id)->update(['stok' => $unit_id->stok+1]);

        return redirect()->back();
    }
    public function reportRentHistory(){
        $transactions = transaction::select(
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

        $description = 'Semua riwayat penyewaan iPhone';
        $iphones = iphones::all();

        return view('report.rent_history',compact('transactions','description','iphones'));
    }
    public function reportRentHistorySearchDate(Request $request){
        $transactions = transaction::select(
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

        if($request->opt == 'rent_at')
        $description = 'Riwayat penyewaan iPhone dari tanggal '.$request->start_date.' sampai '.$request->end_date;
        if($request->opt == 'return_at')
        $description = 'Riwayat pengembalian iPhone dari tanggal '.$request->start_date.' sampai '.$request->end_date;

        $iphones = iphones::all();

        return view('report.rent_history',compact('transactions','description','iphones'));
    }
    public function reportRentHistorySearchName(Request $request){
        $transactions = transaction::select(
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

        $iphones = iphones::all();

        return view('report.rent_history',compact('transactions','description','iphones'));
    }
}
