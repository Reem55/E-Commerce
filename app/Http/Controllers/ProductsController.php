<?php

namespace App\Http\Controllers;

use App\category;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){

        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        $categories=category::pluck('name', 'id');
        return view('admin.product.create',compact('categories'));
    }


    public function store(Request $request){

        $formInput=$request->except('image');
//        validation
        $this->validate($request,[
            'name'=>'required',
            'size'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);
        //imageUpload
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOiginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }
        Product::create($formInput);
        return redirect()->route('admin.index');
    }
}


//        image upload

