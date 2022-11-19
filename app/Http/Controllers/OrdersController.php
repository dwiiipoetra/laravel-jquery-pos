<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    
    public function index(){
        // pass product & order data
        $products = Products::all();
        $orders = Orders::all();
        return view('orders.index', compact('products','orders'));
    }

    public function store(Request $r){
        $order = new Orders();
        // generate no faktur
        $count = Orders::count() + 1;//get count row then + 1
        $row_number = '00'.$count;
        $currentTime = Carbon::now()->toDateTimeString();
        $conv_date = substr(str_replace('-','', $currentTime),0,8);
        $no = $conv_date.$row_number;
        $auto=substr($no,8);//001
        $auto_number='INV-'.substr($no,0,8).str_repeat(0,(4-strlen($auto))).$auto;
        $order->no_faktur = $auto_number;
        $order->consumer_name = $r->consumer_name;
        $order->user_id = Auth::user()->id;
        $order->save();
        return redirect()->route('orders.index');
    }

    public function show($id){
        $orders_detail = OrdersDetail::where('order_id',$id)->get();
        return view('orders.show', compact('orders_detail'));
    }
}
