<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SavingsBalance extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'savings_id', 'date', 'deposit','withdraw','profit', 'penalty', 'note','processed_by', 'deleted_by'
    ];

    /**
     * The accessors to append to the model's array form.
     */
    protected $appends = ['last_balance'];

    /**
     * Get the savings that owns the SavingsDeposit
     */
    public function savings()
    {
        return $this->belongsTo(Savings::class, 'savings_id', 'id');
    }

     /**
     * Get balance regarding the saving deposit
     */
    public function getLastBalanceAttribute()
    {
        $dps_trans = $this->where('savings_id', $this->savings_id)
                          ->whereRaw("(date <= $this->date or id <= $this->id)")->orderByDesc('id');
                        //   ->where('date', '<=', $this->date)->orWhere('id', '<=', $this->id)->orderByDesc('id');
                        //   ->where('created_at', '<=', $this->created_at);
                        //   ->where('id', '<=', $this->id);
        return $dps_trans->sum('deposit') - $dps_trans->sum('withdraw');
    }
}
