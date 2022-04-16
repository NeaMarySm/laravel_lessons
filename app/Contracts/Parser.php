<?php

declare(strict_types=1);

namespace App\Contracts;

interface Parser 
{    
    /**
     * setUrl
     *
     * @param  string $url
     * 
     */
    public function setUrl(string $url): self;
    
    /**
     * getNews
     *
     * @return array
     */
    public function getNews(): array;
    
}