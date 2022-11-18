<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    
    public function index(){
        // pass product & order data
        $products = Products::all();
        $orders = Orders::all();
        // get cart item by user login
        $cart_items = Orders::where('user_id',Auth::user()->id)->where('status','0')->get();
        return view('orders.index', compact('products','orders','cart_items'));
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
}
