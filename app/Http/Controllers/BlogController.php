<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index(){
        $blogs = Blog::all();

        $blogCats = BlogCategory::all();
        return view('user.blogs',['blogs'=>$blogs,"blogCats"=>$blogCats]);




        // if(request()->query('category')){

        //     $category = request()->query('category');
        //     $blogCatsCollect = collect

        //     $filterBlogs = Blog::whereHas('blogCategory', function (Builder $query) {

        //             $query->where('', 'like', 'PHP%');
        //        })->get();



        //     return view('user.blogs',[
        //         "blogs"=>$filterBlogs
        //     ]);
        // }
        // else{

        // }
    }

    public function filter($id){
        $filteredBlogs = Blog::where('category_id',$id)->get();
        $blogCats = BlogCategory::all();

        return view('user.blogs',[

            "blogs"=>$filteredBlogs,
            "blogCats"=>$blogCats
        ]);
    }


    public function createBlog(){
        $categories = BlogCategory::all();
        return view('admin.createBlog',[
            "categories"=>$categories
        ]);
    }

    public function storeBlog(){
        $cleanData = request()->validate([
            "blogTitle"=>['required'],
            "blogDescription"=>['required'],

        ]);
        $path = request()->file('blogImage')->store('/images');

        $cleanData['blogImage'] = $path;
        $cleanData['category_id'] = request()->category;
        $cleanData['author_id'] = auth()->id();
        Blog::create($cleanData);
        return redirect('/blogs');

    }

    public function show($id){
        $blog = Blog::with('author')->find($id);

        return view('components.blogDetail',[
            "blog"=>$blog
        ]);
    }

    public function edit($id){
        $blog = Blog::find($id);
        $categories = BlogCategory::all();
        return view('admin.blogUpdate',[
            "blog"=>$blog,
            "categories"=>$categories
        ]);
    }

    public function update($id){
        $path = request()->file('blogImage')->store('/images');

        $blogImage = $path;
        Blog::where("id",$id)->update([
            "blogTitle"=>request()->blogTitle,
            "blogDescription"=>request()->blogDescription,
            "blogImage"=>$blogImage,
            "category_id"=>request()->category,
            "author_id"=>auth()->id()
        ]);

        $blog = Blog::find($id);

        return view('components.blogDetail',[
            "blog"=>$blog
        ]);

    }

    public function destroy($id){
        Blog::where("id",$id)->delete();
        $blogs = Blog::all();
        $blogCats = BlogCategory::all();
        return view('user.blogs',[
            "blogs"=>$blogs,
            "blogCats"=>$blogCats
        ]);
    }

}
