@extends('layouts.main')
@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
     <h1 class="text-center">Postingan {{ auth()->user()->name }}</h1>
</div>

<div class="table-responsive">
  <a href="/dashboard/create" class="btn btn-primary mb-3">Buat Postingan Baru</a>
    <table class="table table-striped-columns table-sm table-dark">
      <thead class="text-center">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Aksi</th>  
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($posts as $post)    
        <tr>
          <td class="text-white" style="vertical-align: middle">{{ $loop->iteration }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $post->title }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $post->category->name }}</td>
          <td style="vertical-align: middle; width:max-content ">
            <a href="/dashboard/{{ $post->slug }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
            <a href="/dashboard/{{ $post->id }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="/dashboard/{{ $post->id }}" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection