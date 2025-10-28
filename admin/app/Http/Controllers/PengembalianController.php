<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    /**
     * Menampilkan daftar peminjaman yang siap dikembalikan (status 'dipinjam').
     */
    public function index()
    {
        $pengembalian = Peminjaman::where('status', 'dipinjam')
                                   ->with(['anggota', 'buku'])
                                   ->get();

        return view('layouts.pengembalianbuku', compact('pengembalian'));
    }

    /**
     * Memproses pengembalian buku (update status dan stok).
     */
    public function prosesPengembalian(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'kondisi' => 'required|in:ringan,hilang,sedang,berat',
            'deskripsi' => 'nullable|string|max:500',
            'denda' => 'required|numeric|min:0',
            'denda_kerusakan' => 'required|numeric|min:0',
        ]);

        $peminjaman->load(['buku', 'anggota']);

        if (!$peminjaman->buku) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Buku tidak ditemukan.']);
            }
            return back()->with('error', 'Buku tidak ditemukan.');
        }

        if (!$peminjaman->anggota) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Anggota tidak ditemukan.']);
            }
            return back()->with('error', 'Anggota tidak ditemukan.');
        }

        $dueDate = Carbon::parse($peminjaman->tanggal_kembali);
        $now = Carbon::now();
        $overdueDays = $now->diffInDays($dueDate, false);
        $baseDenda = $overdueDays > 0 ? $overdueDays * 1000 : 0;

        // Use denda_kerusakan from request (set by JS based on kondisi)
        $dendaKerusakan = $request->denda_kerusakan;

        $totalDenda = $baseDenda + $dendaKerusakan + $request->denda;

        $kondisiStr = $request->kondisi;
        $kerusakanDesc = ucfirst($kondisiStr) . ($request->deskripsi ? ': ' . $request->deskripsi : '');

        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now(),
            'deskripsi_kerusakan' => $kerusakanDesc,
        ]);

        // Increment stok buku unless hilang
        if ($request->kondisi !== 'hilang') {
            $peminjaman->buku->increment('stok');
        }

        // Tambah denda ke anggota
        $peminjaman->anggota->increment('denda', $totalDenda);

        $successMessage = 'Buku berhasil dikembalikan! Total denda: Rp ' . number_format($totalDenda, 0, ',', '.');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
                'bukti_url' => route('pengembalian.bukti', $peminjaman->id)
            ]);
        }

        return redirect()->route('pengembalian.bukti', $peminjaman->id)
                         ->with('success', $successMessage);
    }

    /**
     * Menampilkan bukti pengembalian.
     */
    public function buktiPengembalian(Peminjaman $peminjaman)
    {
        $peminjaman->load(['anggota', 'buku']);

        // Hitung denda untuk tampilan
        $dueDate = Carbon::parse($peminjaman->tanggal_kembali);
        $now = Carbon::parse($peminjaman->tanggal_kembali); // Tanggal aktual pengembalian
        $overdueDays = $now->diffInDays($dueDate, false);
        $dendaOverdue = $overdueDays > 0 ? $overdueDays * 1000 : 0;

        // Denda kerusakan dari deskripsi_kerusakan
        $dendaKerusakan = 0;
        if ($peminjaman->deskripsi_kerusakan) {
            $kondisi = strtolower(explode(':', $peminjaman->deskripsi_kerusakan)[0]);
            switch ($kondisi) {
                case 'ringan': $dendaKerusakan = 10000; break;
                case 'sedang': $dendaKerusakan = 25000; break;
                case 'berat': $dendaKerusakan = 50000; break;
                case 'hilang': $dendaKerusakan = 100000; break;
            }
        }

        $totalDenda = $dendaOverdue + $dendaKerusakan;

        return view('pengembalian.bukti', compact('peminjaman', 'dendaOverdue', 'dendaKerusakan', 'totalDenda'));
    }
}
