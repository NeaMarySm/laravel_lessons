<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'newsList' => News::with('category')->paginate(9)
        ]);
    }
    public function show($id)
    {
        return view('news.show', [
            'news' => News::with(['category', 'source'])->find($id),
            
        ]);
    }
    public function welcome()
    {   
        return view('welcome_page', [
            'newsList' => News::with('category')->get()->random(3)
        ]);
    }

    public function showByCategory(int $category_id)
    {

        return view('news.index', [
            'newsList' => News::byCategory($category_id)->with('category')->paginate(9)
        ]);
    }
}
