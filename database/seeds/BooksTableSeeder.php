<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('books')->insert([
                'title' => $faker->name,
                'price' => $faker->randomNumber,
                'review' => $faker->text,
                'author_id' => $faker->randomNumber,
                'category_id' => $faker->randomNumber,
                'publisher_id' => $faker->randomNumber
            ]);
        }
    }
}
