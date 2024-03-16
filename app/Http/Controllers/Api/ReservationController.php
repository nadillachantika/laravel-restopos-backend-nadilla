<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ReservationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'customer_name' => 'required|string',
                'customer_phone' => 'required|string',
                'reservation_datetime' => 'required|date',
                'notes' => 'nullable|string',
                'table_number' => 'nullable|string',
                'status' => 'required|string',
            ]);

            $reservation = new Reservation();
            $reservation->customer_name = $request->customer_name;
            $reservation->customer_phone = $request->customer_phone;
            $reservation->reservation_code = $this->generateReservaitonCode();
            $reservation->reservation_datetime = $request->reservation_datetime;
            $reservation->status = 'pending';
            $reservation->notes = $request->notes;
            $reservation->table_number = $request->table_number;

            $reservation->save();


            return response(['message' => 'success', 'data' => $reservation], 200);

        } catch (\Exception $e) {

            return response(['message' => $e->getMessage()], 500);
        }
    }

    function generateReservaitonCode()
    {
        // Generate random string of 6 characters
        $randomString = Str::random(6);

        // Combine with current timestamp to ensure uniqueness
        // $timestamp = now()->format('YmdHis');

        return 'RSV-'. $randomString;
    }
}
