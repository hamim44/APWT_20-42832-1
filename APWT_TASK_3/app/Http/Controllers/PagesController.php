<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function aboutUs(){
        return view('aboutUs');
    }

    public function contactUs(){
        return view('contactUs');
    }

    public function ourTeams(){
        return view('ourTeams');
    }

    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){
        $this->validate($request, [
            'username'=>'required|min:5',
            'password'=>'required',
        ],);



        $username = $request->input('username');
        $password = $request->input('password');

        $admin = Admin::where('username',$request->username)
        ->where('password',$request->password)
        ->first();
        

        $user = User::where('username', '=', $username)->first();
        if($admin){
            session()->put("type",'admin');
            session()->put("username",$request->username);
            return redirect()->route('aDashboard');
        }
        if (!$user) {
           return redirect()->back()->with(['success'=>false, 'message' => 'Login Fail, please check username &password']);
        }
        if (!Hash::check($password, $user->password)) {
           return redirect()->back()->with(['success'=>false, 'message' => 'Login Fail, pls check password']);
        }
           return redirect()->back()->with(['success'=>true,'message'=>'success']);
   

    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }

    public function register(){
        return view('registration');
    }

    public function registerSubmit(Request $request){
        $validate = $request->validate([
            'username'=>'required|min:5|max:20',
            'email'=>'required|email|unique:users,email',
            'dob'=> 'required',
            'password'=>'required'
        ],);

        $user = new  User();
        $user->username = $request->username;
        $user->password = Hash::make ($request->password);
        $user->dob = $request->dob;
        $user->email = $request->email;
        $user->save();
        session()->put('message', 'Registration successful. Please login to continue');
        return view('login');
    }


}
