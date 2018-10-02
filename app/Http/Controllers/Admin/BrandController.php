<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;


class BrandController extends Controller
{
    public function addBrand()
    {
        return view('pages.admin.brand.addbrand');
    }

    public function saveBrand(Request $request)
    {
        $rules=[
            'name'=>'required',
            'status'=>'required'
        ];
        $this->validate($request,$rules);

        Brand::create([
            'brand_name'=>$request->get('name'),
            'status'=>$request->status

        ]);
        return redirect()->back()->with(['success'=>'Brand added Successfully']);
    }

    public function showBrand()
    {
        $data['items']=Brand::all();
        return view('pages.admin.brand.brandlist',$data);
    }

    public function deActivate($id)
    {
        Brand::where('id','=',$id)->update(['status'=> 0 ]);
        return redirect()->route('showbrand');
    }
    public function Activate($id)
    {
        Brand::where('id','=',$id)->update(['status'=> 1 ]);
        return redirect()->route('showbrand');
    }

    public function editBrand($id)
    {
        if(!empty($id) && is_numeric($id)){
            $data['items']=Brand::where('id','=',$id)->first();
        }

        return view('pages.admin.brand.editbrand',$data);
    }

    public function updateBrand(Request $request)
    {
        if(!empty($request->edit_id)  )
        {
            $rules=[
                'name'=>'required'
            ];
            $this->validate($request,$rules);

            $data=[
                'brand_name'=>$request->name,
            ];

            $update=Brand::where('id','=',$request->edit_id)->update($data);
            if($update)
                return redirect()->back()->with(['success'=>'Brand Updated successfully']);
            else
                return redirect()->back()->with(['success'=>'Brand not Updated successfully']);

        }
    }

    public function deleteBrand($id)
    {
        $data=Brand::where('id','=',$id)->delete();
        if($data)
            return redirect()->back()->with(['success'=>'Brand Deleted successfully']);
    }
}
