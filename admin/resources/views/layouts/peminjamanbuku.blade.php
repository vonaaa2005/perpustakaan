@extends('layout.index')

@section('title', 'Konfirmasi Peminjaman')

@section('content')

<div class="container-fluid py-4">
    <h3 class="text-center">Konfirmasi Pengajuan Peminjaman</h3>
    
    <a href="{{ route('peminjaman.create') }}" class="btn btn-success mb-3">Pengajuan Peminjaman Baru</a>
    
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th class="text-center">No.</th>
                    <th>Nama Anggota</th>
                    <th class="text-center">ID.Anggota</th>
                    <th>Judul Buku</th>
                    <th class="text-center">Tgl. Pengajuan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop data pengajuan yang dikirim dari Controller --}}
                @forelse ($pengajuan as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td>{{ $data->anggota->nama_anggota ?? 'N/A' }}</td> 
                    <td class="text-center">{{ $data->anggota->id_anggota ?? 'N/A' }}</td>
                    <td>{{ $data->buku->judul ?? 'N/A' }}</td> 
                    <td class="text-center">{{ $data->tanggal_pengajuan ? \Carbon\Carbon::parse($data->tanggal_pengajuan)->format('d-m-Y') : 'N/A' }}</td>
                    <td class="text-center">
                        {{-- Tombol Konfirmasi --}}
                        <form action="{{ route('peminjaman.konfirmasi', $data->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Konfirmasi</button>
                        </form>
                        {{-- Tombol Tolak --}}
                        <form action="{{ route('peminjaman.tolak', $data->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menolak pengajuan ini?')">Tolak</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada pengajuan peminjaman yang perlu dikonfirmasi.</td>
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

@endsection