<?php

namespace Database\Factories\Accounts;

use App\Models\Accounts\GeneralAcTransactions;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class GeneralAcTransactionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GeneralAcTransactions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $member = DB::table('members')->select(['account','join','regular_savings'])->get()->random();
        return [
            'date' => $this->faker->dateTimeBetween($member->join),
            'account' => $member->account,
            'deposit' => $member->regular_savings,
        ];
    }
}
