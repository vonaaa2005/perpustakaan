@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<div class="card mx-auto" style="max-width:800px;">
    <div class="card-body">
        <h4 class="card-title">Tambah Anggota</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('anggota.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Anggota</label>
                <input type="text" name="nama_anggota" class="form-control" value="{{ old('nama_anggota') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ID Anggota</label>
                <input type="text" name="id_anggota" class="form-control" value="{{ old('id_anggota') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
