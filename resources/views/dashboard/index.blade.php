@extends('layouts.main')
@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
     <h1 class="text-center">Postingan {{ auth()->user()->name }}</h1>
</div>
        @if (session()->has('success'))

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="table-responsive mb-3">
          <a href="/dashboard/create" class="btn btn-primary mb-3">Tambah Produk Baru</a>
          @if ($posts->count())
    <table class="table table-striped-columns table-sm table-dark">
      <thead class="text-center">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Kategori</th>
          <th scope="col">Paket</th>
          <th scope="col">Status Klaim</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($posts as $post)
        <tr>
          <td class="text-white" style="vertical-align: middle">{{ $loop->iteration }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $post->title }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $post->category->name }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $post->condition->name }}</td>
          @if ($post->status_id == 2)
          <td class="text-white" style="vertical-align: middle;"><button class="btn btn-outline-warning" disabled><strong>Diproses</strong></button></td>
          @elseif($post->status_id == 3)
          <td style="vertical-align: middle;"><button class="btn btn-outline-success" disabled><strong>Habis</strong></button></td>
          @else
          <td style="vertical-align: middle;"><button class="btn btn-outline-info" disabled><strong> Belum ada pesanan</strong></button></td>
          @endif

          <td style="vertical-align: middle; width:max-content ">
            <a href="/dashboard/{{ $post->slug }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
            <a href="/dashboard/{{ $post->slug }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
            <form action="dashboard/delete/{{ $post->slug }}" method="post" class="d-inline" id="deleteForm">
              @method('delete')
              @csrf
              <input type="hidden" name="confirmed" id="deleteConfirmed" value="0">
              <button type="submit" class="btn btn-danger border-0" onclick="confirmDelete(event)"><i class="fa-solid fa-trash" style="color: #000000;"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@else
<p class="text-center mt-4 fs-4">Produk Tidak Ada</p>
@endif

<!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Anda Yakin Ingin Menghapus Produk Ini</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="confirmed" id="deleteConfirmed" value="0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    onclick="setDeleteConfirmed(0)">Batal</button>
                <button type="button" class="btn btn-danger" onclick="setDeleteConfirmed(1)"
                    data-bs-dismiss="modal">Hapus</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Fungsi untuk mengatur nilai konfirmasi penghapusan
    function setDeleteConfirmed(value) {
        document.getElementById('deleteConfirmed').value = value;
    }

    // Fungsi untuk menampilkan modal konfirmasi penghapusan
    function confirmDelete(event) {
        event.preventDefault();

        // Tampilkan modal konfirmasi
        $('#confirmDeleteModal').modal('show');

        // Tambahkan event listener untuk menangani konfirmasi penghapusan
        $('#confirmDeleteModal').on('hidden.bs.modal', function (e) {
            // Dapatkan nilai konfirmasi
            const confirmed = $('#deleteConfirmed').val();

            // Lanjutkan dengan penghapusan jika dikonfirmasi
            if (confirmed === '1') {
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>

@endsection
