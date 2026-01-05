<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingLaboratoriumIlmuKeuanganPerbankan  extends Model
{
    use HasFactory;

    protected $table = 'BookingLaboratoriumIlmuKeuanganPerbankan '; // Tentukan tabel yang digunakan
    protected $fillable = [
        'name', 'nim', 'whatsapp', 'reason', 'time_slot', 'booking_date', 'status'
    ];
}
