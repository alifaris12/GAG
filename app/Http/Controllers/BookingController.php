<?php

namespace App\Http\Controllers;

use App\Models\BookingLaboratoriumIlmuEkonomi;
use App\Models\BookingLaboratoriumIlmuKeuanganPerbankan;
use App\Models\BookingLaboratoriumEkonomiIslam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // ============================================
    // TAMPILAN FORM BOOKING UNTUK USER
    // ============================================
    
    // Menampilkan form booking Lab Ekonomi
    public function showLabEkonomi()
    {
        return view('dashboard.lab-ekonomi-u');
    }

    // Menampilkan form booking Lab Keuangan Perbankan
    public function showLabKeuanganPerbankan()
    {
        return view('dashboard.lab-keuangan-perbankan-u');
    }

    // Menampilkan form booking Lab Ekonomi Islam
    public function showLabEkonomiIslam()
    {
        return view('dashboard.lab-ekonomi-islam-u');
    }

    // ============================================
    // HALAMAN STATUS PEMINJAMAN
    // ============================================
    
    public function showBookingStatus()
    {
        $user = Auth::user();
        
        // Ambil semua booking dari ketiga laboratorium berdasarkan user_id
        $bookingsEkonomi = BookingLaboratoriumIlmuEkonomi::where('user_id', $user->id)
            ->orderBy('booking_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $bookingsKeuangan = BookingLaboratoriumIlmuKeuanganPerbankan::where('user_id', $user->id)
            ->orderBy('booking_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $bookingsIslam = BookingLaboratoriumEkonomiIslam::where('user_id', $user->id)
            ->orderBy('booking_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('dashboard.booking-status', compact('bookingsEkonomi', 'bookingsKeuangan', 'bookingsIslam'));
    }

    // ============================================
    // ENDPOINT UNTUK CEK SLOT WAKTU TERSEDIA
    // ============================================

    // Mengecek slot waktu yang sudah dibooking untuk Lab Ekonomi
    public function getBookedSlotsLabEkonomi(Request $request)
    {
        $date = $request->query('date');
        
        $bookedSlots = BookingLaboratoriumIlmuEkonomi::where('booking_date', $date)
            ->whereIn('status', ['pending', 'approved'])
            ->pluck('time_slot')
            ->toArray();
        
        return response()->json([
            'success' => true,
            'booked_slots' => $bookedSlots
        ]);
    }

    // Mengecek slot waktu yang sudah dibooking untuk Lab Keuangan Perbankan
    public function getBookedSlotsLabKeuanganPerbankan(Request $request)
    {
        $date = $request->query('date');
        
        $bookedSlots = BookingLaboratoriumIlmuKeuanganPerbankan::where('booking_date', $date)
            ->whereIn('status', ['pending', 'approved'])
            ->pluck('time_slot')
            ->toArray();
        
        return response()->json([
            'success' => true,
            'booked_slots' => $bookedSlots
        ]);
    }

    // Mengecek slot waktu yang sudah dibooking untuk Lab Ekonomi Islam
    public function getBookedSlotsLabEkonomiIslam(Request $request)
    {
        $date = $request->query('date');
        
        $bookedSlots = BookingLaboratoriumEkonomiIslam::where('booking_date', $date)
            ->whereIn('status', ['pending', 'approved'])
            ->pluck('time_slot')
            ->toArray();
        
        return response()->json([
            'success' => true,
            'booked_slots' => $bookedSlots
        ]);
    }

    // ============================================
    // MENYIMPAN BOOKING DARI USER
    // ============================================

    // Menyimpan pemesanan untuk Laboratorium Ilmu Ekonomi
    public function storeLabEkonomi(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'whatsapp' => 'required|string|max:20',
            'reason' => 'required|string',
            'time_slot' => 'required|string',
            'booking_date' => 'required|date',
        ]);

        // Cek apakah slot sudah dibooking
        $existingBooking = BookingLaboratoriumIlmuEkonomi::where('booking_date', $request->booking_date)
            ->where('time_slot', $request->time_slot)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($existingBooking) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, slot waktu ini sudah dibooking. Silakan pilih waktu lain.'
            ], 422);
        }

        BookingLaboratoriumIlmuEkonomi::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'nim' => $request->nim,
            'whatsapp' => $request->whatsapp,
            'reason' => $request->reason,
            'time_slot' => $request->time_slot,
            'booking_date' => $request->booking_date,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil dikirim! Silakan tunggu konfirmasi admin.'
        ]);
    }

    // Menyimpan pemesanan untuk Laboratorium Ilmu Keuangan Perbankan
    public function storeLabKeuanganPerbankan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'whatsapp' => 'required|string|max:20',
            'reason' => 'required|string',
            'time_slot' => 'required|string',
            'booking_date' => 'required|date',
        ]);

        // Cek apakah slot sudah dibooking
        $existingBooking = BookingLaboratoriumIlmuKeuanganPerbankan::where('booking_date', $request->booking_date)
            ->where('time_slot', $request->time_slot)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($existingBooking) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, slot waktu ini sudah dibooking. Silakan pilih waktu lain.'
            ], 422);
        }

        BookingLaboratoriumIlmuKeuanganPerbankan::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'nim' => $request->nim,
            'whatsapp' => $request->whatsapp,
            'reason' => $request->reason,
            'time_slot' => $request->time_slot,
            'booking_date' => $request->booking_date,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil dikirim! Silakan tunggu konfirmasi admin.'
        ]);
    }

    // Menyimpan pemesanan untuk Laboratorium Ekonomi Islam
    public function storeLabEkonomiIslam(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'whatsapp' => 'required|string|max:20',
            'reason' => 'required|string',
            'time_slot' => 'required|string',
            'booking_date' => 'required|date',
        ]);

        // Cek apakah slot sudah dibooking
        $existingBooking = BookingLaboratoriumEkonomiIslam::where('booking_date', $request->booking_date)
            ->where('time_slot', $request->time_slot)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($existingBooking) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, slot waktu ini sudah dibooking. Silakan pilih waktu lain.'
            ], 422);
        }

        BookingLaboratoriumEkonomiIslam::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'nim' => $request->nim,
            'whatsapp' => $request->whatsapp,
            'reason' => $request->reason,
            'time_slot' => $request->time_slot,
            'booking_date' => $request->booking_date,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil dikirim! Silakan tunggu konfirmasi admin.'
        ]);
    }
}