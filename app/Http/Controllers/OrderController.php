<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(){
        $orders = Cart::get();
        $total = 0;
        foreach($orders as $order){
            $data = OrderList::create([
                "user_id"=>$order->user_id,
                "product_id"=>$order->product_id,
                "qty"=>$order->qty,
                "total"=>$order->total,
                "orderCode"=>mt_rand(1000000, 9999999)
            ]);
            $total += $order->total;
        }

        Cart::where("user_id",auth()->user()->id)->delete();
        Order::create([
            "user_id"=>$data->user_id,
            "totalPrice"=>$total,
            "orderCode"=>$data->orderCode,

        ]);

        return redirect()->route('finish');
    }

    public function index(){
        $realOrders = Order::select("orders.*","users.username")->leftJoin("users","users.id","orders.user_id")->orderBy('orders.created_at','desc')->get();
        $statusCode = "2";


        return view("admin.orderlist",[
            "orders"=>$realOrders,
            "statusCode"=>$statusCode
        ]);

    }

    public function statusChange(){
        if(request()->filterStatus=="0"){
            $filteredOrders = Order::select("orders.*","users.username")->leftJoin("users","users.id","orders.user_id")->orderBy('orders.created_at','desc')->where("orders.status",0)->get();


            return view("admin.orderlist",[
                "orders"=>$filteredOrders,
                "statusCode"=>"0"
            ]);
        }
        else if(request()->filterStatus=="1"){
            $filteredOrders = Order::select("orders.*","users.username")->leftJoin("users","users.id","orders.user_id")->orderBy('orders.created_at','desc')->where("orders.status",1)->get();

            return view("admin.orderlist",[
                "orders"=>$filteredOrders,
                "statusCode"=>"1"
            ]);
        }
        else{
            $realOrders = Order::select("orders.*","users.username")->leftJoin("users","users.id","orders.user_id")->orderBy('orders.created_at','desc')->get();



            return view("admin.orderlist",[
                "orders"=>$realOrders,
                "statusCode"=>"2"
            ]);
        }
    }

    public function orderDetail($id,User $user){
        $productIds = OrderList::select("product_id")->where("user_id",$user->id)->get();

        $order = Order::where("id",$id)->first();

        $products = [];
        // $productIds->each(function ($id,$key) use ($products){

        //


        // });


        // for($i=0;$i< count($productIds);$i++){

        // }
        foreach($productIds->toArray() as $productId) {

            $product = Product::where("id",$productId)->get();
            array_push($products,$product);

        }



        $user = User::where("id",$order->user_id)->first();
        return view("admin.orderDetail",[
            "order"=>$order,
            "products"=>$products,
            "user"=>$user
        ]);
    }

    public function statusFinished($id){
        Order::where("id",$id)->update(['status' => 1]);
        return back();
    }
}
