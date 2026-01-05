<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingLaboratoriumIlmuKeuanganPerbankan;
use Illuminate\Http\Request;

class LabKeuanganPerbankanController extends Controller
{
    /**
     * Menampilkan daftar booking Lab Keuangan Perbankan
     */
    public function index(Request $request)
    {
        $query = BookingLaboratoriumIlmuKeuanganPerbankan::query();

        // Filter berdasarkan status jika ada
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->orderBy('booking_date', 'desc')
            ->orderBy('time_slot', 'desc')
            ->paginate(15);

        return view('admin.lab-keuangan-perbankan', compact('bookings'));
    }

    /**
     * Approve booking
     */
    public function approve($id)
    {
        $booking = BookingLaboratoriumIlmuKeuanganPerbankan::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->back()->with('success', 'Booking berhasil di-approve!');
    }

    /**
     * Reject booking
     */
    public function reject($id)
    {
        $booking = BookingLaboratoriumIlmuKeuanganPerbankan::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->back()->with('success', 'Booking berhasil ditolak!');
    }

    /**
     * Hapus booking
     */
    public function destroy($id)
    {
        $booking = BookingLaboratoriumIlmuKeuanganPerbankan::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dihapus!');
    }
}