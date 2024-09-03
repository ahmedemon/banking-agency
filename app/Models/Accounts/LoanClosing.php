<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanClosing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'loan_closings';

    public $fillable = [
        'closing_date',
        'account',
        'loan_id',
        'penalty',
        'percent',
        'discount',
        'collect',
        'note',
    ];
}
