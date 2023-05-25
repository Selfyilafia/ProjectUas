<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // dd(request('search'));

        return view('posts',[
            "title"=>"UNJA Lapor Hilang",
            "posts"=> Post::latest()->filter(request(['search', 'category','user']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            "title"=>$post->title,
            "post"=>$post
        ]);
    }
}
