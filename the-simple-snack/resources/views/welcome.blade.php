<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Simple Snack</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FONT -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />

    <!-- ICONIFY -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <style>
      /* ================= GLOBAL ================= */
      html {
          scroll-behavior: smooth;
       }
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

      body {
          overflow-x: hidden; /* Mencegah scroll ke samping yang tidak perlu */
      }
      body {
        font-family: "Poppins", sans-serif;
        background: #fafafa;
        color: #1a1a1a;
        line-height: 1.6;
      }

      /* ================= NAVBAR ================= */
      .navbar {
        position: sticky;
        top: 0;
        background: #fce4ec;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 8%;
        z-index: 100;
      }

      .logo {
        color: #e91e63;
        font-weight: 600;
        font-size: 16px;
      }

      .nav-menu {
        display: flex;
        gap: 28px;
        align-items: center;
      }

      .nav-menu a {
        text-decoration: none;
        color: #555;
        font-size: 14px;
        transition: 0.2s;
      }

      .nav-menu a.active {
        color: #e91e63;
        font-weight: 600;
      }

     .btn-nav {
        background: transparent;
        color: #e91e63;
        padding: 6px 14px;
        border-radius: 20px;
      }

      .btn-nav.active {
        background: #e91e63;
        color: white;
      }

      

      /* ================= HERO ================= */
      .hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 80px 8%;
        gap: 50px;
      }

      .hero-text h1 {
        color: #c2185b;
        font-size: 38px;
        margin-bottom: 12px;
      }

      .hero-text p {
        margin-bottom: 24px;
        color: #555;
      }

      .hero-image img {
        width: 380px;
        border-radius: 20px;
      }

      /* ================= BUTTON ================= */
      button {
        background: #e91e63;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 999px;
        cursor: pointer;
        font-weight: 500;
        transition: 0.2s;
      }

      button:hover {
        opacity: 0.9;
      }

      /* ================= SECTION ================= */
      .container {
        max-width: 1100px;
        margin: auto;
        padding: 80px 20px;
      }

      .section-title {
        text-align: center;
        color: #c2185b;
        margin-bottom: 40px;
        font-size: 20px;
        font-weight: 600;
      }

      /* ================= EVENT ================= */
      .event-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
      }

      .event-card {
        background: white;
        padding: 24px;
        border-radius: 14px;
        text-align: center;
        border: 1px solid #eee;
        transition: 0.2s;
      }

      .event-card:hover {
        transform: translateY(-4px);
      }

      /* ================= AI BOX ================= */
      .recommend-box {
        background: #f1f8e9;
        padding: 30px;
        border-radius: 16px;
      }

      input,
      select {
        padding: 12px;
        width: 100%;
        margin-bottom: 15px;
        border-radius: 10px;
        border: 1px solid #ddd;
        font-family: "Poppins";
      }

      .recommend-box button {
        background: #66bb6a;
        color: white;
        border-radius: 10px;
        padding: 10px 18px;
      }

      /* ================= PRODUCTS ================= */
      .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 24px;
      }

      .product {
        background: white;
        padding: 18px;
        border-radius: 14px;
        border: 1px solid #eee;
        transition: 0.2s;
      }

      .product:hover {
        transform: translateY(-5px);
      }

      .product img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 12px;
      }

      .product h3 {
        margin-bottom: 6px;
      }

      .product p {
        margin-bottom: 12px;
        color: #666;
      }

      .product button {
        width: 100%;
        border-radius: 10px;
      }

      /* ================= CART ================= */
      .cart {
        background: white;
        padding: 20px;
        border-radius: 14px;
        margin-top: 40px;
        border: 1px solid #eee;
      }

      .cart ul {
        margin-bottom: 12px;
      }

      /* NEW CART STYLE */
      .cart-header,
      .cart-item {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        padding: 10px;
        font-size: 14px;
      }

      .cart-header {
        color: #888;
        border-bottom: 1px solid #eee;
      }

      .cart-item {
        border-bottom: 1px solid #f1f1f1;
        align-items: center;
      }

      .qty-btn {
        padding: 4px 8px;
        border-radius: 6px;
        background: #eee;
        cursor: pointer;
        margin: 0 4px;
      }

      textarea {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        font-family: "Poppins";
      }

      /* ================= TESTIMONI ================= */
      .testimoni {
        background: white;
        padding: 60px 8%;
      }

      .review-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
      }

      .review {
        background: #fce4ec;
        padding: 20px;
        border-radius: 12px;
      }

      /* ================= FOOTER ================= */
      footer {
        background: #e91e63;
        color: white;
        padding: 40px 8%;
      }

      .footer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
      }

      #ratingTesti iconify-icon {
        font-size: 22px;
        cursor: pointer;
        color: #bbb;
      }

      #ratingTesti iconify-icon.active {
        color: #e91e63;
      }

      /* ================= RESPONSIVE (TAMBAHAN SAJA) ================= */

      /* Tablet */
      @media (max-width: 992px) {
        .hero {
          flex-direction: column;
          text-align: center;
        }

        .hero-image img {
          width: 100%;
          max-width: 300px;
        }

        .navbar {
          flex-direction: column;
          gap: 10px;
        }

        .nav-menu {
          flex-wrap: wrap;
          justify-content: center;
        }
      }

      /* Mobile */
      @media (max-width: 600px) {
        .hero {
          padding: 40px 5%;
        }

        .container {
          padding: 40px 15px;
        }

        .hero-text h1 {
          font-size: 26px;
        }

        .hero-text p {
          font-size: 14px;
        }

        .product-grid {
          grid-template-columns: 1fr;
        }

        .event-grid {
          grid-template-columns: 1fr;
        }

        .review-grid {
          grid-template-columns: 1fr;
        }

        .cart-header,
        .cart-item {
          grid-template-columns: 1fr 1fr;
          font-size: 12px;
        }

        .footer-grid {
          grid-template-columns: 1fr;
          text-align: center;
        }
      }
    </style>
  </head>

  <body>
   <!-- ================= NAVBAR ================= -->
    <div class="navbar" style="background-color: #fce7f3; padding: 10px 30px; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
          
        <div style="display: flex; align-items: center; gap: 8px;">
              <img src="{{ asset('assets/logo.png') }}" 
                  style="height: 32px; width: auto; object-fit: contain;">
              <span style="color: #ec4899; font-weight: bold; font-size: 18px; white-space: nowrap;">
                  The Simple Snack
              </span>
        </div>

    <div class="nav-menu" style="display: flex; flex-direction: row; align-items: center; gap: 8px; flex-wrap: nowrap;">
          <a href="#katalog" style="background-color: #ec4899; color: white; padding: 6px 14px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 12px; white-space: nowrap;">
            Katalog
          </a>

          <a href="#testimoni" style="background-color: #ec4899; color: white; padding: 6px 14px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 12px; white-space: nowrap;">
            Testimoni
          </a>

          <a href="javascript:void(0)" onclick="document.getElementById('kontak').scrollIntoView({behavior: 'smooth'})" style="background-color: #ec4899; color: white; padding: 6px 14px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 12px; white-space: nowrap;">
            Kontak
          </a>

          <a href="#katalog" class="btn-nav" style="background-color: #ec4899; color: white; padding: 6px 14px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 12px; white-space: nowrap;">
            Pesan
          </a>

          <!-- TOMBOL ASES CEPAT KE ADMIN (Otomatis muncul hanya jika admin sudah login) -->
          @auth
              <a href="{{ route('dashboard') }}" style="background-color: #10b981; color: white; padding: 6px 14px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 12px; white-space: nowrap; display: flex; align-items: center; gap: 4px;">
                <iconify-icon icon="mdi:security" style="font-size: 14px; vertical-align: middle;"></iconify-icon>
                Admin
              </a>
          @endauth
    </div>
