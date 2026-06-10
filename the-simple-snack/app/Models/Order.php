<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [
    'nama_pembeli', 
    'tanggal_pesanan', 
    'detail_pesanan', 
    'total_harga', 
    'catatan'
];
}

