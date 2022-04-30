<?php

namespace App\Services;

use Exception;
use Illuminate\Http\UploadedFile;

class UploadService 
{    
    /**
     * uploadFile
     *
     * @param  UploadedFile $file
     * @return string
     */
    public function uploadFile(UploadedFile $file): string
    {
        $completedFile = $file->storeAs('news', $file->hashName(), 'public');
        
        if(!$completedFile){
            throw new Exception('file wasnt uploaded');
        }

        return $completedFile;
    }

}