</div>

    <!-- ================= HERO ================= -->
    <section class="hero">
      <div class="hero-text">
        <h1>Snack Cantik untuk Semua Acara</h1>
        <p>Temukan berbagai pilihan snack premium untuk berbagai acara</p>
        <button onclick="document.getElementById('katalog').scrollIntoView()">
          Lihat Katalog
        </button>
      </div>

      <div class="hero-image">
        <img src="{{ asset('assets/img/dash2.jpeg') }}">
      </div>
    </section>

    <!-- ================= EVENT ================= -->
  <section style="padding: 25px 0; background-color: #ffffff;">
    <div class="container" style="max-width: 1000px; margin: auto; text-align: center; padding: 0 20px;">
        
        <h2 style="color: #ec4899; font-weight: bold; margin-bottom: 25px; font-size: 20px;">
            Solusi Snack untuk Segala Acara
        </h2>

        <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
            
            @php
                $acara = ['Arisan', 'Ulang Birthday', 'Rapat', 'Hantaran'];
            @endphp

            @foreach($acara as $a)
                <div class="card-acara">
                    {{ $a }}
                </div>
            @endforeach

        </div>
    </div>
</section>

<style>
   
    .card-acara {
        min-width: 160px;
        padding: 12px 20px;
        background-color: #fce7f3; 
        color: #ec4899;            
        border-radius: 15px;       
        font-weight: 700;
        font-size: 15px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        cursor: default;
        box-shadow: 0 4px 6px rgba(236, 72, 153, 0.05);
        font-family: 'Quicksand', 'Poppins', sans-serif;
    }

    .card-acara:hover {
        background-color: #ec4899; /* Berubah jadi pink tua saat di-hover */
        color: white;
        transform: translateY(-3px); /* Efek melayang sedikit */
        box-shadow: 0 8px 12px rgba(236, 72, 153, 0.15);
    }

    /* Optimasi khusus tampilan mobile agar kotak acara rapi sejajar berpasangan */
    @media (max-width: 768px) {
        .card-acara {
            min-width: calc(50% - 15px); /* Bagi dua kolom di HP */
            padding: 10px 15px;
            font-size: 14px;
        }
    }
