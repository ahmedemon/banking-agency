<?php

namespace App\Models\Accounts;

use App\Models\LoanInstallments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'expire_date', 'scheme', 'account_id', 'collection_start', 'loan_amount',
        'percent','installment','category_id', 'open_fee', 'insurance_fee',
        'penalty_capital','sequence', 'ledger_no',
        'product', 'security_docs', 'loan_duration', 'reference_acc',
        'processed_by', 'deleted_by', 'status', 'approved_by', 'approved_at'
        // 'installment_amount',
    ];

    protected $appends = ['due_amount'];




    /** Relationships with others tables ------------------------- */

    // get the member that taken the loan
    public function member()
    {
        return $this->belongsTo(Members::class, 'account_id', 'account');
    }

    // get the referer who referred for the loan
    public function referer()
    {
        return $this->hasOne(Members::class, 'reference_acc', 'id');
    }

    // Get all of the installments for the Loan
    public function installments()
    {
        return $this->hasMany(LoanInstallments::class, 'loan_id', 'id');
    }



    /** All attributes for getting calculations ------------------ */

    // total interest amount to be paid
    public function getTotalInterestAttribute() // refarred as $this->total_interest
    {
        return floor($this->loan_amount * ($this->percent/100));
    }

    // total amount to be paid
    public function getTotalAmountAttribute() // refarred as $this->total_amount
    {
        return floor($this->loan_amount + $this->total_interest);
    }

    // amount to be paid per installment
    public function getInstallmentAmountAttribute() // refarred as $this->installment_amount
    {
        return floor($this->total_amount / $this->installment);
    }

    // principle amount of per installment
    public function getInstallmentPrincipleAttribute() // refarred as $this->installment_principle
    {
        return floor($this->loan_amount / $this->installment);
    }

    // get amount of interest per installment to be paid
    public function getInterestPerInstallmentAttribute() // refarred as $this->interent_per_installment
    {
        // return floor($this->installment_principle * ($this->percent/100));
        return floor($this->installment_amount - $this->installment_principle);
    }

    // get total due amount
    public function getDueAmountAttribute() // refarred as $this->due_amount
    {
        return $this->total_amount - $this->total_paid;
    }

    // get total profit amount
    public function getTotalProfitAttribute() // refarred as $this->total_profit
    {
        return $this->total_amount - $this->loan_amount;
    }

    //get due profit amount
    public function getDueProfitAttribute() // refarred as $this->due_profit
    {
        return floor($this->total_profit - $this->total_paid_profit);
        // return $this->due_amount * ($this->percent/100);
    }

    // get due principle amount
    public function getDuePrincipleAttribute() // refarred as $this->due_principle
    {
        return floor($this->loan_amount - $this->total_paid_principle);
    }

    // {
    //     return $this->due_amount - $this->due_interest;
    // }

    // #### calculations for relationships

    // get total count of installment collection
    public function getInstallmentCountAttribute() // refarred as $this->installment_count
    {
        return $this->installments()->where('loan_id', $this->id)->count();
    }

    // total paid amount of the loan investment
    public function getTotalPaidAttribute() // refarred as $this->total_paid
    {
        return $this->installments()->where('loan_id', $this->id)->sum('amount');
    }

    public function getTotalPaidProfitAttribute() // refarred as $this->total_paid_profit
    {
        return floor($this->total_paid_principle * ($this->percent/100));
    }

    // public function getTotalPaidProfitAttribute() // refarred as $this->total_paid_profit
    // {
    //     return floor($this->interent_per_installment * $this->installment_count);
    // }

    public function getTotalPaidPrincipleAttribute() // refarred as $this->total_paid_principle
    {
        // return $this->total_paid * $this->total_paid_profit;
        return floor(($this->total_paid * 100) / (100 + $this->percent));
        // return floor($this->total_paid * ($this->percent/100));
    }

}

/**
 * SQLSTATE[22007]: Invalid datetime format: 1366 Incorrect integer value:
 * 'Accusamus quia ad mi' for column `oslbdorg_demo`.`investments`.`leger` at row 1
 * (SQL: insert into `investments` (`reference_1`, `code`, `member_id`, `category_id`, `staff_id`, `branch_id`, `area_id`, `invest_date`, `start_date`, `close_date`, `scheme`, `leger`, `invest_amount`, `interest_amount`, `total_amount`, `installment_principle`, `installment_profit`, `installment_amount`, `penalty`, `discount_amount`, `net_amount`, `installment_sequence`, `installment_total`, `installment_paid`, `security_docs`, `expire_date`, `status`, `paid_principle`, `paid_profit`, `paid_total`, `updated_at`, `created_at`) values (3, 616be18b66021, 3, 13, 722, 1, 1, 2015-10-17, 2015-12-22 00:00:00, ?, half_month, Accusamus quia ad mi, 1000, 90, 1090, 1, 0, 1, 80, ?, 1090, ?, 942, 0, Maiores et tempora v, 2015-10-17 00:00:00, Running, 0, 0, 0, 2021-10-17 14:40:43, 2021-10-17 14:40:43)) This member has already 2 unpaid investment.
*/
