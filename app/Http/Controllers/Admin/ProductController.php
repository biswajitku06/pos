<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Brand;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function addProduct()
    {
        $data['items'] = Category::all();
        $data['items1'] = Brand::all();
        return view('pages.admin.product.addproduct', $data);
    }

    public function saveProduct(Request $request)
    {
        $rules=[
            'name'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'=>'required',
            'status'=>'required',
            'price'=>'numeric',
            'cat_name'=>'required',
            'brand_name'=>'required'
        ];
        $this->validate($request,$rules);

        if(!empty($request->image))
        {
            $old_img = '';
            $image = fileUpload($request->file('image'), path_image(), $old_img);
        }
        else
            $image=null;

        Product::create([
            'name'=>$request->get('name'),
            'image'=>$image,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'status'=>$request->status,
            'description'=>$request->get('description'),
            'cat_id'=>$request->cat_name,
            'brand_id'=>$request->brand_name
        ]);
        return redirect()->back()->with(['success'=>'Product added Successfully']);
    }

    public function showProduct()
    {
        $data['items']=DB::table('products')
                                ->join('categories','products.cat_id','=','categories.id')
                                ->join('brands','products.brand_id','=','brands.id')
                                ->select('products.*','categories.cat_name','brands.brand_name')
                                ->get();
        return view('pages.admin.product.productlist',$data);
    }
    public function deActivate($id)
    {
        Product::where('id', '=', $id)->update(['status' => 0]);
        return redirect()->route('showProduct');
    }

    public function Activate($id)
    {
        Product::where('id', '=', $id)->update(['status' => 1]);
        return redirect()->route('showProduct');
    }

    public function editProduct($id)
    {
        if (!empty($id) && is_numeric($id)) {


            $data['items']=DB::table('products')
                ->join('categories','products.cat_id','=','categories.id')
                ->join('brands','products.brand_id','=','brands.id')
                ->where('products.id','=',$id)
                ->select('products.*','categories.cat_name','brands.brand_name')
                ->first();

        }
        $data['items1'] = Category::all();
        $data['items2'] = Brand::all();

        return view('pages.admin.product.editproduct',$data);
    }

    public function updateProduct(Request $request)
    {
        if (!empty($request->edit_id)) {
            $rules = [
                'name'=>'required',
                'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
                'status'=>'required',
                'price'=>'numeric',
                'cat_name'=>'required',
                'brand_name'=>'required'
            ];
            $this->validate($request, $rules);

            if (!empty($request->image)) {
                $old_img = '';
                $image = fileUpload($request->file('image'), path_image(), $old_img);
            }
            else
            {
                $item=Product::where('id','=',$request->edit_id)->first();
                $image = $item->image;
            }

            $data = [
                'name'=>$request->get('name'),
                'image'=>$image,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'description'=>$request->get('description'),
                'cat_id'=>$request->cat_name,
                'brand_id'=>$request->brand_name
            ];

            $update = Product::where('id', '=', $request->edit_id)->update($data);
            if ($update)
            {
                return redirect()->back()->with(['success' => 'Product Updated successfully']);


            }

            else
                return redirect()->back()->with(['success' => 'Product not Updated successfully']);
        }
    }

    public function deleteProduct($id)
    {
        if (!empty($id) && is_numeric($id)) {
            $data = Product::where('id', '=', $id)->delete();
            if ($data)
                return redirect()->back()->with(['success' => 'Product Deleted successfully']);
        }
    }
}
