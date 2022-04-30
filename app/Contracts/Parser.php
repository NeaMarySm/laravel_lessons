<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\Source;

interface Parser 
{    
    /**
     * setUrl
     *
     * @param  Source $source
     * 
     */
    public function setSource(Source $source): self;
    
    /**
     * getNews
     *
     * @return array
     */
    public function saveNews(): void;
    
}