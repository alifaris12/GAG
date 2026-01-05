<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingLaboratoriumEkonomiIslam extends Model
{
    use HasFactory;

    protected $table = 'bookings_laboratorium_ekonomi_islam'; // Perbaiki nama tabel
    protected $fillable = [
        'name', 'nim', 'whatsapp', 'reason', 'time_slot', 'booking_date', 'status'
    ];
}
