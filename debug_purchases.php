<?php
require 'vendor/autoload.php';
require 'bootstrap/app.php';

// Get the latest 3 purchases
$purchases = App\Models\Purchase::latest()->take(3)->get(['id', 'time_slot', 'ticket_type', 'created_at', 'user_id']);

echo "=== LATEST PURCHASES DEBUG ===\n";
foreach($purchases as $purchase) {
    echo "ID: " . $purchase->id . "\n";
    echo "User ID: " . $purchase->user_id . "\n";
    echo "Ticket Type: " . $purchase->ticket_type . "\n";
    echo "Time Slot: " . ($purchase->time_slot ?? 'NULL') . "\n";
    echo "Created At: " . $purchase->created_at . "\n";
    echo "------------------------\n";
}
