<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_sources')->insert($this->getData());
    }
    private function getData()
    {
        $data = [];
        for($i=0; $i<20; $i++){
            $data[] = [
                'news_id' => mt_rand(1,10),
                'source_id' => mt_rand(1,10),
            ];
        }
        return $data;
    }
}
