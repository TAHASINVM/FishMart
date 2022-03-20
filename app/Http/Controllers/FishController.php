<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FishController extends Controller
{

    public function index()
    {
        $data=Fish::all();
        return view('admin.fish',compact('data'));
    }

    public function add_fish(){
        return view('admin.add_fish');
    }


    public function add_fish_process(Request $request){

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

    public function edit_fish($id){
        $data=Fish::find($id);
        return view('admin.edit_fish',compact('data'));
    }

    public function edit_fish_process(Request $request , $id){

        $table=Fish::find($id);
        $table->eng_name=$request->fish_name_eng;
        $table->mal_name=$request->fish_name_mlm;
        if($request->image != null){

            $image_path=public_path('media/fish/'.$table->image);
            if( File::exists($image_path)){
                File::delete($image_path);
            }

            $image=$request->image;
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->move(public_path('/media/fish'),$image_name);
            $table->image=$image_name;  
        }
        $table->save();

        $request->session()->flash('msg','Fish Details Updated');
        return redirect('admin/fish');
    }

    public function delete(Request $request , $id){
        $table=Fish::find($id);
        $image_path=public_path('media/fish/'.$table->image);
        if( File::exists($image_path)){
            File::delete($image_path);
        }
        $table->delete();
        $request->session()->flash('msg','Fish Deleted');
        return redirect('admin/fish');
    }

    
}
