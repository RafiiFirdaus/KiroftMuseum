<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Purchase;

class DebugPurchases extends Command
{
    protected $signature = 'debug:purchases';
    protected $description = 'Debug purchase time slots';

    public function handle()
    {
        $purchases = Purchase::latest()->take(5)->get();

        $this->info('=== LATEST PURCHASES DEBUG ===');

        foreach($purchases as $purchase) {
            $this->info("ID: {$purchase->id}");
            $this->info("User ID: {$purchase->user_id}");
            $this->info("Ticket Type: {$purchase->ticket_type}");
            $this->info("Time Slot: " . ($purchase->time_slot ?? 'NULL'));
            $this->info("Visit Date: " . ($purchase->visit_date ?? 'NULL'));
            $this->info("Created At: {$purchase->created_at}");
            $this->info("------------------------");
        }

        return 0;
    }
}
