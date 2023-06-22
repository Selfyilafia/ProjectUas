<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){
        return view('posts',[
            "title"=>"Home Catering | $user->name",
            'posts'=>$user->posts->load('category','user','condition')
        ]);
    }
}
