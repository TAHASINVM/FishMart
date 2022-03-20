<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Fish::all();
        return view('admin.fish',compact('data'));
    }

    public function manage_fish(){
        return view('admin.manage_fish');
    }
    public function manage_fish_process(Request $request){

        $request->validate([
            'fish_name_mlm'=>'required|unique:fish,mal_name',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $table=new Fish;
            $table->eng_name=$request->fish_name_eng;
            $table->mal_name=$request->fish_name_mlm;
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->move(public_path('/media/fish'),$image_name);
            $table->image=$image_name;
            $table->save();

        $request->session()->flash('msg','New Fish Added');


        return redirect('admin/fish');
    }

    
}
