use App\Models\Testimony;

public function storeTestimony(Request $request)
{
    // 1. PENGAMANAN CYBER: Validasi ketat Regex & Range Angka
    $request->validate([
        // Nama hanya boleh huruf dan spasi (Menangkal Path Traversal & karakter aneh)
        'nama'   => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
        // Rating dikunci hanya boleh angka antara 1 sampai 5
        'rating' => ['required', 'integer', 'between:1,5'],
        // Pesan dibatasi maksimal 500 karakter biar tidak merusak layout / memory ddos
        'pesan'  => ['required', 'string', 'max:500'],
    ], [
        // Pesan error kustom saat testing mendeteksi kegagalan input
        'nama.regex' => 'Input nama tidak valid! Hanya diperbolehkan huruf dan spasi.',
        'rating.between' => 'Rating harus bernilai antara 1 sampai 5 ya!',
    ]);

    // 2. PERTAHANAN ANTI-XSS: Sapu bersih semua tag HTML (<script>, <div>, dll)
    // Jika ada penyerang mencoba memasukkan kode HTML/JS, kodenya langsung ditiadakan
    
    $namaBersih  = strip_tags($request->nama);
    $pesanBersih = strip_tags($request->pesan);

    // 3. Simpan data yang sudah STERIL ke database
    Testimony::create([
        'nama'   => $namaBersih,
        'rating' => $request->rating,
        'pesan'  => $pesanBersih,
    ]);

    return back()->with('success', 'Terima kasih atas testimoninya!');
}