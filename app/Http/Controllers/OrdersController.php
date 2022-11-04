<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    
    public function index(){
        // pass product data
        $products = Products::all();
        // get cart item by user login
        $cart_items = Orders::where('user_id',Auth::user()->id)->where('status','0')->get();
        return view('orders.index', compact('products','cart_items'));
    }

    public function store(Request $r){
        // from select name
        if($r->product_id == 0){
            return redirect()->route('orders.index')->with('message','Produk belum dipilih');
        }

        // check product status & qty
        $product_check = Orders::where('id',$r->product_id)->where('status','0')->first();
        // $product_check = Orders::where('product_id',$r->product_id);
        // select product price
        $price = Products::where('id',$r->product_id)->first();

        // dd($product_check);
        if($product_check == null){
            $order = new Orders;
            $order->product_id = $r->product_id;
            $order->qty = $r->qty;
        }else{
            $order = Orders::where('product_id', $r->product_id)->where('status','0')->first();
            $order->product_id = $r->product_id;
            $order->qty += $r->qty;
        }
        $order->subtotal += $price->price * $r->qty;
        $order->user_id = Auth::user()->id;
        $order->save();
        return view('orders.index');
    }
}
