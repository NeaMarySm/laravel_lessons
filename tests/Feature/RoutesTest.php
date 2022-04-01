<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news_index_status_success()
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }
    public function test_news_show_status_success()
    {
        $response = $this->get(route('news.show', ['id'=> 1]));

        $response->assertOk();
    }
    public function test_categories_index_status_success()
    {
        $response = $this->get(route('categories'));

        $response->assertSuccessful();
    }
    public function test_feedback_store_validation_errors()
    {
        $data = [
            "username" => "Jack",
            "feedback-text" => "text"
        ];
        $response = $this->post(route('feedback.store'), $data);

        $response->assertJsonMissingValidationErrors('username');
    }
    public function test_feedback_store_array_count()
    {
        $data = [
            "username" => "Jack",
            "feedback-text" => "text"
        ];
        $response = $this->post(route('feedback.store'), $data);

        $response->assertJsonCount(2);
    }
    public function test_feedback_store_invalid_username_int()
    {
        $data = [
            "username" => 1,
            "feedback-text" => "text"
        ];
        $response = $this->post(route('feedback.store'), $data);

        $response->assertInvalid('username');
    }
    public function test_feedback_store_username_required()
    {
        $data = [
            "username" => '',
            "feedback-text" => "text"
        ];
        $response = $this->post(route('feedback.store'), $data);

        $response->assertInvalid('username');
    }
    public function test_order_has_location()
    {
        $response = $this->get(route('order'));

        $response->assertLocation('http://example-app.test');
    }
    

}
