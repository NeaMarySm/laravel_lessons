<?php

declare(strict_types=1);
namespace App\Services;

use Orchestra\Parser\Xml\Facade as Parser;
use App\Contracts\Parser as Contract;
use App\Models\News;
use App\Models\Source;
use Illuminate\Support\Facades\Storage;

class ParserService implements Contract
{

    protected Source $source;
     /**
     * setUrl
     *
     * @param  Source $source
     * @return ParserService
     */
    public function setSource(Source $source): self
    {
        $this->source = $source;
        return $this;
    }

    public function addNewsToDB(array $newsList): array
    {
        $newsLoaded=[];
        foreach($newsList as $news){
            foreach($news as $item){
                $newsLoaded[] = News::create([
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'category_id' => 5,
                    'author' => $this->source->name,
                    'status' => 'DRAFT'
                ]);
                
            }
        }

        return $newsLoaded;
    }
    
    /**
     * getNews
     *
     * @return array
     */
    public function saveNews():void
    {
        $xml = Parser::load($this->source->url);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
             ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);

        $newsList = $xml->parse([
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
        
    //     $json = json_encode($data);
    //     $e = explode('/', $this->source->url);
    //     $fileName = end($e);
    //    Storage::append('news/'.$fileName, $json);
       
        $this->addNewsToDB($newsList);

          
    }
}