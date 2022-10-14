<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{

    public function index(){
        return view('home');
    }

    public function contact(){
        return view('contact');
    }

    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){

        $this->validate($request, [
            
                'username'=>'required|min:6',
                'password'=>'required',
            ]);

     $username = $request->input('username');
     $password = $request->input('password');

     $user = User::where('username', '=', $username)->first();
     if (!$user) {
        return redirect()->back()->with(['success'=>false, 'message' => 'Login Fail, please check username &password']);
     }
     if (!Hash::check($password, $user->password)) {
        return redirect()->back()->with(['success'=>false, 'message' => 'Login Fail, pls check password']);
     }
        return redirect()->back()->with(['success'=>true,'message'=>'success']);
}

    public function register(){
        return view('registration');
    }
    

    public function registerSubmit(Request $request){
        $validate = $request->validate([
            'username'=>'required|min:6|max:20',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'DOB' =>'required'
        ],);

        $user = new  User();
        $user->username = $request->username;
        $user->password = Hash::make ($request->password);
        $user->email = $request->email;
        $user->DOB = $request->DOB;
        $user->save();

       return redirect()->back()->with(['success'=>true,'message'=>'registration success']);
    }


}
