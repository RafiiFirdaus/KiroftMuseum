<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Purchase;

class UpdateMissingTimeSlots extends Command
{
    protected $signature = 'update:missing-time-slots';
    protected $description = 'Update purchases with missing time slots to default value';

    public function handle()
    {
        $purchasesWithoutTimeSlot = Purchase::whereNull('time_slot')->get();

        $this->info("Found {$purchasesWithoutTimeSlot->count()} purchases without time slots");

        foreach($purchasesWithoutTimeSlot as $purchase) {
            // Set default time slot based on ticket type or general default
            $defaultTimeSlot = '09:00-10:50'; // Default to first available slot

            $purchase->update(['time_slot' => $defaultTimeSlot]);

            $this->info("Updated Purchase ID {$purchase->id} with time slot: {$defaultTimeSlot}");
        }

        $this->info('Time slot update completed!');

        return 0;
    }
}
