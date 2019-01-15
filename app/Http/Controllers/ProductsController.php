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
            $imageName=$image->getClientOriginalExtension();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }
        Product::create($formInput);
        return redirect()->route('product.index');
    }


//        image upload

//public function cart()
//{
//    return view('cart.index');
//
//}
//    public function addToCart($id)
//    {
//        $product = Product::find($id);
//
//        if(!$product) {
//
//            abort(404);
//
//        }
//
//        $cart = session()->get('cart');
//
//        // if cart is empty then this the first product
//        if(!$cart) {
//
//            $cart = [
//                $id => [
//                    "name" => $product->name,
//                    "quantity" => 1,
//                    "price" => $product->price,
//                    "photo" => $product->photo
//                ]
//            ];
//
//            session()->put('cart', $cart);
//
//            return redirect()->back()->with('success', 'Product added to cart successfully!');
//        }
//
//        // if cart not empty then check if this product exist then increment quantity
//        if(isset($cart[$id])) {
//
//            $cart[$id]['quantity']++;
//
//            session()->put('cart', $cart);
//
//            return redirect()->back()->with('success', 'Product added to cart successfully!');
//
//        }
//
//        // if item not exist in cart then add to cart with quantity = 1
//        $cart[$id] = [
//            "name" => $product->name,
//            "quantity" => 1,
//            "price" => $product->price,
//            "photo" => $product->photo
//        ];
//
//        session()->put('cart', $cart);
//
//        return redirect()->back()->with('success', 'Product added to cart successfully!');
//    }
}


