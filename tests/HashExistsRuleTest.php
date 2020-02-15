<?php

namespace ApiChef\Obfuscate;

use ApiChef\Obfuscate\Dummy\Post;
use ApiChef\Obfuscate\Rules\HashExists;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class HashExistsRuleTest extends TestCase
{
    public function test_it_fails_when_invalid_string_id_given()
    {
        $this->expectException(ValidationException::class);

        $request = Request::create('/', 'GET', ['post' => 'crap']);
        $request->validate([
            'post' => new HashExists('posts', 'id'),
        ]);
    }

    public function test_it_fails_when_non_existing_id_given()
    {
        $this->expectException(ValidationException::class);

        $request = Request::create('/', 'GET', ['post' => 007]);
        $request->validate([
            'post' => new HashExists('posts', 'id'),
        ]);
    }

    public function test_it_passes_when_the_id_exists()
    {
        /** @var Post $post */
        $post = factory(Post::class)->create();

        $request = Request::create('/', 'GET', ['post' => $post->getRouteKey()]);
        $validatedData = $request->validate([
            'post' => new HashExists('posts', 'id'),
        ]);

        $this->assertNotEmpty($validatedData);
    }
}
