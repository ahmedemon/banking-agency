<?php

namespace Database\Factories\Accounts;

use App\Models\Accounts\Members;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MembersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Members::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $member = $this->model::max('account');
        $account = (int) ($member ? $member + 1 : 2021101);
        return [
            'area_id' => (int) DB::table('areas')->select('id')->get()->random()->id,
            'm_name' => $this->faker->name(),
            'm_mobile' => '01' . $this->faker->numberBetween(311111111,999999999),
            'm_birthday' => $this->faker->date(),
            'm_father' => $this->faker->name('male'),
            'm_mother' => $this->faker->name('female'),
            'm_district' => $this->faker->city(),
            'email' => $this->faker->email(),
            'account' => $account,
            'join' => $this->faker->date(),
            'm_gender' => rand(1,2),
            'profession' => $this->faker->jobTitle(10),
            'regular_savings' => 50,
            'active' => 1
        ];
    }
}
