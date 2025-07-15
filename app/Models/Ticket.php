<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'ticket_name',
        'description',
        'price',
        'available_quantity',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    // Relationship dengan purchases
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    // Scope untuk tiket yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
