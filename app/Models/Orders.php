<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    // has many relation
    protected $with = ['product'];
    public function product()
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }
}
