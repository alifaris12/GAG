<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingLaboratoriumEkonomiIslam;
use Illuminate\Http\Request;

class LabEkonomiIslamController extends Controller
{
    /**
     * Menampilkan daftar booking Lab Ekonomi Islam
     */
    public function index(Request $request)
    {
        $query = BookingLaboratoriumEkonomiIslam::query();

        // Filter berdasarkan status jika ada
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->orderBy('booking_date', 'desc')
            ->orderBy('time_slot', 'desc')
            ->paginate(15);

        return view('admin.lab-ekonomi-islam', compact('bookings'));
    }

    /**
     * Approve booking
     */
    public function approve($id)
    {
        $booking = BookingLaboratoriumEkonomiIslam::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->back()->with('success', 'Booking berhasil di-approve!');
    }

    /**
     * Reject booking
     */
    public function reject($id)
    {
        $booking = BookingLaboratoriumEkonomiIslam::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->back()->with('success', 'Booking berhasil ditolak!');
    }

    /**
     * Hapus booking
     */
    public function destroy($id)
    {
        $booking = BookingLaboratoriumEkonomiIslam::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dihapus!');
    }
}