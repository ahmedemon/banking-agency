<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsClosing extends Model
{
    use HasFactory;
    public $fillable = [
        'date',
        'savings_id',
        'withdraw',
        'note',
    ];
}
