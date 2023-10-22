<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['blogTitle','blogDescription','blogAuthor','blogImage','category_id','author_id'];

    // protected $casts = ['blogCategory'=>'array'];

    // public function scopeFilter($query,$filters){
    //     if($filters ?? null){
    //         $query->whereHas('blogCategory',function($query) use ($filters){
    //             $query->contains($filters);
    //         });
    //     }
    // }

    public function author(){
        return $this->belongsTo(User::class,'author_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
}
