@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-10 mb-4" style="opacity: 90%;">
                <div class="card">
                    <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="max-width: 1000px;min-height:350px;max-height:350px;">
                    <div class="mx-3">
                        <a href="/dashboard" class=" mt-2 btn btn-success"><i class="fa-solid fa-arrow-left" style="color: #000000;"></i> Kembali</a>
                        <a href="/dashboard/{{ $post->slug }}/edit" class="btn btn-warning" style="vertical-align:bottom"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i> Edit</a>
                        <form action="delete/{{ $post->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')" style="vertical-align: bottom"><i class="fa-solid fa-trash" style="color: #000000;"></i> Hapus</button>
                          </form>
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