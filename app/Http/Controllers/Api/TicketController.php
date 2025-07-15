<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Melihat semua tiket yang tersedia
    public function index()
    {
        $tickets = Ticket::active()->get();

        return response()->json([
            'message' => 'Daftar tiket berhasil diambil.',
            'tickets' => $tickets,
        ]);
    }

    // Melihat detail tiket spesifik
    public function show($id)
    {
        $ticket = Ticket::active()->find($id);

        if (!$ticket) {
            return response()->json([
                'message' => 'Tiket tidak ditemukan atau tidak tersedia.'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail tiket berhasil diambil.',
            'ticket' => $ticket,
        ]);
    }
}
