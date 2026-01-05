<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingLaboratoriumIlmuEkonomi;
use Illuminate\Http\Request;

class LabEkonomiController extends Controller
{
    /**
     * Menampilkan daftar booking Lab Ekonomi
     */
    public function index(Request $request)
    {
        $query = BookingLaboratoriumIlmuEkonomi::query();

        // Filter berdasarkan status jika ada
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->orderBy('booking_date', 'desc')
            ->orderBy('time_slot', 'desc')
            ->paginate(15);

        return view('admin.lab-ekonomi', compact('bookings'));
    }
    /**
     * Approve booking
     */
    public function approve($id)
    {
        $booking = BookingLaboratoriumIlmuEkonomi::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->back()->with('success', 'Booking berhasil di-approve!');
    }

    /**
     * Reject booking
     */
    public function reject($id)
    {
        $booking = BookingLaboratoriumIlmuEkonomi::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->back()->with('success', 'Booking berhasil ditolak!');
    }

    /**
     * Hapus booking
     */
    public function destroy($id)
    {
        $booking = BookingLaboratoriumIlmuEkonomi::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dihapus!');
    }
}