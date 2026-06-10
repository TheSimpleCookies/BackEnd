@extends('components.layouts.admin')

@section('content')
<style>
    /* Paksa semua input di halaman ini jadi Soft Pink */
    #testimoni input, 
    input[type="text"], 
    input[type="email"], 
    input[type="password"], 
    textarea {
        background-color: #fff5f8 !important; /* Pink pastel sangat muda */
        color: #ec4899 !important;            /* Tulisan pink tua */
        border: 1px solid #f9a8d4 !important; /* Border pink lembut */
        border-radius: 12px !important;       /* Sudut melengkung cantik */
        padding: 10px 15px !important;
    }

    /* Hilangkan ring hitam/biru saat diklik, ganti jadi pink */
    input:focus, textarea:focus {
        border-color: #f472b6 !important;
        box-shadow: 0 0 0 3px rgba(244, 114, 182, 0.2) !important;
        outline: none !important;
    }

    /* Paksa tombol Save jadi Pink */
    button[type="submit"] {
        background-color: #ec4899 !important;
        color: white !important;
        border-radius: 12px !important;
        padding: 10px 25px !important;
        font-weight: bold !important;
        border: none !important;
        transition: 0.3s;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #db2777 !important;
        transform: scale(1.02);
    }

    /* Ubah warna label (Nama, Email, Password) jadi Pink Tua agar serasi */
    label {
        color: #ec4899 !important;
        font-weight: 600 !important;
        margin-bottom: 5px !important;
        display: block;
    }
</style>

<div class="mb-6">
   <h1 style="color: #f472b6; font-size: 24px; font-weight: bold;"> Account Settings</h1>
    <p style="color: #cf4390; font-size: 14px;"> Kelola informasi profil dan keamanan akun admin kamu.</p>
</div>

<div class="space-y-6 max-w-3xl">
    <div class="p-6 bg-white border border-pink-200 rounded-2xl shadow-sm">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
            <iconify-icon icon="mdi:account-circle-outline" class="text-pink-500"></iconify-icon>
            Informasi Profil
        </h3>
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
            <iconify-icon icon="mdi:lock-outline" class="text-pink-500"></iconify-icon>
            Update Password
        </h3>
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="p-6 bg-white border border-red-100 rounded-2xl shadow-sm">
        <h3 class="text-lg font-bold text-red-600 mb-4 flex items-center gap-2">
            <iconify-icon icon="mdi:alert-circle-outline"></iconify-icon>
            Hapus Akun
        </h3>
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection