<?php

declare(strict_types=1);

namespace ApiChef\Obfuscate;

use ApiChef\Obfuscate\Dummy\Post;

class ObfuscateTest extends TestCase
{
    public function test_it_generates_the_url_with_encrypted_id()
    {
        /** @var Post $post */
        $post = Post::factory()->create();
        $path = parse_url(route('post.show', $post), PHP_URL_PATH);
        $encryptedId = explode('/', $path);

        $this->assertNotEquals($post->id, $encryptedId);
    }

    public function test_binding_works()
    {
        /** @var Post $post */
        $post = Post::factory()->create();

        $this->get(route('post.show', $post))
            ->assertJsonFragment([
                'id' => $post->id,
            ]);
    }

    public function test_scopeForHash()
    {
        /** @var Post $post */
        $post = Post::factory()->create();
        $found = Post::forHash($post->getRouteKey())->first();

        $this->assertEquals($post->id, $found->id);
    }
}
