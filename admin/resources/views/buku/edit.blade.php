@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="card mx-auto" style="max-width:800px;">
    <div class="card-body">
        <h4 class="card-title">Edit Buku</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Buku</label>
                <input type="text" name="nama_buku" class="form-control" value="{{ old('nama_buku', $buku->nama_buku) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $buku->penulis) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">ID Buku</label>
                <input type="text" name="id_buku" class="form-control" value="{{ old('id_buku', $buku->id_buku) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ old('stok', $buku->stok) }}" min="0" required>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
