<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index($id){
        $product = Product::find($id);
        $cartItems = Cart::where("user_id",auth()->user()->id)->get();
        return view('user.cart',
        [
            'product' => $product,
            "cartItems"=>$cartItems
        ]
    );
    }

    // public function viewlist(){
    //     $cartItems = Cart::where("user_id",auth()->user()->id)->get();
    //     $total = 0;
    //     foreach ($cartItems as $item) {
    //         global $total;
    //      $total+=(int)$item->cartPrice*(int)$item->qty;
    //     }

    //     return view('user.cartlist',[
    //         "cartItems"=>$cartItems,
    //         "total"=>$total
    //     ]);
    // }

    public function list($id){

        $cart = Cart::where("product_id",$id)->first();
        if(!$cart){
            Cart::create([
                "user_id"=>auth()->user()->id,
                "product_id"=>$id,
                "qty"=>request()->qty ? request()->qty : 0,
                "total"=>0
            ]);
        }
        if(request()->qty>0){
            Cart::where("product_id",$id)->update([
                "user_id"=>auth()->user()->id,
                "product_id"=>$id,
                "qty"=>request()->qty,
                "total"=>request()->total
            ]);
        }

        $cartItems = Cart::select('carts.*','productName','price','productImage')->leftJoin('products','products.id','=','carts.product_id')->get();
        $total = 0;
        foreach ($cartItems as $item) {
            global $total;
         $total+=(int)$item->price*(int)$item->qty;
        }

        return view('user.orderlist',[
            "cartItems"=>$cartItems,
            "total"=>$total
        ]);
    }

    public function cancel($id){
        Cart::where("product_id",$id)->delete();
        return redirect('/menu');
    }

    public function ordered(){
        return view('user.orderfinish');
    }
}
