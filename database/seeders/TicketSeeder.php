<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = [
            [
                'ticket_name' => 'Tiket Dewasa',
                'description' => 'Akses penuh ke semua pameran museum untuk 1 orang dewasa.',
                'price' => 50000.00,
                'available_quantity' => -1,
                'is_active' => true,
            ],
            [
                'ticket_name' => 'Tiket Anak (5-12 tahun)',
                'description' => 'Akses penuh ke semua pameran museum untuk 1 anak usia 5-12 tahun.',
                'price' => 25000.00,
                'available_quantity' => -1,
                'is_active' => true,
            ],
            [
                'ticket_name' => 'Tiket Pelajar',
                'description' => 'Akses penuh ke semua pameran museum untuk 1 pelajar (memerlukan ID pelajar).',
                'price' => 35000.00,
                'available_quantity' => -1,
                'is_active' => true,
            ],
            [
                'ticket_name' => 'Paket Keluarga (2 Dewasa + 2 Anak)',
                'description' => 'Akses penuh untuk 2 dewasa dan 2 anak.',
                'price' => 120000.00,
                'available_quantity' => -1,
                'is_active' => true,
            ],
        ];

        foreach ($tickets as $ticket) {
            \App\Models\Ticket::create($ticket);
        }
    }
}
