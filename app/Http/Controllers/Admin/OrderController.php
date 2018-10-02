<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class OrderController extends Controller
{
    public function showOrder()
    {
       return view('pages.admin.order.new_order');
    }
    public function getnewProduct()
    {
        $data=Product::all();
        return response()->json($data);
    }
}
