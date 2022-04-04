<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\FishHistory;
use App\Models\Fish;
use App\Models\Category;

class FishHistoryController extends Controller
{
    public function index(){

        $data['today'] = FishHistory::with('getFishName','getCategory')
                        ->whereDate('date','>=', Carbon::today())
                        ->get();
        $data['fish']=Fish::all();
        $data['category']=Category::all();
        
        return view('admin.fish_today',$data);
    }

    public function add(Request $request){

        $table= new FishHistory;
        $table->fish_id=$request->fish;
        $table->category_id=$request->category_id;
        $table->price=$request->price;
        $table->status=1;
        $table->save();
        
        return redirect('admin/today_fish');
    }
    public function change_status($id,$status){

        $table= FishHistory::find($id);
        $table->status=$status;
        $table->save();
        
        return redirect('admin/today_fish');
    }
    public function delete($id){

        FishHistory::find($id)->delete();
        return redirect('admin/today_fish');
    }
    public function edit_record(Request $request){
        $data=FishHistory::with('getFishName','getCategory')->find($request->getId);
                
        return response()->json($data);
        
    }
    public function update_record(Request $request){
        $data=FishHistory::find($request->id);
        $data->category_id=$request->category_id;
        $data->price=$request->price;
        $data->save();
        return redirect('admin/today_fish');   
    }
    public function history(){
        return view('admin/history');   
    }
    public function get_history(Request $request){

        $request->validate([
            'date' => 'required'
        ]);

        $results=FishHistory::with('getFishName','getCategory')->whereDate('date',$request->date)->get();
        return view('admin/history',compact('results'));   
    }
}
