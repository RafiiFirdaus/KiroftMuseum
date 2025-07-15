<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create test user
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Create test purchases/bookings directly with DB
        DB::table('purchases')->insert([
            [
                'user_id' => $user->id,
                'ticket_id' => 1,
                'museum_name' => 'Museum Nasional',
                'ticket_type' => 'Dewasa',
                'quantity' => 2,
                'total_price' => 30000,
                'visit_date' => now()->addDays(7)->format('Y-m-d'),
                'visitor_name' => 'Test User',
                'visitor_phone' => '08123456789',
                'visitor_email' => 'test@example.com',
                'payment_method' => 'Dana',
                'payment_status' => 'completed',
                'booking_status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'ticket_id' => 1,
                'museum_name' => 'Museum Geologi',
                'ticket_type' => 'Anak-anak',
                'quantity' => 1,
                'total_price' => 10000,
                'visit_date' => now()->addDays(14)->format('Y-m-d'),
                'visitor_name' => 'Test User',
                'visitor_phone' => '08123456789',
                'visitor_email' => 'test@example.com',
                'payment_method' => 'GoPay',
                'payment_status' => 'completed',
                'booking_status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        echo "Test data created successfully!\n";
        echo "User: test@example.com / password123\n";
        echo "Created 2 test bookings\n";
    }
}
