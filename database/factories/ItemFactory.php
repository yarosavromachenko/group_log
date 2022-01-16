<?php


namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;
    /**
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(["Математика","Физика","География",
                "История","Химия"]),
        ];
    }
}
