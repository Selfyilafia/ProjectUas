<div>
    <div class="container d-flex justify-content-center">
    <div class="container text-center">

        <div class="jdl">
            <h1>Home Catering</h1>
            <div class="wrapper">
                <form action="/posts">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('user'))
                        <input type="hidden" name="user" value="{{ request('user') }}">
                    @endif
                        <button type="reset" class="btn-reset">
                            <img src="/img/x.svg" alt="">
                        </button>
                        <input type="text" class="inp" name="search" autocomplete="off" wire:model='search'>
                        <button type="submit" class="btn-submit">
                            <img src="/img/search.svg" alt="">
                        </button>
                </form>

            </div>
        </div>

        @if ($posts->count())
        <div class="container mt-3 mb-2">
              @if (session()->has('success'))

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
              @if (session()->has('gagal'))

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('gagal') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 mb-2" style="opacity: 85%;">
                        <div class="card" style="min-height: 630px; max-height :700px;overflow:hidden;">
                            <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="min-width: 350px;max-width:500px;min-height:250px;max-height:250px;">
                            <div class="card-body">
                                <div class="judul" style="min-height: 70px; max-height: 50px; overflow:hidden;display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical; text-overflow:ellipsis;">
                                <h4 class="card-title">
                                    <a href="/posts/{{ $post->slug }}"
                                        class="text-decoration-none text-dark">{{ $post->title }}
                                    </a>
                                </h4>
                            </div>
                            <p class="card-text" style="min-height: 65px; max-height: 50px; overflow:hidden;display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical; text-overflow:ellipsis;">
                                    <small class="text-muted">
                                        <strong>{{ $post->condition->name }}</strong> Toko <a
                                        href="/posts?user={{ $post->user->nim }}"
                                        class="text-decoration-none">{{ $post->user->name }}</a> : <a
                                        href="/posts?category={{ $post->category->slug }}"
                                        class="text-decoration-none">{{ $post->category->name }}</a> <br>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                @if($post->status_id == 2)
                                <button disabled class="btn btn-outline-warning border-0"><i class="fa-solid fa-clock fa-md"></i> Hampir Habis</button>
                                @elseif($post->status_id == 3)
                                <button disabled class="btn btn-outline-success border-0"><i class="fa-solid fa-check fa-md"></i> Habis</button>
                                @else
                                <button disabled class="btn btn-outline-info border-0"><i class="fa-solid fa-hand fa-md"></i> Belum Ada Pembelian</button>
                                @endif
                                <p class="card-text mt-4" style="max-height: 50px; overflow:hidden;display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical; text-overflow:ellipsis; ">{{ strip_tags($post->body) }}</p>
                            </div>
                            <footer class="footer text-end mb-4 mx-3">
                                <a href="/posts/{{$post->slug}}" class="btn btn-primary">Lihat Selengkapnya</a>
                                </footer>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
              <p class="text-center mt-4 fs-4">Produk Tidak Ditemukan</p>
            @endif
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    </div>
</div>
