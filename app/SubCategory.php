<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable=['sub_cat_name','cat_id','status'];
    protected $table='sub_categories';
}
