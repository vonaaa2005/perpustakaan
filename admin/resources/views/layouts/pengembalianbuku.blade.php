@extends('layout.index')

@section('title', 'Pengembalian Buku')

@section('content')

<div class="container py-7 mx-auto">
    <h3 class="text-center">Pengembalian Buku</h3>
    
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th class="text-center">No.</th>
                    <th>Nama Anggota</th>
                    <th class="text-center">ID.Anggota</th>
                    <th>Judul Buku</th>
                    <th class="text-center">Tgl. Peminjaman</th>
                    <th class="text-center">Batas Pengembalian</th>
                    <th class="text-center">Status Overdue</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengembalian as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td>{{ $data->anggota->nama_anggota ?? '' }}</td>
                    <td class="text-center">{{ $data->anggota->id_anggota ?? '' }}</td>
                    <td>{{ $data->buku->judul ?? '' }}</td>
                    <td class="text-center">{{ $data->tanggal_peminjaman ? \Carbon\Carbon::parse($data->tanggal_peminjaman)->format('d-m-Y') : 'N/A' }}</td>
                    <td class="text-center">{{ $data->tanggal_kembali ? \Carbon\Carbon::parse($data->tanggal_kembali)->format('d-m-Y') : 'N/A' }}</td>
                    <td class="text-center">
                        @php
                            $dueDate = $data->tanggal_kembali ? \Carbon\Carbon::parse($data->tanggal_kembali) : \Carbon\Carbon::now();
                            $now = \Carbon\Carbon::now();
                            $overdueDays = (int) $now->diffInDays($dueDate, false);
                            if ($overdueDays > 0) {
                                echo '<span class="badge bg-danger">Terlambat ' . $overdueDays . ' hari</span>';
                            } else {
                                echo '<span class="badge bg-success">Tepat waktu</span>';
                            }
                        @endphp
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btn-sm proses-btn" data-bs-toggle="modal" data-bs-target="#modalPengembalian{{ $data->id }}" data-overdue="{{ $overdueDays }}" data-id="{{ $data->id }}">
                            Proses Pengembalian
                        </button>
                    </td>
                </tr>

                {{-- Modal for each item --}}
                <div class="modal fade" id="modalPengembalian{{ $data->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">Konfirmasi Pengembalian - {{ $data->buku->judul ?? '' }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-0">
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('gambar/' . ($data->buku->gambar ?? 'buku1.png')) }}" alt="{{ $data->buku->judul ?? '' }}" class="img-fluid mb-2" style="max-height: 200px; object-fit: cover;">
                                        <h6 class="text-truncate">{{ $data->buku->judul ?? '' }}</h6>
                                    </div>
                                    <div class="col-md-12 px-3">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <dl class="row mb-0">
                                                    <dt class="col-sm-5"><strong></strong></dt>
                                                    <dd class="col-sm-7">{{ $data->anggota->nama_anggota ?? '' }}</dd>
                                                    <dt class="col-sm-5"><strong>Tanggal Peminjaman:</strong></dt>
                                                    <dd class="col-sm-7">{{ $data->tanggal_peminjaman ? \Carbon\Carbon::parse($data->tanggal_peminjaman)->translatedFormat('d F Y') : '' }}</dd>
                                                    <dt class="col-sm-5"><strong>Batas Pengembalian:</strong></dt>
                                                    <dd class="col-sm-7">{{ $data->tanggal_kembali ? \Carbon\Carbon::parse($data->tanggal_kembali)->translatedFormat('d F Y') : '' }}</dd>
                                                    <dt class="col-sm-5"><strong>Status Pengembalian:</strong></dt>
                                                    <dd class="col-sm-7">{{ now()->translatedFormat('d F Y') }}</dd>
                                                </dl>
                                            </div>
                                        </div>

                                        @php
                                            $dueDate = $data->tanggal_kembali ? \Carbon\Carbon::parse($data->tanggal_kembali) : \Carbon\Carbon::now();
                                            $now = \Carbon\Carbon::now();
                                            $overdueDays = (int) $now->diffInDays($dueDate, false);
                                            $dendaOverdue = $overdueDays > 0 ? $overdueDays * 1000 : 0;
                                        @endphp

                                        <div class="alert alert-warning" role="alert">
                                            <strong>Denda Keterlambatan:</strong> Rp {{ number_format($dendaOverdue, 0, ',', '.') }} ({{ $overdueDays }} hari terlambat)
                                        </div>

                                        <form action="{{ route('pengembalian.proses', $data->id) }}" method="POST" id="formPengembalian{{ $data->id }}">
                                            @csrf
                                            <input type="hidden" name="denda_kerusakan" id="dendaKerusakan{{ $data->id }}" value="0">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Kondisi Buku:</label>
                                                <div class="d-grid gap-2 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input kondisi-radio" type="radio" name="kondisi" id="ringan{{ $data->id }}" value="ringan" data-denda="10000" required>
                                                        <label class="form-check-label" for="ringan{{ $data->id }}">Ringan (Rp 10.000)</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input kondisi-radio" type="radio" name="kondisi" id="sedang{{ $data->id }}" value="sedang" data-denda="25000">
                                                        <label class="form-check-label" for="sedang{{ $data->id }}">Sedang (Rp 25.000)</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input kondisi-radio" type="radio" name="kondisi" id="berat{{ $data->id }}" value="berat" data-denda="50000">
                                                        <label class="form-check-label" for="berat{{ $data->id }}">Berat (Rp 50.000)</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input kondisi-radio" type="radio" name="kondisi" id="hilang{{ $data->id }}" value="hilang" data-denda="100000">
                                                        <label class="form-check-label" for="hilang{{ $data->id }}">Hilang (Rp 100.000)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi{{ $data->id }}" class="form-label">Deskripsi:</label>
                                                <textarea class="form-control" id="deskripsi{{ $data->id }}" name="deskripsi" rows="3" placeholder="Jelaskan kondisi buku..."></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="denda{{ $data->id }}" class="form-label">Denda Tambahan (Rp):</label>
                                                <input type="number" name="denda" id="denda{{ $data->id }}" value="0" min="0" step="1000" class="form-control" placeholder="Masukkan denda tambahan lainnya">
                                            </div>
                                            <div class="alert alert-info mb-3">
                                                <strong>Total Denda: Rp <span id="totalDenda{{ $data->id }}">{{ number_format($dendaOverdue, 0, ',', '.') }}</span></strong>
                                            </div>
                                            <div class="d-flex justify-content-end gap-2">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Konfirmasi Pengembalian</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Tidak ada buku yang perlu dikembalikan.</td>
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

