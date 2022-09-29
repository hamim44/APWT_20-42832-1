<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $message = "Welcome";
        return view('index')->with('message', $message);
    }

    public function product(){
        $p_name = "apple";
        $price="45";

        return view('product')
        ->with('p_name', $p_name)
        ->with('price', $price);

    }

    public function ourteam(){
        $message = "Welcome";
        return view('ourteam')->with('message', $message);
    }

    public function about_us(){
        $message = "Welcome";
        return view('about_us')->with('message', $message);
    }

    public function contact_us(){
        $message = "Welcome";
        return view('contact_us')->with('message', $message);
    }
}