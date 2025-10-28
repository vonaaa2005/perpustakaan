@extends('layout.index')

@section('title', 'Manajemen Data Anggota')

@section('content')

<div class="container-fluid py-4">
    {{-- Struktur Card dari Gambar --}}
    <div class="card shadow-lg mx-4 mt-4 p-4">
        <h3 class="text-center pb-2 border-bottom">Manajemen Data Anggota</h3>
        
        {{-- Tombol Aksi --}}
        <div class="d-flex justify-content-center gap-2 mb-4">
            <a href="{{ route('anggota.create') }}" class="btn btn-primary btn-sm">Tambah Anggota (Create)</a>
            <a href="{{ route('anggota.index') }}" class="btn btn-info btn-sm">Lihat Daftar Anggota (Read)</a>
            <button class="btn btn-warning btn-sm" disabled>Ubah Anggota (Update)</button>
            <button class="btn btn-danger btn-sm" disabled>Hapus Anggota (Delete)</button>
        </div>

        {{-- Tabel Data Anggota --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Nama Anggota</th>
                        <th class="text-center">ID.Anggota</th>
                        <th>Email</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop data anggota yang dikirim dari Controller --}}
                    @forelse ($anggotas as $anggota)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}.</td>
                        <td>{{ $anggota->nama_anggota }}</td>
                        <td class="text-center">{{ $anggota->id_anggota }}</td>
                        <td>{{ $anggota->email }}</td>
                        <td class="text-center">
                            {{-- Link Edit: Memanggil route dengan ID anggota --}}
                            <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                        </td>
                        <td class="text-center">
                            {{-- Form Hapus: Menggunakan metode DELETE --}}
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus anggota ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Data anggota masih kosong.</td>
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

@endsection