<script>
    // JS for dynamic total denda on radio and input change per modal
    document.addEventListener('DOMContentLoaded', function() {
        // Handle kondisi radio changes
        const kondisiRadios = document.querySelectorAll('.kondisi-radio');
        kondisiRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const id = this.id.replace(/ringan|hilang|sedang|berat/, '');
                const dendaKerusakanInput = document.getElementById('dendaKerusakan' + id);
                const dendaInput = document.getElementById('denda' + id);
                const totalSpan = document.getElementById('totalDenda' + id);
                const button = document.querySelector(`[data-bs-target="#modalPengembalian${id}"]`);
                const overdueDays = parseInt(button.dataset.overdue) || 0;
                const dendaOverdue = overdueDays * 1000;
                const dendaKerusakan = parseInt(this.dataset.denda) || 0;
                const additional = parseInt(dendaInput.value) || 0;
                dendaKerusakanInput.value = dendaKerusakan;
                const total = dendaOverdue + dendaKerusakan + additional;
                totalSpan.textContent = new Intl.NumberFormat('id-ID').format(total);
            });
        });

        // Handle manual denda input changes
        const dendaInputs = document.querySelectorAll('input[name="denda"]');
        dendaInputs.forEach(input => {
            input.addEventListener('input', function() {
                const id = this.id.replace('denda', '');
                const totalSpan = document.getElementById('totalDenda' + id);
                const dendaKerusakanInput = document.getElementById('dendaKerusakan' + id);
                const button = document.querySelector(`[data-bs-target="#modalPengembalian${id}"]`);
                const overdueDays = parseInt(button.dataset.overdue) || 0;
                const dendaOverdue = overdueDays * 1000;
                const dendaKerusakan = parseInt(dendaKerusakanInput.value) || 0;
                const additional = parseInt(this.value) || 0;
                const total = dendaOverdue + dendaKerusakan + additional;
                totalSpan.textContent = new Intl.NumberFormat('id-ID').format(total);
            });
        });

        // Handle form submission with AJAX to prevent immediate page reload and modal close
        const forms = document.querySelectorAll('form[id^="formPengembalian"]');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                const formData = new FormData(this);
                const modalId = this.id.replace('formPengembalian', 'modalPengembalian');
                const modal = bootstrap.Modal.getInstance(document.getElementById(modalId)) || new bootstrap.Modal(document.getElementById(modalId));

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Pengembalian buku berhasil diproses!');
                        modal.hide(); // Close modal on success
                        if (data.bukti_url) {
                            window.location.href = data.bukti_url; // Redirect to bukti
                        } else {
                            location.reload(); // Fallback reload
                        }
                    } else {
                        alert('Error: ' + (data.message || 'Terjadi kesalahan saat memproses pengembalian.'));
                    }
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan jaringan. Silakan coba lagi.');
                });
            });
        });
    });
</script>

@endsection
