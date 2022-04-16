<?php

declare(strict_types=1);
namespace App\Services;

use Orchestra\Parser\Xml\Facade as Parser;
use App\Contracts\Parser as Contract;

class ParserService implements Contract
{

    protected string $url;
     /**
     * setUrl
     *
     * @param  string $url
     * @return ParserService
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }
    
    /**
     * getNews
     *
     * @return array
     */
    public function getNews(): array
    {
        $xml = Parser::load($this->url);
        $sourceParsed = $xml->parse([
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
        ]);
        $newsParsed = $xml->parse([
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);
        
        return $newsParsed;
    }
}