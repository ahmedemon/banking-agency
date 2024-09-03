<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralAcTransactions extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['account','deposit','withdraw','profit','note','deleted_by','date'];

    /**
     * Get the member that owns the GeneralAcTransactions
     */
    public function member()
    {
        return $this->belongsTo(Members::class, 'account', 'account');
    }


    // custom attributes
    public function getTotalDepositAttribute()
    {
        return $this->where('account', $this->account)->sum('deposit');
    }

    public function getTotalWithdrawAttribute()
    {
        return $this->where('account', $this->account)->sum('withdraw');
    }

    public function getBalanceTillTransAttribute()
    {
        $transactions = $this->where('account', $this->account)->where('date', '<=', $this->date)->orderBy('id', 'desc')->get();
                        // ->where('id', '<=', $this->id)->get();
        return $transactions->sum('deposit') - $transactions->sum('withdraw');
    }
}
