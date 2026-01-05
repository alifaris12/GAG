<?php

namespace App\Http\Controllers;

use App\Models\BookingLaboratoriumIlmuEkonomi;
use App\Models\BookingLaboratoriumIlmuKeuanganPerbankan;
use App\Models\BookingLaboratoriumEkonomiIslam;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Menyimpan pemesanan untuk Laboratorium Ilmu Ekonomi
    public function storeLab1(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'whatsapp' => 'required',
            'reason' => 'required',
            'time_slot' => 'required',
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

        return redirect()->route('bookings.lab1')->with('success', 'Booking for Lab 1 submitted successfully!');
    }

    // Menyimpan pemesanan untuk Laboratorium Ilmu Keuangan Perbankan
    public function storeLab2(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'whatsapp' => 'required',
            'reason' => 'required',
            'time_slot' => 'required',
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

        return redirect()->route('bookings.lab2')->with('success', 'Booking for Lab 2 submitted successfully!');
    }

    // Menyimpan pemesanan untuk Laboratorium Ekonomi Islam
    public function storeLab3(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'whatsapp' => 'required',
            'reason' => 'required',
            'time_slot' => 'required',
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

        return redirect()->route('bookings.lab3')->with('success', 'Booking for Lab 3 submitted successfully!');
    }

    // Menampilkan pemesanan untuk Laboratorium Ilmu Ekonomi
    public function showLab1Bookings()
    {
        $bookings = BookingLaboratoriumIlmuEkonomi::all(); // Ambil semua data pemesanan dari Lab 1
        return view('admin.lab-ekonomi', compact('bookings')); // Kirim data ke view lab-ekonomi
    }

    // Menampilkan pemesanan untuk Laboratorium Ilmu Keuangan Perbankan
    public function showLab2Bookings()
    {
        $bookings = BookingLaboratoriumIlmuKeuanganPerbankan::all(); // Ambil semua data pemesanan dari Lab 2
        return view('admin.lab-ekonomi', compact('bookings')); // Kirim data ke view lab-ekonomi
    }

    // Menampilkan pemesanan untuk Laboratorium Ekonomi Islam
    public function showLab3Bookings()
    {
        $bookings = BookingLaboratoriumEkonomiIslam::all(); // Ambil semua data pemesanan dari Lab 3
        return view('admin.lab-ekonomi', compact('bookings')); // Kirim data ke view lab-ekonomi
    }
}
