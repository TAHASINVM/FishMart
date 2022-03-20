<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\FishHistory;
use App\Models\Fish;

class FishHistoryController extends Controller
{
    public function index(){

        $data['today'] = FishHistory::whereDate('date','>=', Carbon::today())->get();
        // echo "<pre>";
        // print_r($data['today']);
        // die();
        $data['fish']=Fish::all();
        
        return view('admin.fish_today',$data);
    }

    public function add(Request $request){

        $table= new FishHistory;
        $table->fish_id=$request->fish;
        $table->category_id=$request->category_id;
        $table->price=$request->price;
        $table->save();
        
        return redirect('admin/today_fish');
    }
}
