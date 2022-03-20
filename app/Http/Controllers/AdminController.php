<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        if(session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
    }

    public function login_process(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email=$request->email;
        $password=$request->password;

        $data=Admin::where(['email'=>$email,'password'=>$password])->get();
        if(isset($data[0]->id)){
            $request->session()->put('ADMIN_LOGIN',true);
            $request->session()->put('ADMIN_ID',$data[0]->id);
            $request->session()->put('ADMIN_NAME',$data[0]->name);
            return redirect('admin/dashboard');
        }else{
            $request->session()->flash('error','Please Enter Valid Login Details');
            return redirect('admin/login');
        }
        
    }

    public function login_process_redirect(){
        return redirect('admin/login');
    }
    
    public function dashboard(){
        return view('admin.dashboard');
    }

}
