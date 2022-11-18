<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','qty','subtotal','order_id'];
    protected $table = 'orders_detail';
    protected $primaryKey = 'id';
    protected $guarded = [];

    // has many relation
    protected $with = ['orders','product'];
    public function orders()
    {
        return $this->belongsTo(Orders::class,'order_id','id');
    }

    // has many relation
    public function product()
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }
}
