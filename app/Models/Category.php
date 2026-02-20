<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $fillable=[
        'main_type','sub_type','img','price','created_at','updated_at','details'
    ];
}
