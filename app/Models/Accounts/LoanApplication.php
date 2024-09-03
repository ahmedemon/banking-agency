<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanApplication extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = [
        'member_id',
        'member_name',
        'member_f_name',
        'member_m_name',
        'expect_loan_details',
        'acount_type',
        'loan_reason',
        'previous_loan',
        'loan_collection_method',
        'bank_check_details',
        'check_number',
        'member_age',
        'current_address',
        'permanent_address',
        'member_phone',
        'bank_account',
        'loan_type',
        'total_deposit',
        'expect_loan_amount',
        'expect_loan_amount_percentage',
        'yearly_income',
        'member_profession',
        'organization_name',
        'member_title',
        'total_year',
        'total_salary',
        'family_member',
        'business_type',
        'rent_or_owner',
        'is_ownership',
        'licence_issue_date',
    ];
}
