<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->builder();
    }

    public function builder() {
        $created_array = [];
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $create_i = [
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'logo' => $faker->url,
                'website' => $faker->url,
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now')->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now')->format('Y-m-d H:i:s'),
            ];
            $created_array[] = $create_i;
        }
        $seedbig = new SeedBigData($created_array, 100, "companies"); // seeding fast
        $seedbig->run();
    }

}
