<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_news()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.create'))
                    ->type('title', 'some title')
                    ->select('category_id', mt_rand(1,10))
                    ->type('author', 'some author')
                    ->select('status', 'DRAFT')
                    ->type('text', 'some text')
                    ->press('Сохранить')
                    ->assertPathIs(route('admin.news.index'));
        });
    }
}