</style>
    <!-- ================= AI ================= -->
    <div class="container">
      <div class="recommend-box">
        <h2 class="section-title">Temukan Rekomendasi Paket Terbaik</h2>

        <label>Acara</label>
        <select id="event">
          <option>Arisan</option>
          <option>Ulang Tahun</option>
          <option>Rapat</option>
          <option>Hantaran</option>
        </select>

        <label>Budget</label>
        <input type="number" id="budget" />

        <label>Jumlah Orang</label>
        <input type="number" id="people" />

        <button onclick="recommend()">Cari Rekomendasi</button>

        <p id="recommendation"></p>
      </div>
    </div>

    <!-- ================= KATALOG ================= -->
     <div class="container-custom" id="katalog">
    <h2 class="section-title" style="margin-top: 40px;">Katalog Produk</h2>
    
    <div class="category-scroll-container">
        <a href="{{ route('pembeli.catalog') }}#katalog" 
           class="category-item {{ !request('category') ? 'active' : '' }}">
           Semua
        </a>
        
        @foreach(['Kue Kering', 'Birthday Cake', 'Snack', 'Bolu'] as $cat)
        <a href="{{ route('pembeli.catalog', ['category' => $cat]) }}#katalog" 
           class="category-item {{ request('category') == $cat ? 'active' : '' }}">
           {{ $cat }}
        </a>
        @endforeach
    </div>

    <div class="product-grid">
        @forelse($products as $product)
            <div class="product-card">
                <img src="{{ Str::contains($product->image, 'assets/img/') ? asset($product->image) : (Str::contains($product->image, 'products/') ? asset('storage/' . $product->image) : asset('assets/img/' . $product->image)) }}" 
                        onerror="this.src='https://placehold.co/300x200?text=No+Image'">
                <div class="product-tag">{{ $product->kategori }}</div>
                <h3>{{ $product->name }}</h3>
                <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <button class="btn-add" onclick="addCart('{{ $product->name }}', {{ $product->price }})">Tambah</button>
            </div>
        @empty
            <div class="empty-state">Belum ada produk untuk kategori ini.</div>
        @endforelse
    </div>
</div>

