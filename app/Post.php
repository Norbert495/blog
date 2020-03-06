<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $guarded = [];
   public function index(){
       $post = Post::all();
       return view('pages.posts', compact('posts'));
   }
}
