<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = app(News::class)->getNews();
        return view('news.index', [
            'newsList' => $news
        ]);
    }
    public function show(int $id)
    {
        $news = app(News::class)->getNewsById($id);
        //dd($news);
        return view('news.show', [
            'news' => $news
        ]);
    }
    public function welcome()
    {    
        $news = app(News::class);
        $newsList=[];
        for($i=0; $i<3; $i++){
            $newsList[] = $news->getNewsById(mt_rand(1,10));
        }
        return view('welcome_page', [
            'newsList' => $newsList
        ]);
    }

    public function showByCategory(int $category_id)
    {
        $news = app(News::class);
        $newsByCategory = $news->getNewsByCategoryId($category_id);

        return view('news.index', ['newsList' => $newsByCategory]);
    }

}
