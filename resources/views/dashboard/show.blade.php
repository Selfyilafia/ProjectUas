@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-10 mb-4" style="opacity: 90%;">
                <div class="card">
                    <img src="https://source.unsplash.com/1200x500?web" class="card-img-top" alt="">
                    <div class="mx-3">
                        <a href="/dashboard" class=" mt-2 btn btn-success"><i class="fa-solid fa-arrow-left" style="color: #000000;"></i> Kembali</a>
                        <a href="" class=" mt-2 btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i> Edit</a>
                        <a href="" class=" mt-2 btn btn-danger"><i class="fa-solid fa-trash" style="color: #000000;"></i> Hapus</a>
                    </div>
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
                    
                </div>
            </div>
    </div>
</div>

@endsection