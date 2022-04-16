<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Http\Requests\sources\CreateRequest;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;

class ParserController extends Controller
{

    public function index(){
        echo 'Parser';
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Parser $parser)
    {
        $source = $request->only('url', 'name');

        $newslist = $parser->setUrl($source['url'])->getNews();
        $newsLoaded=[];
        foreach($newslist as $news){
            foreach($news as $item){
                $newsLoaded[] = News::create([
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'category_id' => 5,
                    'author' => $source['name'],
                    'status' => 'DRAFT'
                ]);
                
            }
        }
        if($newsLoaded){
            return redirect()->route('admin.sources.index')
                ->with('success', __('Новости успешно выгружены'));
        }
        return redirect()->route('admin.sources.index')
            ->with('error', __('Выгрузка не удалась'));

    }
}
