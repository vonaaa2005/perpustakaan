@extends('layout.index')

@section('title', 'Bukti Peminjaman')

@section('content')
<div class="container-fluid py-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('gambar/gambar/Logo Kota Payakumbuh.png') }}" alt="Logo Kota Payakumbuh" style="height: 50px; margin-right: 15px; flex-shrink: 0;">
                    <div class="text-center">
                        <h3 class="mb-1">Perpustakaan Daerah Kota Payakumbuh</h3>
                        <h5 class="mb-0">Bukti Peminjaman Buku</h5>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="text-center">
                        <p class="mb-2"><strong>Judul Buku:</strong> {{ $peminjaman->buku->judul ?? 'N/A' }}</p>
                        <p class="mb-2"><strong>Nama Anggota:</strong> {{ $peminjaman->anggota->nama_anggota ?? 'N/A' }}</p>
                        <p class="mb-2"><strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_peminjaman ? \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d F Y') : 'N/A' }}</p>
                        <p class="mb-0"><strong>Tanggal Kembali:</strong> {{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d F Y') : 'N/A' }}</p>
                    </div>
                </div>
                <div class="card-footer text-center bg-light py-2">
                    <button onclick="window.print()" class="btn btn-primary btn-sm me-2">Cetak</button>
                    <button onclick="downloadPDF()" class="btn btn-success btn-sm">Simpan PDF</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
var judulBuku = "{{ $peminjaman->buku->judul ?? 'N/A' }}";
var namaAnggota = "{{ $peminjaman->anggota->nama_anggota ?? 'N/A' }}";
var tanggalPinjam = "{{ $peminjaman->tanggal_peminjaman ? \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d F Y') : 'N/A' }}";
var tanggalKembali = "{{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d F Y') : 'N/A' }}";

function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    doc.setFontSize(18);
    doc.text('Perpustakaan Daerah Kota Payakumbuh', 105, 20, { align: 'center' });
    doc.setFontSize(14);
    doc.text('Bukti Peminjaman Buku', 105, 35, { align: 'center' });
    
    doc.setFontSize(11);
    doc.text('Judul Buku: ' + judulBuku, 20, 60);
    doc.text('Nama Anggota: ' + namaAnggota, 20, 75);
    doc.text('Tanggal Pinjam: ' + tanggalPinjam, 20, 90);
    doc.text('Tanggal Kembali: ' + tanggalKembali, 20, 105);
    
    doc.save('bukti-peminjaman.pdf');
}
</script>

<style>
@media print {
    .card-footer { display: none; }
    .no-print { display: none; }
}
</style>
@endsection
