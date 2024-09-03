<?php

namespace App\Rules;

use App\Models\Accounts\Members;
use Illuminate\Contracts\Validation\Rule;

class ReferrarAcRules implements Rule
{
    private $account;
    private $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($account)
    {
        $this->account = $account;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $member = Members::where('account',$value)->get();

        $passes = true;

        if ($member->first()->account == $this->account) {
            $this->message = 'Refferar account can not be same as your account';
            $passes = false;
        }

        if (!$member->count()) {
            $this->message = 'Refferar account not found in member accounts';
            $passes = false;
        }

        return $passes;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
