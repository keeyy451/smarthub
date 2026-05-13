<?php

namespace App\Services;

use App\Models\User;
use App\Models\RoomBooking;
use Illuminate\Support\Facades\Log;

class EmailNotificationService
{
    /**
     * Simulasi pengiriman email notifikasi untuk booking baru.
     * Fitur ini dikerjakan secara paralel pada branch feature/email-notification.
     */
    public function sendBookingConfirmation(RoomBooking $booking)
    {
        $user = $booking->user;
        
        Log::info("Sending email to {$user->email}: Booking confirmation for {$booking->nama_ruangan} on {$booking->tanggal}");
        
        // Logic pengiriman email sesungguhnya akan menggunakan Mail::to($user)->send(...)
        return true;
    }

    public function sendStatusUpdate(RoomBooking $booking)
    {
        $user = $booking->user;
        
        Log::info("Sending email to {$user->email}: Booking status updated to {$booking->status}");
        
        return true;
    }
}
