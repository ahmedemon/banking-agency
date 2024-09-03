<?php

namespace App\Models\Primary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankList extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'branch',
        'holder',
        'account',
        'publish',
        'address',
        'balance',
        'active',
    ];
}
