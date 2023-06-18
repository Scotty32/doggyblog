<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikeableTest extends TestCase
{
    use RefreshDatabase;

    public function testLikes(): void
    {
        $post = Post::factory()->create();
        Like::factory()->create(['likeable_id' => $post->id]);

        $this->assertCount(1, $post->likes);
    }

    public function testLike(): void
    {
        $this->actingAsUser();
        $post = Post::factory()->create();

        $post->like();

        $this->assertCount(1, $post->likes);
    }

    public function testDislike(): void
    {
        $this->actingAsUser();
        $post = Post::factory()->create();

        $post->like();
        $this->assertCount(1, $post->likes);
        $post->dislike();

        $this->assertCount(0, $post->likes);
    }

    public function testIsLiked(): void
    {
        $this->actingAsUser();
        $post = Post::factory()->create();

        $post->like();

        $this->assertTrue($post->isLiked());
    }

    public function testIsNotLiked(): void
    {
        $this->actingAsUser();
        $post = Post::factory()->create();

        $this->assertFalse($post->isLiked());
    }
}
