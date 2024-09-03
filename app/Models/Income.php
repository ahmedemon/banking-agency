<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    public $fillable = [
        'category_id',
        'date',
        'area_id',
        'member_account',
        'branch',
        'voucher_id',
        'income_amount',
        'income_by',
        'calculate_with_profit',
        'note',
    ];

    public function area()
    {
        return $this->belongsTo('App\Models\Primary\Area');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Primary\VoucherCategory');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Accounts\Members','member_account', 'account');
    }

    public function branch()
    {
        return $this->belongsTo(BranchList::class, 'branch');
    }
}
