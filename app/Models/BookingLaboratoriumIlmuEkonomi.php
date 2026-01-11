<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingLaboratoriumIlmuEkonomi extends Model
{
    use HasFactory;

    protected $table = 'bookings_laboratorium_ilmu_ekonomi';
    protected $fillable = [
        'user_id', 'name', 'nim', 'whatsapp', 'reason', 'time_slot', 'booking_date', 'status'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
