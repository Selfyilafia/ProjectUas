@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-signin w-100 m-auto">
          @if (session()->has('success'))
          
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if (session()->has('loginError'))
          
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('loginError') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

            <h1 class="h2 mb-5 fw-bold text-center">Login</h1>
            <form action="/login" method="post">
              @csrf
              <div class="form-floating">
                <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="NIM/NIP" autofocus required value="{{ old('nim') }}">
                <label for="nim">NIM/NIP</label>
                @error('nim')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
              <button class="w-100 btn btn-lg btn-dark" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Belum Punya Akun? <a href="/register" class="text-decoration-none">Daftar Sekarang!</a></small>
        </main>
    </div>
</div>
@endsection