<style>
    /* Global & Container */
    body { overflow-x: hidden; font-family: 'Poppins', sans-serif; }
    .container-custom { max-width: 1100px; margin: auto; padding: 20px; }
    .section-title { text-align: center; color: #ec4899; font-size: 24px; font-weight: bold; margin-bottom: 25px; }

    /* Navbar */
    .navbar-custom { background: #fce7f3; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .navbar-content { display: flex; justify-content: space-between; align-items: center; padding: 10px 8%; }
    .logo-wrapper { display: flex; align-items: center; gap: 10px; }
    .logo-wrapper img { height: 40px; }
    .brand-name { color: #ec4899; font-weight: bold; font-size: 20px; }
    .btn-pesan { background: #ec4899; color: white !important; padding: 8px 20px; border-radius: 50px; }

    /* Hero */
    .hero { display: flex; align-items: center; justify-content: space-between; padding: 60px 8%; gap: 40px; }
    .hero-text h1 { color: #c2185b; font-size: 38px; line-height: 1.2; }
    .hero-image img { width: 100%; max-width: 450px; border-radius: 20px; }

    /* Event Grid */
    .event-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
    .card-acara { background: #fce7f3; padding: 25px; border-radius: 15px; text-align: center; color: #ec4899; font-weight: bold; font-size: 18px; transition: 0.3s; }

    /* Category Scroll (Katalog) */
    .category-scroll-container { display: flex; overflow-x: auto; gap: 10px; padding: 10px 5px; margin-bottom: 30px; justify-content: center; scrollbar-width: none; }
    .category-scroll-container::-webkit-scrollbar { display: none; }
    .category-item { padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 14px; white-space: nowrap; flex-shrink: 0; background: white; color: #4b5563; border: 1px solid #e5e7eb; }
    .category-item.active { background: #ec4899; color: white; border-color: #ec4899; }

    /* Product Grid */
    .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; }
    .product-card { background: white; padding: 15px; border-radius: 15px; border: 1px solid #f3f4f6; transition: 0.3s; }
    .product-card img { width: 100%; height: 180px; object-fit: cover; border-radius: 12px; }
    .product-tag { font-size: 10px; color: #ec4899; font-weight: bold; margin-top: 10px; }
    .product-card h3 { font-size: 18px; margin: 5px 0; }
    .price { font-weight: bold; color: #1f2937; }
    .btn-add { width: 100%; background: #ec4899; color: white; border: none; padding: 10px; border-radius: 10px; cursor: pointer; margin-top: 10px; }

    /* ================= MOBILE OPTIMIZATION ================= */
    @media (max-width: 768px) {
        .navbar-content { flex-direction: column; padding: 15px; gap: 10px; }
        .hero { flex-direction: column; text-align: center; padding: 40px 5%; }
        .hero-text h1 { font-size: 28px; }
        .category-scroll-container { justify-content: flex-start; padding-left: 20px; }
        .event-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
        .product-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; }
        .product-card h3 { font-size: 14px; }
    }
</style>
     <div class="cart">
      <h3 style="display: flex; align-items: center; gap: 8px">
        <iconify-icon icon="mdi:cart-outline"></iconify-icon> Keranjang Belanja</h3>

       <div class="cart-header">
            <span>Produk</span>
            <span>Harga</span>
            <span>Jumlah</span>
            <span>Subtotal</span>
        </div>

        <div id="cartItems"></div>

        <div style="text-align: right; margin-top: 10px; font-weight: 600"> Total: Rp <span id="total">0</span></div>

        <hr />

          <h3>Konfirmasi Pesanan</h3>

          <input id="nama" placeholder="Masukkan nama lengkap" />
          <input type="date" id="tanggal" />
          <textarea id="catatan" placeholder="Catatan tambahan (opsional)"></textarea>

          <button onclick="order()" style="display: flex; gap: 8px; justify-content: center; align-items: center; width: 100%;">
            <iconify-icon icon="mdi:whatsapp"></iconify-icon>
            Pesan via WhatsApp
          </button>
        </div>
      </div>

  <section id="testimoni" style="padding: 40px 0; background-color: white;">
    <div class="container" style="max-width: 1000px; margin: auto; padding: 0 20px;">
        
        <h2 style="text-align: center; font-size: 24px; font-weight: bold; color: #ec4899; margin-bottom: 25px;">Apa Kata Mereka?</h2>
        
        <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-bottom: 45px;">
            @php
                $testimonies = \App\Models\Testimony::latest()->take(3)->get();
            @endphp

            @forelse($testimonies as $item)
                <!-- Padding -->
                <div style="background-color: #fce7f3; color: #333; padding: 14px 20px; border-radius: 15px; flex: 1; min-width: 250px; max-width: 300px; text-align: center; box-shadow: 0 3px 6px rgba(0,0,0,0.02);">
                    <p style="margin: 0; font-size: 14px; line-height: 1.5; font-style: italic;">"{{ $item->pesan }}"</p>
                    <div style="margin-top: 8px; font-size: 12px; color: #ec4899; font-weight: bold;">
                        - {{ $item->nama }}
                    </div>
                    <div style="color: #facc15; font-size: 11px; margin-top: 3px;">
                        @for($i=0; $i<$item->rating; $i++)
                            <iconify-icon icon="mdi:star"></iconify-icon>
                        @endfor
                    </div>
                </div>
            @empty
                <p style="color: #999; font-style: italic; text-align: center; width: 100%;">Belum ada testimoni terbaru.</p>
            @endforelse
        </div>

        <h3 style="text-align: center; font-size: 22px; font-weight: bold; color: #ec4899; margin-bottom: 20px;">Beri Testimoni</h3>
        
        <div style="background-color: #f0f9eb; padding: 30px; border-radius: 20px; max-width: 800px; margin: auto;">
            <form action="{{ route('testimony.store') }}" method="POST">
                @csrf
                <input type="text" name="nama" placeholder="Nama" required 
                       style="width: 100%; padding: 10px 15px; border-radius: 10px; border: 1px solid #e0e0e0; margin-bottom: 12px; outline: none; font-family: inherit;">

                <div style="display: flex; gap: 6px; margin-bottom: 12px; font-size: 24px; color: #d1d5db;" id="star-rating">
                    <iconify-icon icon="mdi:star-outline" class="star" style="cursor: pointer;" data-value="1"></iconify-icon>
                    <iconify-icon icon="mdi:star-outline" class="star" style="cursor: pointer;" data-value="2"></iconify-icon>
                    <iconify-icon icon="mdi:star-outline" class="star" style="cursor: pointer;" data-value="3"></iconify-icon>
                    <iconify-icon icon="mdi:star-outline" class="star" style="cursor: pointer;" data-value="4"></iconify-icon>
                    <iconify-icon icon="mdi:star-outline" class="star" style="cursor: pointer;" data-value="5"></iconify-icon>
                </div>
                <input type="hidden" name="rating" id="rating_value" value="5">

                <textarea name="pesan" placeholder="Tulis testimoni" required 
                          style="width: 100%; padding: 10px 15px; border-radius: 10px; border: 1px solid #e0e0e0; height: 85px; margin-bottom: 15px; outline: none; resize: none; font-family: inherit;"></textarea>

                <button type="submit" style="background-color: #67c23a; color: white; padding: 10px 25px; border-radius: 8px; border: none; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 8px; font-size: 15px;">
                    <iconify-icon icon="mdi:send"></iconify-icon> Kirim
                </button>
            </form>
        </div>
    </div>
</section>

<section id="lokasi" class="py-12 px-4 bg-white">
    <div class="max-w-4xl mx-auto text-center">
       <div class="mb-8">
           <h3 style="text-align: center; color: #e43897; font-size: 24px; font-weight: bold; margin-bottom: 8px;">Lokasi Kami</h3>
      </div>

    <div class="w-full rounded-2xl overflow-hidden border-4 border-pink-100 shadow-sm">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.501428191752!2d110.30400117399928!3d-7.067711192934922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7063d713205037%3A0x8648a027ccb521f5!2sSimple%20Cookies%20Cake%20%26%20Snack!5e0!3m2!1sid!2sid!4v1777444132931!5m2!1sid!2sid8" 
        width="100%" 
        height="350" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
    </div>
</section>
    <!-- ================= FOOTER ================= -->
    <footer id="kontak" style="background-color: #ec4899; color: white; padding: 25px 0 15px 0; margin-top: 30px;">
    <div class="container" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px;">
        
        <div style="flex: 1; min-width: 200px;">
            <h4 style="font-weight: bold; margin-bottom: 12px; font-size: 16px;">Hubungi Kami</h4>
            <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <iconify-icon icon="mdi:whatsapp" width="18"></iconify-icon>
                    <span>085905447171</span>
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <iconify-icon icon="mdi:instagram" width="18"></iconify-icon>
                    <span>@_thesimple</span>
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <iconify-icon icon="ic:baseline-tiktok" width="16"></iconify-icon>
                    <span>@_thesimple</span>
                </div>
            </div>
            
            <div style="margin-top: 15px; display: flex; gap: 12px;">
                <a href="https://instagram.com/_thesimple" target="_blank" style="color: white; font-size: 20px;"><iconify-icon icon="mdi:instagram"></iconify-icon></a>
                <a href="https://tiktok.com/@_thesimple" target="_blank" style="color: white; font-size: 20px;"><iconify-icon icon="ic:baseline-tiktok"></iconify-icon></a>
                <a href="https://wa.me/6285905447171" target="_blank" style="color: white; font-size: 20px;"><iconify-icon icon="mdi:whatsapp"></iconify-icon></a>
            </div>
        </div>

        <div style="flex: 1; text-align: right; min-width: 200px; align-self: flex-end;">
            <div style="padding-top: 10px; border-top: 1px solid rgba(255,255,255,0.2); font-size: 11px;">
                <p>© 2026 The Simple Snack. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    </footer>

    
    <!-- ================= JS ================= -->
    <script>
      const links = document.querySelectorAll(".nav-menu a");

      links.forEach((link) => {
        link.addEventListener("click", function () {
          links.forEach((l) => l.classList.remove("active"));
          this.classList.add("active");
        });
      });

      let cart = [];
      let total = 0;

      function addCart(name, price) {
        let item = cart.find((i) => i.name === name);

        if (item) item.qty++;
        else cart.push({ name, price, qty: 1 });

        renderCart();
      }

      function changeQty(index, change) {
        cart[index].qty += change;
        if (cart[index].qty <= 0) cart.splice(index, 1);
        renderCart();
      }

      function renderCart() {
        let container = document.getElementById("cartItems");
        container.innerHTML = "";
        total = 0;

        cart.forEach((item, i) => {
          let subtotal = item.price * item.qty;
          total += subtotal;

          let div = document.createElement("div");
          div.className = "cart-item";

          div.innerHTML = `
            <span>${item.name}</span>
            <span>Rp${item.price}</span>
            <span>
              <span class="qty-btn" onclick="changeQty(${i},-1)">-</span>
              ${item.qty}
              <span class="qty-btn" onclick="changeQty(${i},1)">+</span>
            </span>
            <span>Rp${subtotal}</span>
          `;

          container.appendChild(div);
        });

        document.getElementById("total").innerText = total;
      }

     function recommend() {
    let eventSelect = document.getElementById("event");
    let budgetInput = document.getElementById("budget");
    let peopleInput = document.getElementById("people");
    let recommendationText = document.getElementById("recommendation");

    if (!budgetInput.value || !peopleInput.value) {
        recommendationText.innerHTML = "<span style='color: #dc2626; font-weight: bold;'>⚠️ Mohon isi budget dan jumlah orang terlebih dahulu!</span>";
        return;
    }

    recommendationText.innerHTML = "<span style='color: #2563eb; font-weight: bold;'>Sedang mencari rekomendasi...</span>";

    fetch('https://the-simple-snack-ai-production.up.railway.app/predict', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            event: eventSelect.value,
            budget: parseInt(budgetInput.value),
            people: parseInt(peopleInput.value)
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Server AI mendeteksi input tidak valid.');
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            let itemsText = data.recommendation.map(item => `1 ${item.nama}`).join(' + ');
            let imageCards = '<div style="display: flex; gap: 15px; margin-top: 15px; flex-wrap: wrap; justify-content: center;">';
            
            data.recommendation.forEach(item => {
                let urlNama = encodeURIComponent(item.nama);
                imageCards += `
                    <div style="background: white; border: 1px solid #bbf7d0; border-radius: 10px; padding: 10px; text-align: center; width: 140px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                        <img src="/assets/img/${item.nama}.png" 
                             onerror="this.src='https://via.placeholder.com/150x150?text=${urlNama}'" 
                             style="width: 100%; height: 100px; object-fit: cover; border-radius: 8px; margin-bottom: 8px;"
                             alt="${item.nama}">
                        <div style="font-size: 13px; font-weight: bold; color: #1f2937; line-height: 1.3;">
                            ${item.nama}
                        </div>
                    </div>
                `;
            });
            imageCards += '</div>';

            recommendationText.innerHTML = `
                <div style="margin-top: 15px; padding: 20px; background-color: #dcfce7; border-radius: 12px; border: 1px solid #bbf7d0; color: #166534; text-align: center;">
                    <strong style="font-size: 16px;">Rekomendasi Paket Terbaik </strong>
                    <p style="margin-top: 8px; font-size: 15px; color: #15803d; font-weight: 500;">
                        ${itemsText}
                    </p>
                    <div style="margin-top: 12px; display: inline-block; padding: 6px 12px; background: #22c55e; color: white; border-radius: 20px; font-size: 12px; font-weight: bold;">
                        Sesuai dengan Budget Anda
                    </div>
                    ${imageCards} 
                </div>
            `;
        } else {
            recommendationText.innerHTML = `
                <div style="margin-top: 15px; padding: 15px; background-color: #fee2e2; border-radius: 10px; border: 1px solid #fecaca; color: #991b1b;">
                    ⚠️ <strong>AI Validasi Gagal:</strong> ${data.message}
                </div>
            `;
        }
    })
    .catch(error => {
        console.error("Error AI Fetch:", error);
        recommendationText.innerHTML = `
            <div style="margin-top: 15px; padding: 15px; background-color: #fee2e2; border-radius: 10px; border: 1px solid #fecaca; color: #991b1b;">
                ⚠️ <strong>Error Sistem:</strong> Gagal terhubung ke modul kecerdasan buatan Hugging Face.
            </div>
        `;
    });
}
     function order() {
  let nama = document.getElementById("nama").value.trim();
  let tanggal = document.getElementById("tanggal").value;
  let catatan = document.getElementById("catatan").value;

  if (!nama || !tanggal || cart.length === 0) {
    alert("Lengkapi data dan pilih produk terlebih dahulu");
    return;
  }

  let produk = "";

  cart.forEach((i) => {
    produk += `${i.name} (${i.qty}) - Rp${i.price * i.qty}\n`;
  });

  let message = `Halo admin, saya ingin memesan snack

          Nama: ${nama}
          Tanggal: ${tanggal}

          Pesanan:
          ${produk}

          Catatan: ${catatan}

          Total: Rp${total}`;

  fetch("{{ url('/simpan-pesanan') }}", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
      nama_pembeli: nama,
      tanggal_pesanan: tanggal,
      detail_pesanan: produk,
      total_harga: total,
      catatan: catatan
    })
  })
  .then(async res => {
    let data = await res.json();

    if (!res.ok) {
      console.error(data);
      throw new Error(data.message || "Gagal simpan");
    }

    return data;
  })
    .then(() => {
      window.open(
        `https://wa.me/6285749711859?text=${encodeURIComponent(message)}`,
        "_blank"
      );

      cart = [];
      renderCart();

      alert("Pesanan berhasil disimpan & dikirim!");
    })
    .catch(err => {
      console.error("ERROR DB:", err);

      window.open(
        `https://wa.me/6285749711859?text=${encodeURIComponent(message)}`,
        "_blank"
      );

      alert("Pesanan tetap dikirim ke WhatsApp (DB gagal)");
    });
  }


      let ratingDipilih = 0;

      document.querySelectorAll("#ratingTesti iconify-icon").forEach((icon) => {
        icon.addEventListener("click", function () {
          ratingDipilih = this.dataset.value;

          document
            .querySelectorAll("#ratingTesti iconify-icon")
            .forEach((i) => {
              i.setAttribute("icon", "mdi:star-outline");
              i.classList.remove("active");
            });

          for (let i = 0; i < ratingDipilih; i++) {
            let el = document.querySelectorAll("#ratingTesti iconify-icon")[i];
            el.setAttribute("icon", "mdi:star");
            el.classList.add("active");
          }
        });
      });

      function kirimTesti() {
        let nama = document.getElementById("namaTesti").value.trim();
        let isi = document.getElementById("isiTesti").value.trim();

        if (!nama || !isi || ratingDipilih == 0) {
          alert("Lengkapi testimoni");
          return;
        }

        let bintang = "";
        for (let i = 0; i < ratingDipilih; i++) {
          bintang += '<iconify-icon icon="mdi:star"></iconify-icon>';
        }

        let html = `
            <div class="review" style="padding: 14px 20px; border-radius: 15px;">
              <strong>${nama}</strong><br/>
              ${bintang}<br/>
              "${isi}"
            </div>
  `;

        document.querySelector(".review-grid").innerHTML += html;

        document.getElementById("namaTesti").value = "";
        document.getElementById("isiTesti").value = "";
        ratingDipilih = 0;

        document.querySelectorAll("#ratingTesti iconify-icon").forEach((i) => {
          i.setAttribute("icon", "mdi:star-outline");
          i.classList.remove("active");
        });
      }
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating_value');

        function updateStars(value) {
            stars.forEach((s, index) => {
                if (index < value) {
                    s.setAttribute('icon', 'mdi:star');
                    s.style.color = '#facc15';
                } else {
                    s.setAttribute('icon', 'mdi:star-outline');
                    s.style.color = '#d1d5db';
                }
            });
        }

        updateStars(ratingInput.value);

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const val = this.getAttribute('data-value');
                ratingInput.value = val;
                updateStars(val);
                console.log("Rating dipilih: " + val);
            });
        });
    });
</script>
  </body>
</html>