
@extends('layouts.main')
@section('container')
{{-- <div class="container">
<article>    
    <h1>{{ $post->title }}</h1>
    <p><strong>{{ $post->condition->name }}</strong> Oleh <a href="/users/{{ $post->user->username }}"  class="text-decoration-none">{{ $post->user->name }}</a> : <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
    </p>
    {!! $post->body !!}
    <br>
    <a href="/posts" class="d-block mt-2">Back to posts</a>
</article>
</div> --}}
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-10 mb-4" style="opacity: 90%;">
                <div class="card">
                    <img src="https://source.unsplash.com/1200x500?web" class="card-img-top" alt="">
                    <div class="card-body">
                        <h2 class="card-title mb-3">{{ $post->title }}</h2> 

                        <p class="card-text">
                            <small class="text-muted">
                                <strong>{{ $post->condition->name }}</strong> Oleh <a
                                href="/posts?user={{ $post->user->nim }}"
                                class="text-decoration-none">{{ $post->user->name }}</a> : <a
                                    href="/posts?category={{ $post->category->slug }}"
                                    class="text-decoration-none">{{ $post->category->name }}</a>
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <article class="my-3 fs-6">
                            {!! $post->body !!}
                        </article>
                    </div>
                    <div class="mx-3">
                        <footer class="footer mb-4">
                            <a href="/posts" class=" mt-2 btn btn-primary">Kembali ke Home</a>
                        </footer>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection