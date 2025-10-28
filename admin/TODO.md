# TODO: Update Pengembalian Buku Form to Match Provided Image

## Steps to Complete:

- [x] Step 1: Update PengembalianController.php
  - Calculate overdue_days and base_denda in prosesPengembalian().
  - Update validation: 'kondisi' => 'required|in:rusak,ringan,sedang,parah,hilang', 'deskripsi' => 'nullable|string', 'denda' => 'required|numeric|min:0'.
  - total_denda = base_denda + $request->denda.
  - If 'hilang' in kondisi, do not increment buku->stok.
  - Update peminjaman: status='dikembalikan', tanggal_kembali=now(), kondisi_kerusakan=ucfirst(kondisi) . ($deskripsi ? ': ' . $deskripsi : '').
  - Increment anggota->denda by total_denda.

- [x] Step 2: Update resources/views/layouts/pengembalianbuku.blade.php
  - In modal: Add book image (assume $data->buku->gambar, fallback to placeholder).
  - Restructure: Left - image + judul (with tahun if available), Right - Peminjam, Tanggal Peminjaman, Batas Pengembalian (tanggal_kembali), Status Pengembalian (now() formatted).
  - Kondisi: Radio buttons name="kondisi" for Rusak, Hilang, Sedang, Parah.
  - Deskripsi textarea.
  - Denda: <input type="number" name="denda" value="0" min="0">.
  - Remove overdue calc in view, hidden fields, JS.
  - Update table header: "Batas Pengembalian" for Tgl. Kembali.
  - Buttons: Konfirmasi Pengembalian (submit), Batal (dismiss).

- [x] Step 3: Verify routes in routes/web.php
  - Confirmed: GET /pengembalianbuku -> index (name 'pengembalian.index'), POST /pengembalian/proses/{peminjaman} -> prosesPengembalian (name 'pengembalian.proses').

- [ ] Step 4: Test Changes
  - Run php artisan serve.
  - Navigate to /pengembalianbuku, open modal, check layout matches image.
  - Submit form, verify DB: status updated, denda added, stok incremented (unless hilang).

- [ ] Step 5: Final Review and Completion
