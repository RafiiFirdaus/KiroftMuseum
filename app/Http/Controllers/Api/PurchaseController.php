<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PurchaseController extends Controller
{
    // Melihat riwayat pembelian pengguna
    public function getUserPurchases(Request $request)
    {
        try {
            $userId = $request->user()->id;

            // Debug log
            Log::info('Getting purchases for user: ' . $userId);

            $purchases = Purchase::where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->get();

            Log::info('Found purchases count: ' . $purchases->count());

            // Transform data untuk memastikan kompatibilitas dengan frontend
            $transformedPurchases = $purchases->map(function ($purchase) {
                Log::info('Processing purchase for display:', [
                    'id' => $purchase->id,
                    'raw_time_slot' => $purchase->time_slot,
                    'is_time_slot_null' => is_null($purchase->time_slot),
                    'time_slot_empty' => empty($purchase->time_slot)
                ]);

                return [
                    'id' => $purchase->id,
                    'created_at' => $purchase->created_at,
                    'visit_date' => $purchase->visit_date,
                    'quantity' => $purchase->quantity,
                    'total_price' => $purchase->total_price,
                    'status' => $purchase->status,                    // Use existing field
                    'museum_name' => $purchase->museum_name,
                    'ticket_type' => $purchase->ticket_type,
                    'full_name' => $purchase->full_name,              // Use existing field
                    'email' => $purchase->email,                      // Use existing field
                    'phone' => $purchase->phone,                      // Use existing field
                    'payment_method' => $purchase->payment_method,
                    'time_slot' => $purchase->time_slot,              // Use existing field
                    'student_id_path' => $purchase->student_id_path,  // Use existing field
                    // Untuk kompatibilitas dengan kode lama, buat object ticket virtual
                    'ticket' => [
                        'id' => $purchase->ticket_id,
                        'name' => $purchase->ticket_type ? ucfirst($purchase->ticket_type) : 'Museum Ticket',
                        'price' => $purchase->total_price / $purchase->quantity,
                        'museum_name' => $purchase->museum_name,
                    ]
                ];
            });

            return response()->json([
                'message' => 'Riwayat pembelian berhasil diambil.',
                'purchases' => $transformedPurchases,
            ]);
        } catch (\Exception $e) {
            Log::error('Error getting user purchases: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error retrieving purchases: ' . $e->getMessage(),
                'purchases' => [],
            ], 500);
        }
    }

    // Membuat pembelian tiket baru
    public function purchaseTicket(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|integer|exists:tickets,id',
            'quantity' => 'required|integer|min:1',
            'visit_date' => 'required|date|after_or_equal:today',
        ]);

        // Ambil harga tiket dari database
        $ticket = Ticket::find($request->ticket_id);
        if (!$ticket || !$ticket->is_active) {
            return response()->json(['message' => 'Jenis tiket tidak tersedia.'], 404);
        }

        $totalPrice = $ticket->price * $request->quantity;

        // Simpan pembelian tiket
        $purchase = Purchase::create([
            'user_id' => $request->user()->id,
            'ticket_id' => $request->ticket_id,
            'visit_date' => $request->visit_date,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'completed',
        ]);

        // Load relationship untuk response
        $purchase->load('ticket');

        return response()->json([
            'message' => 'Pembelian tiket berhasil!',
            'purchase' => $purchase,
        ], 201);
    }

    // Membatalkan pembelian tiket
    public function cancelPurchase(Request $request, $id)
    {
        $purchase = Purchase::where('id', $id)
                           ->where('user_id', $request->user()->id)
                           ->first();

        if (!$purchase) {
            return response()->json([
                'message' => 'Pembelian tidak ditemukan atau Anda tidak memiliki izin.'
            ], 404);
        }

        // Validasi: hanya bisa membatalkan jika statusnya belum 'cancelled'
        if ($purchase->status === 'cancelled') {
            return response()->json([
                'message' => 'Pembelian ini sudah dibatalkan.'
            ], 400);
        }

        $purchase->status = 'cancelled';
        $purchase->save();

        return response()->json([
            'message' => 'Pembelian berhasil dibatalkan.',
            'purchase' => $purchase,
        ]);
    }

    // Melihat detail pembelian spesifik
    public function getPurchaseDetail(Request $request, $id)
    {
        $purchase = Purchase::with('ticket')
                           ->where('id', $id)
                           ->where('user_id', $request->user()->id)
                           ->first();

        if (!$purchase) {
            return response()->json([
                'message' => 'Pembelian tidak ditemukan atau Anda tidak memiliki izin.'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail pembelian berhasil diambil.',
            'purchase' => $purchase,
        ]);
    }

    // Membuat pembelian tiket dari booking form
    public function createBooking(Request $request)
    {
        $request->validate([
            'museum_name' => 'required|string',
            'ticket_type' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric',
            'visit_date' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string',
            'visitor_name' => 'required|string',
            'visitor_phone' => 'required|string',
            'visitor_email' => 'required|email',
            'payment_method' => 'required|string',
        ]);

        try {
            // Determine ticket_id based on ticket_type
            $ticketId = 1; // Default to General Admission
            if (strtolower($request->ticket_type) === 'student' ||
                strtolower($request->ticket_type) === 'anak-anak') {
                $ticketId = 2; // Student/Child ticket
            }

            // Debug logging
            Log::info('Creating booking with data:', [
                'time_slot' => $request->time_slot,
                'ticket_type' => $request->ticket_type,
                'visit_date' => $request->visit_date,
                'visitor_name' => $request->visitor_name
            ]);

            // Create purchase record using existing database fields
            $purchase = Purchase::create([
                'user_id' => $request->user()->id,
                'ticket_id' => $ticketId,                     // Use determined ticket ID
                'museum_name' => $request->museum_name,
                'ticket_type' => $request->ticket_type,
                'quantity' => $request->quantity,
                'total_price' => $request->total_price,
                'visit_date' => $request->visit_date,
                'time_slot' => $request->time_slot,           // Add time_slot field
                'full_name' => $request->visitor_name,        // Map to existing field
                'phone' => $request->visitor_phone,           // Map to existing field
                'email' => $request->visitor_email,           // Map to existing field
                'payment_method' => $request->payment_method,
                'status' => 'completed',                      // Use existing status field
            ]);

            // Log the created purchase
            Log::info('Purchase created:', [
                'id' => $purchase->id,
                'time_slot' => $purchase->time_slot,
                'created_data' => $purchase->toArray()
            ]);

            return response()->json([
                'message' => 'Booking completed successfully!',
                'purchase' => $purchase,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error creating booking: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to create booking: ' . $e->getMessage(),
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
