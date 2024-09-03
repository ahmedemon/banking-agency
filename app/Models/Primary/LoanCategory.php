<?php

namespace App\Models\Primary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanCategory extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'interest_rate',
        'duration',
        'max_amount',
    ];
}
