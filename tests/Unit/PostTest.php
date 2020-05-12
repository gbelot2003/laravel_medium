<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class PostTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    public function it_has_a_path()
    {
        $post = factory('App\Post')->create();

        $this->assertEquals(
            route(
          'posts-show',
          ['user' => $post->user->username, 'post' => $post->slug]
      ),
            $post->path()
        );
    }
    /** @test */
    public function it_has_a_user()
    {
        $this->withoutExceptionHandling();
        $post = factory('App\Post')->create();
        $this->assertInstanceOf("App\User", $post->user);
    }
    /** @test */
    public function it_has_a_slug()
    {
        $post = factory('App\Post')->create(['title' => 'Laravel is Awesome']);
        $this->assertEquals('laravel-is-awesome', $post->slug);
    }
}