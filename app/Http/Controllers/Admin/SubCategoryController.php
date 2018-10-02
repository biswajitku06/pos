<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use DB;

class SubCategoryController extends Controller
{
    public function addsubCategory()
    {
        $data['items'] = Category::all();
        return view('pages.admin.subcategory.addsubcategory', $data);
    }

    public function savesubCategory(Request $request)
    {

        $rules = [
            'name' => 'required',
            'cat_name' => 'required'
        ];
        $this->validate($request, $rules);

        SubCategory::create([
            'sub_cat_name' => $request->get('name'),
            'cat_id' => $request->get('cat_name'),
            'status' => $request->status

        ]);
        return redirect()->back()->with(['success' => 'Sub Category added Successfully']);
    }

    public function showsubCategory()
    {
        $data['items'] = DB::table('sub_categories')
            ->join('categories', 'sub_categories.cat_id', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.cat_name')
            ->get();
        return view('pages.admin.subcategory.subcategorylist', $data);
    }

    public function deActivate($id)
    {
        SubCategory::where('id', '=', $id)->update(['status' => 0]);
        return redirect()->route('showsubCategory');
    }

    public function Activate($id)
    {
        SubCategory::where('id', '=', $id)->update(['status' => 1]);
        return redirect()->route('showsubCategory');
    }

    public function editsubCategory($id)
    {
        if (!empty($id) && is_numeric($id)) {

            $data['items'] = DB::table('sub_categories')
                ->join('categories', 'sub_categories.cat_id', '=', 'categories.id')
                ->where('sub_categories.id', '=', $id)
                ->select('categories.cat_name', 'sub_categories.*')
                ->first();

        }

        return view('pages.admin.subcategory.editsubcategory',$data);
    }

    public function updatesubCategory(Request $request)
    {
        if (!empty($request->edit_id)) {
            $rules = [
                'name' => 'required',
                'cat_name'=>'required'
                // 'description'=>'required'
            ];
            $this->validate($request, $rules);

            $data = [
                'sub_cat_name' => $request->name,
                'cat_id'=>$request->cat_name
            ];

            $update = SubCategory::where('id', '=', $request->edit_id)->update($data);
            if ($update)
            {
                return redirect()->back()->with(['success' => 'Sub Category Updated successfully']);


            }

            else
                return redirect()->back()->with(['success' => 'Sub Category not Updated successfully']);
        }
    }

    public function deletesubCategory($id)
    {
        if (!empty($id) && is_numeric($id)) {
            $data = Category::where('id', '=', $id)->delete();
            if ($data)
                return redirect()->back()->with(['success' => 'Category Deleted successfully']);
        }
    }
}
