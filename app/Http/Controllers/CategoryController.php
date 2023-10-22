<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categorylist',[
            'categories'=>$categories
        ]);
    }
    public function create(){
        return view('admin.createCategory');
    }
    public function store(){
        $cleanData = request()->validate([
            "categoryName"=>['required']
        ]);
        Category::create($cleanData);
        return redirect('/admin/categories')->with('success','New Category is successfully added');

    }


}
