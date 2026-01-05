<?php

namespace App\Http\Controllers;

use App\Models\BookingLaboratoriumIlmuEkonomi;
use App\Models\BookingLaboratoriumIlmuKeuanganPerbankan;
use App\Models\BookingLaboratoriumEkonomiIslam;
use Illuminate\Http\Request;

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

        BookingLaboratoriumIlmuEkonomi::create([
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

        BookingLaboratoriumIlmuKeuanganPerbankan::create([
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

        BookingLaboratoriumEkonomiIslam::create([
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