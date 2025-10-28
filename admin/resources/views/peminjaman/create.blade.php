@extends('layout.index')

@section('title', 'Pengajuan Peminjaman Baru')

@section('content')
<div class="container-fluid py-4">
    <h3 class="text-center">Pengajuan Peminjaman Baru</h3>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_anggota" class="form-label">Pilih Anggota</label>
            <select class="form-select" id="id_anggota" name="id_anggota" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach ($anggotas as $anggota)
                    <option value="{{ $anggota->id }}">{{ $anggota->nama_anggota }} ({{ $anggota->id_anggota }})</option>
                @endforeach
            </select>
            @error('id_anggota')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_buku" class="form-label">ID Buku</label>
            <input type="number" class="form-control" id="id_buku" name="id_buku" placeholder="Masukkan ID Buku" required>
            @error('id_buku')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="judul_buku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" required>
            @error('judul_buku')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
