<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySaleSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount_due',
        'total_amount_paid',
        'cash',
        'credit',
        'pos',
        'shortage_amount'
    ];
}
