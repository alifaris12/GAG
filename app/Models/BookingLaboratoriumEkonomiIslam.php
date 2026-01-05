<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingLaboratoriumIlmuEkonomi;


class BookingLaboratoriumEkonomiIslam extends Model
{
    use HasFactory;

    protected $table = 'BookingLaboratoriumEkonomiIslam'; // Tentukan tabel yang digunakan
    protected $fillable = [
        'name', 'nim', 'whatsapp', 'reason', 'time_slot', 'booking_date', 'status'
    ];
}
  