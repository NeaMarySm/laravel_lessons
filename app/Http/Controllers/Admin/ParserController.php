<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Http\Requests\sources\CreateRequest;
use App\Jobs\NewsParser;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;

class ParserController extends Controller
{

    public function index(Request $request, Parser $parser){
        $sources = Source::all();
        // $urls = [
		// 	'https://news.yandex.ru/gadgets.rss',
		// 	'https://news.yandex.ru/index.rss',
		// 	'https://news.yandex.ru/martial_arts.rss',
		// 	'https://news.yandex.ru/communal.rss',
		// 	'https://news.yandex.ru/health.rss',
		// 	'https://news.yandex.ru/games.rss',
		// 	'https://news.yandex.ru/internet.rss',
		// 	'https://news.yandex.ru/cyber_sport.rss',
		// 	'https://news.yandex.ru/movies.rss',
		// 	'https://news.yandex.ru/cosmos.rss',
		// 	'https://news.yandex.ru/culture.rss',
		// 	'https://news.yandex.ru/championsleague.rss',
		// 	'https://news.yandex.ru/music.rss',
		// ];

        foreach($sources as $source){
            dispatch(new NewsParser($source));
        }

        return redirect()->route('admin.sources.index')
        ->with('success', __('Парсинг стартовал'));
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Parser $parser)
    {
        $source_id = $request->only('id');
        $source = Source::where('id', $source_id)->first();
        dispatch(new NewsParser($source));
        return redirect()->route('admin.sources.index')
        ->with('success', __('Парсинг стартовал'));
        
    }
}
