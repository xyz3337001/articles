<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticlesConteollerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected static $article_id = 0;

    public function test_index()
    {
        $response = $this->get('/articles');
        $response->assertOk();
    }

    public function test_create()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/articles/create');
        $response->assertOk();
    }

    public function test_store()
    {
        $this->test_create();
        $response = $this->post('/articles', ['title' => $this->faker->title, 'content' => $this->faker->text]);
        $response->assertRedirect('/articles');
        self::$article_id = Article::latest()->first()->id;
    }

    public function test_show()
    {
        $this->test_store();
        $response = $this->get('/articles/' . self::$article_id);
        $response->assertOk();
    }

    public function test_edit()
    {
        $this->test_create();
        $this->test_store();
        $response = $this->get('/articles/' . self::$article_id . '/edit');
        $response->assertOk();
    }

    public function test_update()
    {
        $this->test_create();
        $this->test_store();
        $response = $this->patch('/articles/' . self::$article_id, ['title' => $this->faker->title, 'content' => $this->faker->text]);
        $response->assertRedirect('/articles');
    }

    public function test_destroy()
    {
        $this->test_create();
        $this->test_store();
        $response = $this->delete('/articles/' . self::$article_id);
        $response->assertRedirect('/articles');
    }
}
