<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $reservations = Reservation::paginate(5);
        return view('pages.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('pages.reservation.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
            $reservation->status = $request->status;
            $reservation->notes = $request->notes;
            $reservation->table_number = $request->table_number;

            $reservation->save();



            // return redirect()->route('pages.reservation.index')->with('success', 'Reservation successfully created');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create reservation: ' . $e->getMessage());
        }
    }

    function generateReservaitonCode()
    {
        // Generate random string of 6 characters
        $randomString = Str::random(6);

        // Combine with current timestamp to ensure uniqueness
        $timestamp = now()->format('YmdHis');

        return 'RSV-' . $timestamp . '-' . $randomString;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
