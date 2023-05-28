@extends('layouts.main')
@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
     <h1 class="text-center">Pengajuan Klaim</h1>
</div>
        @if (session()->has('success'))
          
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
<div class="table-responsive mb-3">
    <table class="table table-striped-columns table-sm table-dark">
      <thead class="text-center">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Kategori</th>
          <th scope="col">Kondisi</th>
          <th scope="col">Pemilik Postingan</th>  
          <th scope="col">Kontak Pemilik Postingan</th>  
          <th scope="col">Pengaju Klaim</th>  
          <th scope="col">Status</th>  
          <th scope="col">Aksi</th>  
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($klaims as $klaim)    
        <tr>
          <td class="text-white" style="vertical-align: middle">{{ $loop->iteration }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->title }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->category->name }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->condition->name }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->user->name }}</td>
          <td class="text-white" style="vertical-align: middle"><a href="https://wa.me/{{ $klaim->post->user->no_hp }}" class="text-decoration-none text-white btn btn-success"><i class="fa-brands fa-whatsapp" style="color: #1ae817;"></i> {{ $klaim->post->user->name }}</a></td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->user->name }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->status }}</td>
          <td style="vertical-align: middle; width:max-content ">
            <a href="" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
            <a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
            <form action="" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-trash" style="color: #000000;"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection