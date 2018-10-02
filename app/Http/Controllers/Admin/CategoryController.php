<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('pages.admin.category.addcategory');
    }

    public function saveCategory(Request $request)
    {
        $rules=[
            'name'=>'required',
            'description'=>'required',
            'status'=>'required'
        ];
        $this->validate($request,$rules);

        Category::create([
            'cat_name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'status'=>$request->status

        ]);
        return redirect()->back()->with(['success'=>'Category added Successfully']);
    }

    public function showCategory()
    {
        $data['items']=Category::all();
        return view('pages.admin.category.categorylist',$data);
    }

    public function deActivate($id)
    {
        Category::where('id','=',$id)->update(['status'=> 0 ]);
        return redirect()->route('showCategory');
    }
    public function Activate($id)
    {
        Category::where('id','=',$id)->update(['status'=> 1 ]);
        return redirect()->route('showCategory');
    }

    public function editCategory($id)
    {
        if(!empty($id) && is_numeric($id)){
            $data['items']=Category::where('id','=',$id)->first();
        }

        return view('pages.admin.category.editcategory',$data);
    }

    public function updateCategory(Request $request)
    {
        if(!empty($request->edit_id)  )
        {
            $rules=[
                'name'=>'required',
               // 'description'=>'required'
            ];
            $this->validate($request,$rules);

            $data=[
                'cat_name'=>$request->name,
                //'description'=>$request->description
            ];

            $update=Category::where('id','=',$request->edit_id)->update($data);
            if($update)
                return redirect()->back()->with(['success'=>'Category Updated successfully']);
            else
                return redirect()->back()->with(['success'=>'Category not Updated successfully']);
        }
    }

    public function deleteCategory($id)
    {
        if(!empty($id) && is_numeric($id))
        {
            $data=Category::where('id','=',$id)->delete();
            if($data)
                return redirect()->back()->with(['success'=>'Category Deleted successfully']);
        }
    }
}
