@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-10 mb-4" style="opacity: 90%;">
                <div class="card">
                    {{-- <img src="{{ route('photo.show', ['filename' => $post->image]) }}"  class="card-img-top" alt="{{ $post->title }}" style="max-width: 1000px;min-height:350px;max-height:350px;"> --}}
                    <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="max-width: 1000px;min-height:350px;max-height:350px;">
                    <div class="mx-3">
                        <a href="/dashboard" class=" mt-2 btn btn-success"><i class="fa-solid fa-arrow-left" style="color: #000000;"></i> Kembali</a>
                        <a href="/dashboard/{{ $post->slug }}/edit" class="btn btn-warning" style="vertical-align:bottom"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i> Edit</a>
                        <form action="delete/{{ $post->slug }}" method="post" class="d-inline" id="deleteForm">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="confirmed" id="deleteConfirmed" value="0">
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(event)" style="vertical-align: bottom"><i class="fa-solid fa-trash" style="color: #000000;"></i> Hapus</button>
                          </form>
                    </div>
                    <div class="actions mx-3 mt-3">
                        @if ($post->status_id == 1)
                        <button disabled class="btn btn-outline-info"><i class="fa-solid fa-hand fa-md"></i> Diproses</button>
                        @elseif($post->status_id == 2)
                        <button disabled class="btn btn-outline-warning"><i class="fa-solid fa-clock fa-md"></i> Habis</button>
                        @else
                        <button disabled class="btn btn-outline-success"><i class="fa-solid fa-check fa-md"></i> Belum Ada Pesanan</button>
                        @endif
                    </div>
                    <div class="card-body">
                        <h2 class="card-title mb-3">{{ $post->title }}</h2>

                        <p class="card-text">
                            <small class="text-muted">
                                <strong>{{ $post->condition->name }}</strong> Toko <a
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
