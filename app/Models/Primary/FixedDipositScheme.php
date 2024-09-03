<?php

namespace App\Models\Primary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDipositScheme extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'type',
        'duration',
        'profit',
        'note',
    ];
}
