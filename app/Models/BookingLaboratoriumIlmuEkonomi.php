<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingLaboratoriumIlmuEkonomi extends Model
{
    use HasFactory;

    protected $table = 'bookings_laboratorium_ilmu_ekonomi'; // Tentukan tabel yang digunakan
    protected $fillable = [
        'name', 'nim', 'whatsapp', 'reason', 'time_slot', 'booking_date', 'status'
    ];
}

