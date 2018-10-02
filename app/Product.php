<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','image','price','quantity','cat_id','brand_id','status','description'];
    protected $table='products';
}
