<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function index(){
        $products = Products::all();
        return view('products.index',compact('products'));
    }

    public function create(){
        return view('products.create');
    }
    
    public function store(Request $r){
        $product = new Products;
        $product->name = $r->name;
        $product->sell_price = $r->sell_price;
        $product->buy_price = $r->buy_price;
        $product->stock = $r->stock;
        $product->category = $r->category;
        $product->save();
        return redirect()->route('products.index');
    }
    
    public function edit($id){
        return view('products.edit', [
            'product' => Products::where('id',$id)->first()
        ]);
    }

    public function update(Request $r, $id){
        $product = Products::find($id);
        $input = $r->all();
        $product->update($input);
        return redirect()->route('products.index');
    }

    public function destroy($id){
        Products::destroy($id);
        return redirect()->route('products.index');
    }
}
