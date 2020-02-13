<?php

use Illuminate\Database\Seeder;
use App\Company;

class EmployeeTableSeeder extends Seeder {

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
        $company_len = Company::count();
        for ($i = 0; $i < 500; $i++) {
            $create_i = [
                'f_name' => $faker->name,
                'l_name' => $faker->unique()->email,
                'company_id' => rand(1,$company_len),
                'email' => $faker->unique()->email,
                'phone' => $faker->unique()->phoneNumber,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ];
            $created_array[] = $create_i;
        }
        $seedbig = new SeedBigData($created_array, 100, "employees"); // seeding fast
        $seedbig->run();
    }

}
