<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id',
        'ticket_id',
        'museum_name',
        'ticket_type',
        'quantity',
        'total_price',
        'visit_date',
        'full_name',         // Existing database field
        'email',             // Existing database field
        'phone',             // Existing database field
        'payment_method',
        'status',            // Existing database field
        'time_slot',         // Existing database field
        'student_id_path'    // Existing database field
    ];

    protected $casts = [
        'visit_date' => 'date',
        'total_price' => 'decimal:2'
    ];

    // Relationship dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship dengan ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    // Scope untuk status tertentu
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk user tertentu
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
