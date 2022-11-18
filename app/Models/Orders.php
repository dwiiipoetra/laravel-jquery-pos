<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['no_faktur','consumer_name','user_id','status'];
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
