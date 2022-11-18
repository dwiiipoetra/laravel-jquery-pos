<?php

namespace App\Http\Controllers;

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
        // $tesid = Orders::latest()->id->get();
        $order->no_faktur = "INV-000";
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
