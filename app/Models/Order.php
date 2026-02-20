<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'categories_id','sub_typename','img','size','sauce_type','side_board','topping','total_price','status'
    ];
    protected $casts = [
    'topping' => 'array',
];
}
