<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounts\Members;
use App\Models\Accounts\FixedDipositProfit;
use App\Models\Primary\FixedDipositScheme;
use Illuminate\Database\Eloquent\SoftDeletes;

class FixedDiposit extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable =[
        'date',
        'months',
        'amount',
        'scheme_id',
        'percent',
        'note',
        'cheque',
        'status',
    ];
    public function member()
    {
        return $this->belongsTo(Members::class, 'account', 'account');
    }
    public function scheme()
    {
        return $this->belongsTo(FixedDipositScheme::class, 'scheme_id', 'id');
    }
    public function profit()
    {
        return $this->hasMany(FixedDipositProfit::class, 'fdr_id', 'id');
    }
    public function withdraw()
    {
        return $this->hasMany(FixedDipositProfit::class, 'fdr_id', 'id');
    }
    public function closing()
    {
        return $this->hasOne(ClosingAccount::class, 'fdr_id', 'id');
    }


    // get attributes mutators

    // get total profit of fdr ac
    public function getTotalProfitAttribute() // total_profit
    {
        return $this->profit()->where('fdr_id', $this->id)->sum('profit');
    }

    // to get the total profit withdraw of a fdr ac
    public function getTotalWithdrawAttribute() // total_withdraw
    {
        return $this->profit()->where('fdr_id', $this->id)->sum('withdraw');
    }

    public function getReceiveableAmountAttribute() // receiveable_amount
    {
        return $this->total_profit - $this->total_withdraw;
    }



    // set attributes
    public function setProcessedByAttribute()
    {
        return $this->processed_by ? $this->processed_by : auth()->user()->name;
    }
}
