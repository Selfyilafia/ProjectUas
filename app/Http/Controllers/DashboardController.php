<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Klaim;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index',[
            "title" => "Postingan Saya",
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create', [
            "title" => "Buat Postingan",
            'categories' => Category::all(),
            'conditions' => Condition::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' =>'required|max:255',
            'slug' =>'required|unique:posts',
            'category_id' =>'required',
            'condition_id' =>'required',
            'image'=>'required|image|file|max:1024',
            'body' => 'required',
        ]);
        $validatedData['image'] = $request->file('image')->store('post-image');
        $validatedData['user_id'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect('/dashboard')->with('success', 'Postingan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post){
        return view('dashboard.show',[
            "title"=>$post->title,
            "post"=>$post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.edit',[
            "title" => "Edit Postingan",
            'categories' => Category::all(),
            'conditions' => Condition::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' =>'required|max:255',
            'category_id' =>'required',
            'condition_id' =>'required',
            'image'=>'image|file|max:1024',
            'body' => 'required',
        ];



        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        $validatedData['user_id'] = auth()->user()->id;

        Post::where('id', $post->id)
        ->update($validatedData);

        return redirect('/dashboard')->with('success', 'Postingan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        Klaim::where('post_id', $post->id)->delete();
        return redirect('/dashboard')->with('success', 'Postingan berhasil dihapus');

    }

    public function checkSlug(Request $request)
    {
        $slug =SlugService::createSlug(Post::class,'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
