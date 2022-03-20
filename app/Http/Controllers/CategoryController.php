<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();
        return view('categories.index', ['categoryList' => $categories]);
    }

    public function show(int $category_id)
    {
        $newsList = $this->getNews();

        $newsByCategory = [];

        foreach($newsList as $news)
        {
            if($news['category']['id'] == $category_id)
            {
                $newsByCategory[] = $news;
            }
        }

        return view('news.index', ['newsList' => $newsByCategory]);
    }
}
