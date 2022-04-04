<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=Category::all();
        return view('admin.category',compact('result'));
    }
    public function add_category()
    {
        return view('admin.add_category');
    }
    public function add_category_process(Request $request)
    {
        $request->validate([
            'category'=>'required|unique:categories,category',
        ]);

        $table=new Category;
            $table->category=$request->category;
            $table->save();

        $request->session()->flash('msg','New Category Added');


        return redirect('admin/category');
    }

    public function delete(Request $request,$id)
    {
        Category::find($id)->delete();
        $request->session()->flash('msg','Category Deleted');
        return redirect('admin/category');
    }

   
}
