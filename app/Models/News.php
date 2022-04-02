<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews():array
    {
        return DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as categoryTitle')
            ->where([
                ['news.status', '=', 'ACTIVE']
            ])
            ->get()->toArray();
    }

    public function getNewsById(int $id):mixed
    {
        return DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as categoryTitle')
            ->where([
                ['news.status', '=', 'ACTIVE'],
                ['news.id', '=', $id]
            ])
            ->get()->first();
            
    }    
    public function getNewsByCategoryId(int $category_id):mixed
    {
        return DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as categoryTitle')
            ->where([
                ['news.status', '=', 'ACTIVE'],
                ['news.category_id', '=', $category_id]
            ])
            ->get()->toArray();
    }
}
