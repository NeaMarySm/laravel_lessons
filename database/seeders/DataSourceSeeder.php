<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_sources')->insert($this->getSources());
    }

    private function getSources()
    {
        $faker = Factory::create();
        $data = [];
        for($i=0; $i<10; $i++){
            $data[] = [
                'url' => $faker->url(),
                'description' => $faker->text(100),
            ];
        }
        return $data;
    }
}
