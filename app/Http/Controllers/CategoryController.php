<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index(){
    //     return view('categories',[
    //         "title"=>'Kategori',
    //         'categories'=>Category::all()
    //     ]);
    // }

    public function show(Category $category){
        return view('posts',[
            "title"=>"Home Catering | $category->name",
            'posts'=>$category->posts->load('category','user','condition'),
        ]);
    }
}
