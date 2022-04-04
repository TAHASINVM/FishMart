<?php

namespace App\Http\Controllers;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Models\FishHistory;

class HomeController extends Controller
{
    public function index(){
        $data=FishHistory::with('getFishName','getCategory')
                        ->whereDate('date','>=', Carbon::today())
                        ->get();
        return view('front.layout',compact('data'));
    }
}
