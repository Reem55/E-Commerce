<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;use Illuminate\Support\Facades\App;

class FrontController extends Controller
{
       public function index(){
           $shirts=Product::all();

           return view('front.home',compact('shirts'));
       }

       public function shirts(){

           $shirts=Product::all();
           return view('front.shirts',compact('shirts'));
       }

       public function shirt(){
           return view('front.shirt',compact('product'));
       }
}
