@extends('layout.index')

@section('title', 'Bukti Pengembalian Buku')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0"><i class="fas fa-check-circle"></i> Bukti Pengembalian Buku</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('gambar/Logo Kota Payakumbuh.png') }}" alt="Logo" class="img-fluid" style="max-height: 80px;">
                        <h5 class="mt-2">Perpustakaan Kota Payakumbuh</h5>
                        <p class="text-muted">Bukti Pengembalian Buku</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h6>Data Anggota:</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td width="40%">Nama</td>
                                    <td>: {{ $peminjaman->anggota->nama_anggota ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>ID Anggota</td>
                                    <td>: {{ $peminjaman->anggota->id_anggota ?? '' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Data Buku:</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td width="40%">Judul</td>
                                    <td>: {{ $peminjaman->buku->judul ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Pengarang</td>
                                    <td>: {{ $peminjaman->buku->pengarang ?? '' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h6>Detail Peminjaman:</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td width="50%">Tanggal Peminjaman</td>
                                    <td>: {{ $peminjaman->tanggal_peminjaman ? \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->translatedFormat('d F Y') : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Batas Pengembalian</td>
                                    <td>: {{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->translatedFormat('d F Y') : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengembalian</td>
                                    <td>: {{ now()->translatedFormat('d F Y') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Kondisi Buku:</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td width="50%">Status</td>
                                    <td>: {{ ucfirst($peminjaman->deskripsi_kerusakan ?? 'Baik') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <h6>Rincian Denda:</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td>Denda Keterlambatan</td>
                                    <td class="text-end">Rp {{ number_format($dendaOverdue, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Denda Kerusakan</td>
                                    <td class="text-end">Rp {{ number_format($dendaKerusakan, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="table-active fw-bold">
                                    <td>Total Denda</td>
                                    <td class="text-end">Rp {{ number_format($totalDenda, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="alert alert-success text-center" role="alert">
                        <strong>Pengembalian berhasil diproses!</strong><br>
                        Buku telah dikembalikan dengan status "{{ $peminjaman->status }}".
                    </div>

                    <div class="text-center mt-4">
                        <button onclick="window.print()" class="btn btn-primary me-2">
                            <i class="fas fa-print"></i> Cetak Bukti
                        </button>
                        <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Pengembalian
                        </a>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    <small>Dicetak pada: {{ now()->translatedFormat('d F Y H:i:s') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .btn, .card-footer { display: none !important; }
    .card { border: none !important; box-shadow: none !important; }
}
</style>
@endsection
