<?php

namespace Database\Seeders;

use App\Models\Shoe;
use illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $shoe = new Shoe;
            $shoe->manufacturer = $faker->company();
            $shoe->model = $faker->sentence(1, true);
            $shoe->material = $faker->sentence(5, true);
            $shoe->image = 'uploads/shoes/no-image.webp';
            $shoe->description = $faker->sentence(20, true);
            $shoe->price = $faker->randomFloat(2, 20, 90);
            $shoe->size = $faker->numberBetween(16, 53);
            $shoe->slug = Str::of($shoe->manufacturer . '-' . $shoe->model)->slug('-');
            $shoe->save();
        }
    }
}