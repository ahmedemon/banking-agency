<?php

namespace App\Models;

use App\Models\Primary\BranchList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public $fillable = [
        'category_id',
        'date',
        'area_id',
        'member_account',
        'branch',
        'voucher_id',
        'voucher_amount',
        'voucher_by',
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
