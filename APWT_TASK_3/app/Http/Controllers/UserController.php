<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

public function __construct(){
    $this->middleware('ValidateLogin');
}


public function uDashboard(){
    $user = User::where('username', session()->get('username'))->first();
    return view('user.dashboard')->with('user', $user) ;
}

public function uDashboardSubmit(Request $request){
    $validate = $request->validate([
        'username'=>'required|min:5|max:20',
        'email'=>'required|email|unique:users,email',
        'dob'=> 'required',
    ],);

    $user = User::where('username', session()->get('username'))->first();
    $user->username = $request->username;
    $user->email = $request->email;
    $user->dob = $request->dob;
    $user->save();
    session()->put('message', 'Update successful.');
    return view('user.dashboard')->with('user', $user) ;
}

public function userEditId(Request $request){
    $user = User::where('id', $request->id)->first();
    return view('user/userEdit')->with('user', $user) ;
}

public function userEditSubmit(Request $request){
    $validate = $request->validate([
        'username'=>'required|min:5|max:20',
        'email'=>'required|email|unique:users,email',
        'dob'=> 'required',
        
    ],);

    $user = User::where('id', $request->id)->first();
    $user->username = $request->username;
    $user->email = $request->email;
    $user->dob = $request->dob;
    $user->save();
    session()->put('message', 'Update successful.');
    return redirect('admin/dashboard');
}

public function userDelete(Request $request){
    $user = User::where('id', $request->id)->first();
    $user->delete();

    session()->put('message', 'Delete successful.');
    return redirect('admin/dashboard');
}

}
