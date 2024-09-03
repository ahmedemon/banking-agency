<?php

namespace Database\Factories\Primary;

use App\Models\Primary\Area;
use App\Models\Primary\Staffs;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class AreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Area::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city() . ' Area',
            'branch_id' => 1,
            'associate_id' => Staffs::select('id')->where('user_role',3)->inRandomOrder()->first()->id,
        ];
    }
}
