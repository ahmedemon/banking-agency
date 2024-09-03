<?php

namespace App\Models;

use App\Models\Accounts\Loan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanInstallments extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['loan_id', 'installment_no', 'date','amount','note','penalty','delete_by','processed_by'];



    // relation
    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }
}
