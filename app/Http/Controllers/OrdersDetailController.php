<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\OrdersDetail;
use Illuminate\Http\Request;

class OrdersDetailController extends Controller
{
    public function store(Request $r){
        // from select name
        if($r->product_id == 0){
            return redirect()->route('orders.index')->with('message','Produk belum dipilih');
        }

        // check if exist product status & qty
        $product_check = OrdersDetail::where('product_id',$r->product_id)->where('order_id',$r->order_id)->first();
        // select product price
        $price = Products::where('id',$r->product_id)->first();

        if($product_check == null){
            $order_detail = new OrdersDetail;
            $order_detail->product_id = $r->product_id;
            $order_detail->qty = $r->qty;
            $order_detail->order_id = $r->order_id;
        }
        else{
            // if product exist then update qty
            $order_detail = OrdersDetail::where('product_id', $r->product_id)->where('order_id',$r->order_id)->first();
            $order_detail->product_id = $r->product_id;
            $order_detail->qty += $r->qty;
        }
            $order_detail->subtotal += $price->sell_price * $r->qty;
            $order_detail->save();
        return redirect()->route('orders.index');
    }
}
