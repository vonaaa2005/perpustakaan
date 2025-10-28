@extends('layout.index')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manajemen Data Buku</h3>
                </div>
                <div class="card-body">
                    {{-- Tombol Aksi --}}
                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm">Tambah Buku (Create)</a>
                        <a href="{{ route('buku.index') }}" class="btn btn-info btn-sm">Lihat Daftar Buku (Read)</a>
                        <button class="btn btn-warning btn-sm" disabled>Ubah Buku (Update)</button>
                        <button class="btn btn-danger btn-sm" disabled>Hapus Buku (Delete)</button>
                    </div>

                    {{-- Tabel Data Buku --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama Buku</th>
                                    <th class="text-center">ID.Buku</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bukus as $buku)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $buku->nama_buku }} ({{ $buku->penulis }})</td>
                                    <td class="text-center">{{ $buku->id_buku }}</td>
                                    <td class="text-center">{{ $buku->stok }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Data buku masih kosong.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Tombol Kembali --}}
                    <div class="text-center mt-4">
                         <a href="{{ route('beranda') }}" class="btn btn-secondary">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
