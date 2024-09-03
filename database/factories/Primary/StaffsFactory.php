<?php

namespace Database\Factories\Primary;

use App\Models\Primary\Staffs;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StaffsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staffs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'join' => $this->faker->date(),
            'name' => $this->faker->name(),
            'birthday' => $this->faker->date(),
            'father' => $this->faker->name(),
            'mother' => $this->faker->name(),
            'nid' => random_int(1000000000,9999999999),
            'gender' => rand(1,2),
            'mobile' => '01' . random_int(300000000,999999999),
            'address' => $this->faker->address(),
            'designation'=> $this->faker->text(10),
            'publish' => rand(0,1),
            'user_role' => rand(2,4),
            'branch' => 1,
            'active' => 1,
            'interview' => $this->faker->date(),
            'security_money' => 20000,
            'salary' => rand(12000,30000),
            'house' => 2000,
            'medical' => 1000,
            'convenience' => 500,
            'transport' => 500,
            'mobile_bill' => 500,
        ];
    }
}
