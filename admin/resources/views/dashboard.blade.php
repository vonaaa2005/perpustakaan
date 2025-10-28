@extends('layout.index')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <!-- Custom centered dashboard card -->
      <div style="background:#8ec6e4; padding:30px; border-radius:6px;">
        <div class="container" style="max-width:1000px; margin:0 auto;">
          <div style="background:#fdeee6; padding:30px; border-radius:8px; box-shadow:0 6px 18px rgba(0,0,0,0.08);">
            <div style="text-align:center; margin-bottom:18px;">
              <h2 style="font-weight:700; margin:0 0 8px;">Dashboard Pustakawan</h2>
              <hr style="border:none; border-top:1px solid #e0d6d1; width:60%; margin:8px auto 18px;" />
            </div>

            <div class="d-flex justify-content-center" style="margin-bottom:18px;">
              <div style="width:360px;">
                <a href="{{ route('buku.index') }}" class="btn btn-primary d-block" style="background:#1967ff; border:none; margin:8px 0; padding:10px 18px; border-radius:8px;">Manajemen Data Buku</a>
                <a href="{{ route('anggota.index') }}" class="btn btn-primary d-block" style="background:#1967ff; border:none; margin:8px 0; padding:10px 18px; border-radius:8px;">Manajemen Data Anggota</a>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-primary d-block" style="background:#1967ff; border:none; margin:8px 0; padding:10px 18px; border-radius:8px;">Peminjaman Buku</a>
                <a href="{{ route('pengembalian.index') }}" class="btn btn-primary d-block" style="background:#1967ff; border:none; margin:8px 0; padding:10px 18px; border-radius:8px;">Pengembalian Buku</a>
              </div>
            </div>

            <div class="row text-center" style="margin-top:20px;">
              <div class="col-md-4 mb-3">
                <div class="stat-card" style="border-radius:6px; padding:16px; border:1px solid #e6e6e6 !important; background:#f5f5f7 !important;">
                  <small style="display:block; color:#666;">Buku Dipinjam :</small>
                  <h4 style="margin:6px 0 0;">123</h4>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="stat-card" style="border-radius:6px; padding:16px; border:1px solid #e6e6e6 !important; background:#f5f5f7 !important;">
                  <small style="display:block; color:#666;">Anggota Aktif :</small>
                  <h4 style="margin:6px 0 0;">250</h4>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="stat-card" style="border-radius:6px; padding:16px; border:1px solid #e6e6e6 !important; background:#f5f5f7 !important;">
                  <small style="display:block; color:#666;">Buku Tersedia :</small>
                  <h4 style="margin:6px 0 0;">6.000</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      
    </div>
  </div>
</div>
@endsection
