<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function index(){
        $product = Products::orderBy('name')->get();
    }
}
