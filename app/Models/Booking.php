<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'date_from',
        'date_to',
        'guests_count',
        'status',
        'total_amount',
    ];
}
