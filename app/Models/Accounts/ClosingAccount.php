<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosingAccount extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fixed_diposit_closings';

    public $fillable = [
        'start_date',
        'passed_month',
        'fdr_payable_amount',
        'final_profit',
        'note        ',
    ];

    public function fdr()
    {
        return $this->belongsTo(ClosingAccount::class, 'fdr_id', 'id');
    }
}
