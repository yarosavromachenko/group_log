<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Student;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();
        Item::factory()
            ->count(5)
            ->hasAttached($students,['grade' => null])
            ->create();
    }
}
