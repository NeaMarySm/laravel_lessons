<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(?int $id = null):array
    {
        $faker = Factory::create();

        $statusList = ['DRAFTED', 'BLOCKED', 'ACTIVE'];

        $categories = $this->getCategories();

        if($id){
            return [
                'id'    => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(250,200),
                'status' => $statusList[mt_rand(0,2)],
                'category' => $categories[mt_rand(0,4)],
                'description' => $faker->text(250),
            ];
        }

        $data = [];
        for($i=0; $i<10; $i++){
            $id = $i + 1;
            $data[] = [
                'id'    => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200,180),
                'status' => $statusList[mt_rand(0,2)],
                'category' => $categories[mt_rand(0,4)],
                'description' => $faker->text(100),
            ];
        }

        return $data;
    }

    public function getCategories():array
    {
        $faker = Factory::create();

        $categoryList = [];
        for($i=0; $i<5; $i++){
            $id = $i + 1;
            $categoryList[] = [
                'id'    => $id,
                'name' => $faker->company(),
            ];
        }

        return $categoryList;
    }
}
