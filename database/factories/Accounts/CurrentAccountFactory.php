<?php

namespace Database\Factories\Accounts;

use App\Models\Accounts\CurrentAccount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CurrentAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurrentAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $member = DB::table('members')->select(['account','join','regular_savings'])->get()->random();
        $amounts = [5,10,20,30,50,100,150,200];
        return [
            'date' => $this->faker->dateTimeBetween($member->join),
            'account' => $member->account,
            'deposit_amount' => $amounts[array_rand($amounts)] * 100,
        ];
    }
}
