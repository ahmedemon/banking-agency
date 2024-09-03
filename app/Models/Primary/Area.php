<?php

namespace App\Models\Primary;

use App\Models\Accounts\CurrentAccount;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Accounts\Loan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Accounts\Members;
use App\Models\Savings;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Area extends Model
{
    use HasFactory;

    // protected $table = 'areas';

    protected $fillable = ['name','branch_id','associate_id'];

    public function members()
    {
        return $this->hasMany(Members::class, 'area_id', 'id');
    }

    /**
     * Get the associate associated with the Area
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function associate()
    {
        return $this->hasOne(Staffs::class,'id', 'associate_id');
    }

    public function branch()
    {
        return $this->belongsTo(BranchList::class);
    }

    /**
     * Get all of the loans for the Area
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function loans(): HasManyThrough
    {
        return $this->hasManyThrough(Loan::class, Members::class, 'area_id', 'account_id','id','account');
    }

    /**
     * Get all of the savings for the Area
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function savings(): HasManyThrough
    {
        return $this->hasManyThrough(Savings::class, Members::class, 'area_id', 'account_id','id','account');
    }

    /**
     * Get all of the general ac transaction for the Area
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function general_ac(): HasManyThrough
    {
        return $this->hasManyThrough(GeneralAcTransactions::class, Members::class, 'area_id', 'account','id','account');
    }

    /**
     * Get all of the current account for the Area
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function current_ac(): HasManyThrough
    {
        return $this->hasManyThrough(CurrentAccount::class, Members::class, 'area_id', 'account','id','account');
    }

    // Get all of the fixed diposit for the Area
    public function fdr(): HasManyThrough
    {
        return $this->hasManyThrough(FixedDiposit::class, Members::class, 'area_id', 'account','id','account');
    }


}
