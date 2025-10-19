{{-- resources/views/pencarian.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-library | Pencarian</title>

    {{-- Bootstrap 5 CSS via CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Font Awesome untuk icon search dan logo --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMD/CDQ6j32N/d8z+oA6t99hU6Q6Wp7k3e0t2jE6M6O5n90H6Z5M8O6t5j5O6w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom Style agar Card Pencarian mirip gambar --}}
    <style>
        /* CSS umum (tetap) */
        body { background-color: #f8f9fa; }
        .navbar-custom { background-color: #ffffff; }
        .main-content-pencarian { padding-top: 50px; }
        .search-card-bg {
            background-color: #bbdefb; 
            padding: 40px;
        }
        .btn-kategori {
            background-color: white;
            color: #495057;
            border: none;
            font-weight: 500;
        }
        .btn-kategori:hover {
            background-color: #f0f0f0;
            color: #0d6efd;
        }
        /* --- STYLE BARU KHUSUS UNTUK TOMBOL SEARCH --- */
        .btn-search-custom {
            /* Menyesuaikan ukuran tombol */
            padding: 0.5rem 1rem; /* Padding lebih kecil dari default lg */
            line-height: 1.5;
            font-size: 1.25rem;
            
            /* Mengatur bentuk tombol agar sesuai dengan input group */
            border-radius: 0 0.5rem 0.5rem 0 !important;
            
            /* Warna latar belakang biru tua (sama dengan btn-primary default Bootstrap) */
            background-color: #0d6efd; 
            border-color: #0d6efd;
            
            /* Menyesuaikan lebar tombol secara eksplisit jika perlu */
            width: 55px; /* Lebar yang lebih kecil dan presisi */
        }
        
        /* Mengatur input agar memiliki sudut bundar di kiri saja */
        .form-control-search-custom {
            border-radius: 0.5rem 0 0 0.5rem !important;
        }
    </style>
</head>
<body>

    {{-- 
        **********************************************************
        NAVBAR (Header E-library)
        **********************************************************
    --}}
    <nav class="navbar navbar-expand-lg navbar-custom border-bottom shadow-sm">
        <div class="container-fluid container-xl">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="fa-solid fa-book-open"></i> E-library
            </a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        {{-- Tautan aktif ke halaman ini --}}
                        <a class="nav-link active fw-bold text-primary" aria-current="page" href="{{ route('pencarian.index') }}">Pencarian</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    {{-- 
        **********************************************************
        KONTEN UTAMA PENCARIAN (Sesuai Gambar 2)
        **********************************************************
    --}}
    <div class="container main-content-pencarian">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="search-card-bg rounded-3 shadow-lg"> {{-- Area biru muda --}}

                    {{-- Form Pencarian yang sudah diubah --}}
                    <form action="{{ route('pencarian.hasil') }}" method="GET" class="mb-5">
                        <div class="input-group input-group-lg">
                            
                            {{-- Input Field --}}
                            <input type="text" 
                                   name="query" 
                                   class="form-control form-control-search-custom" 
                                   placeholder="Masukkan judul, penulis, atau kategori" 
                                   aria-label="Search" 
                                   value="{{ $query ?? '' }}">
                            
                            {{-- Tombol Search Biru Kecil --}}
                            <button class="btn btn-primary btn-search-custom" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    
                    {{-- Tombol Kategori (Menggunakan Bootstrap Grid) --}}
                    <div class="row g-4 text-center">
                        {{-- Baris 1: 4 Kolom --}}
                        <div class="col-6 col-sm-3">
                            <a href="#" class="btn btn-kategori w-100 py-3 shadow-sm">Fiksi</a>
                        </div>
                        <div class="col-6 col-sm-3">
                            <a href="#" class="btn btn-kategori w-100 py-3 shadow-sm">Non-Fiksi</a>
                        </div>
                        <div class="col-6 col-sm-3">
                            <a href="#" class="btn btn-kategori w-100 py-3 shadow-sm">Bacaan Anak & Remaja</a>
                        </div>
                        <div class="col-6 col-sm-3">
                            <a href="#" class="btn btn-kategori w-100 py-3 shadow-sm">Saintek</a>
                        </div>

                        {{-- Baris 2: 3 Kolom --}}
                        <div class="col-6 col-sm-3">
                            <a href="#" class="btn btn-kategori w-100 py-3 shadow-sm">Pendidikan</a>
                        </div>
                        <div class="col-6 col-sm-3">
                            <a href="#" class="btn btn-kategori w-100 py-3 shadow-sm">Penerbitan Rutin</a>
                        </div>
                        <div class="col-12 col-sm-6"> {{-- Referensi mengambil 6 kolom agar berada di tengah --}}
                            <a href="#" class="btn btn-kategori w-100 py-3 shadow-sm">Referensi</a>
                        </div>
                    </div>
                </div>
                
                {{-- AREA HASIL PENCARIAN (Tambahkan di sini) --}}
                @isset($results)
                <div class="mt-5 pt-3 border-top">
                    <h4>Hasil Pencarian</h4>
                    {{-- ... Masukkan kode list hasil pencarian dari Controller di sini ... --}}
                </div>
                @endisset

            </div>
        </div>
    </div>

    {{-- Bootstrap 5 JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>