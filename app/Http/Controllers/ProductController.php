<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    public function index(){

             $products = Product::with('category')->get();
             $filteredMenus = Product::whereHas('category', function (\Illuminate\Database\Eloquent\Builder $query){
                $query->where('categoryName', "Pizza");
               })->limit(3)->get();
            return view('user.menu',[
                "products"=>$products,
                "filteredMenus"=>$filteredMenus
            ]);


    }
    public function createProduct(){
        $categories = Category::all();

        return view('admin.createProduct',['categories'=>$categories]);
    }

    public function storeProduct(){
        $cleanData = request()->validate([
            "productName"=>['required'],
            "productDesc"=>['required'],
            "price"=>['required'],
            "category_id"=>['required',Rule::exists('categories','id')]
        ]);
        $path = request()->file('productImage')->store('/images');
        $cleanData['productImage'] = $path;
        Product::create($cleanData);
        return redirect('/dashboard')->with('success','New Product Created Successfully');
    }

    public function show($id){
        $product = Product::find($id);
        return view('admin.productDetail',[
            "product" => $product
        ]);
    }

    public function destory($id){
        Product::find($id)->delete();
        return redirect('/dashboard')->with('success',"Successfully delete a product");
    }

    public function filter($category){
        $products = Product::with('category')->get();
        $filteredMenus = Product::whereHas('category', function (\Illuminate\Database\Eloquent\Builder $query) use ($category) {
            $query->where('categoryName', $category);
           })->limit(3)->get();
       return view('user.menu',[
        "products"=>$products,
        "filteredMenus"=>$filteredMenus
       ]);
    }

}
