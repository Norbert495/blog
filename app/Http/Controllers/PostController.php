<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{ /* sprawdzanie potwierdzenia emaila 
    public function __construct()
    {
        $this->middleware('verified')->only('show');
    }*/
    public function index()
    {
        $posts = Post::latest('date')->paginate(3);

        return view('pages.posts', compact('posts'));
    }

    public function show(Post $post){
        //dd($post);
        //return $post; //return json
        return view('pages.post', compact('post'));
        
    }
}
