<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name','sell_price','buy_price','stock','category'];
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
