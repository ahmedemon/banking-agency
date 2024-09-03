<?php

namespace Database\Factories\Primary;

use App\Models\Primary\BranchList;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BranchList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city() . ' Branch',
            'address' => $this->faker->address(),
            'hotline' => '01' . random_int(300000000,999999999)
        ];
    }
}
