<?php

namespace App\Models;

use App\Models\Accounts\Members;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Savings extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'scheme_id',
        'account_id',
        'start_date',
        'opening_charge',
        'start_after',
        'ledger_no',
        'installment',
        'savings_amount',
        'interest_percent',
        'penalty',
        'expire_date',
        'holiday'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['status_html','balance'];

    /**
     * Get the secheme that belongs to the Savings
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scheme()
    {
        return $this->belongsTo(SavingsScheme::class, 'scheme_id', 'id');
    }

    /**
     * Get the member that owns the Savings
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo(Members::class, 'account_id', 'account');
    }

    /**
     * Get all of the deposits for the Savings
     *
     */
    public function deposits()
    {
        return $this->hasMany(SavingsBalance::class, 'savings_id', 'id');
    }


    /**
     * Get all of the withdraws for the Savings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function withdraws()
    {
        return $this->hasMany(SavingsBalance::class, 'savings_id', 'id');
    }


    public function transactions()
    {
        return $this->hasMany(SavingsBalance::class, 'savings_id', 'id');
    }



    // all attributes

    public function getTotalWithdrawAttribute() // $this->total_withdraw
    {
        return $this->withdraws()->sum('withdraw');
    }

    // get total target amount
    public function getTargetAmountAttribute() // $this->target_amount
    {
        return $this->savings_amount * $this->installment;
    }

    public function getDepositsDescAttribute() // $this->deposits_desc
    {
        return $this->deposits()->orderByDesc('id')->get();
    }

    public function getTransactionsDescAttribute() // $this->transactions_desc
    {
        return $this->transactions()->orderByDesc('date')->orderByDesc('id')->get();
    }

    /**
     * Get sum of all balance
     */
    public function getBalanceAttribute() // $this->balance
    {
        return $this->total_deposit - $this->total_withdraw;
    }

    /**
     * Get sum of all deposit
     */
    public function getTotalDepositAttribute() // $this->total_deposit
    {
        return $this->deposits()->sum('deposit');
    }

    /**
     * Get due amount
     */
    public function getDueAttribute() // $this->due
    {
        return ($this->savings_amount * $this->deposits()->count()) - $this->total_deposit;
    }

    /**
     * Get html formated status
     */
    public function getStatusHtmlAttribute()
    {
        $color = 'danger';
        $text = 'Closed';
        if($this->status == '1'){
            $text = 'Open';
            $color = 'info';
        }
        elseif ($this->status == '2'){
            $color = "warning";
            $text = "Running";
        }
        elseif ($this->status == '3') {
            $color = "success";
            $text = "Complete";
        }
        elseif ($this->status == '4'){
            $color = "success";
            $text = "Paid";
        }
        else {
            $color = 'danger';
            $text = 'Closed';
        }

        $html = '<span class="text-'. $color .' font-weight-bold small">'. $text .'</span>';

        return $html;
    }

}
