<?php

namespace App\Models\Accounts;

use App\Models\Primary\Area;
use App\Models\Savings;
use App\Models\SavingsBalance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Members extends Model
{
    use HasFactory;
    protected $fillable = [
        'area_id',
        'm_name',
    ];

    // The accessors to append to the model's array form.
    protected $appends = ['photo', 'address','total_deposit','total_withdraw','due_loan_amount'];

    /// relationships to area
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    // Get all of the savings for the Members
    public function savings()
    {
        return $this->hasMany(Savings::class, 'account_id', 'account');
    }
    // Get all of the savings transaction for the Member
    public function dps_trans()
    {
        return $this->hasManyThrough(SavingsBalance::class, Savings::class, 'account_id', 'savings_id', 'account');
        // return $this->hasManyThrough(SavingsBalance::class,Savings::class, 'account_id', 'savings_id', 'id', 'id');
    }


    // relationship to Fixed deposit account
    public function fdr()
    {
        return $this->hasMany(FixedDiposit::class, 'account', 'account');
    }


    // relationship to general account transactions
    public function generalAc()
    {
        return $this->hasMany(GeneralAcTransactions::class,'account', 'account');
    }

    // current account
    public function currentAccount()
    {
        return $this->hasMany(CurrentAccount::class, 'account', 'account');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class,'account_id','account');
    }



    // defined attributes

    public function getPhotoAttribute()             // reffered as $this->photo
    {
        $member_photo = 'storage/uploads/members/' . $this->m_photo;
        $default_image = 'images/default_member_image.jpg';
        return empty($this->m_photo) ? $default_image : $member_photo;
    }

    public function getAddressAttribute()           // reffered as $this->address
    {
        $village = $this->m_village ? $this->m_village . ', ' : '';
        $post = $this->m_post ? $this->m_post . ', ' : '';
        $thana = $this->m_thana ? $this->m_thana . ', ' : '';
        $district = $this->m_district ? $this->m_district . '.' : '';
        $address = $village . $post . $thana . $district;

        return $address ? $address : "(No address found)";
    }

    public function getTotalDepositAttribute()      // reffered as $this->total_deposit
    {
        return $this->generalAc()->where('account', $this->account)->sum('deposit');
    }

    public function getAccountSavingsAmountAttribute() //reffered as $this->account_savings_amount
    {
        return $this->savings()->where('account_id', $this->account)->sum('savings_amount');
    }

    // general account total withdraw
    public function getTotalWithdrawAttribute()     // reffered as $this->total_withdraw
    {
        return $this->generalAc()->where('account', $this->account)->sum('withdraw');
    }

    // get general ac balance
    public function getAcBalanceAttribute()         // reffered as $this->ac_balance
    {
        return $this->total_deposit - $this->total_withdraw;
    }

    // get total loan due amount
    public function getDueLoanAmountAttribute() //reffered as $this->due_loan_amount
    {
        return $this->loans()->where('account_id', $this->account)->sum('loan_amount');
    }

    // get current account total deposit amount
    public function getCdAcTotalDepositAttribute() // $member->cd_ac_total_deposit
    {
        return $this->currentAccount()->where('account', $this->account)->sum('deposit_amount');
    }

    // get current account total withdraw
    public function getCdAcTotalWithdrawAttribute() // $member->cd_ac_total_withdraw
    {
        return $this->currentAccount()->where('account', $this->account)->sum('withdraw');
    }

    // get current account balance
    public function getCdAcBalanceAttribute() // $member->cd_ac_balance
    {
        return $this->cd_ac_total_deposit - $this->cd_ac_total_withdraw;
    }

    //get active loan
    public function getActiveLoanAttribute() // reffered as $this->active_loan
    {
        return $this->loans()->where('account_id', $this->account)->whereIn('status', [1,2])->get();
    }

    //get active loan
    public function getActiveDpsAttribute() // reffered as $this->active_dps
    {
        return $this->savings()->where('account_id', $this->account)->whereIn('status', [1,2])->get();
    }

    //get current dps balance
    public function getCurrentDpsBalanceAttribute() // reffered as $this->current_dps_balance
    {
        // $dps = $this->savings()->where('account_id', $this->account)->whereIn('status', [1,2]);
        // return $dps->sum('deposit') - $dps->sum('withdraw');
        $dps_trans = $this->dps_trans()->where('account_id', $this->account)->whereIn('status',[1,2]);
        return $dps_trans->sum('deposit') - $dps_trans->sum('withdraw');
    }

}


