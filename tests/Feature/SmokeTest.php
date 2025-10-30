<?php

use App\Models\User;
use App\Models\Post;

test('no smoke on public routes', function () {
    $post = Post::factory()->create();

    $routes = [
        route('home'),
        route('login'),
        route('register'),
        route('posts.public.index'),
        route('posts.public.show', $post),
    ];

    visit($routes)->assertNoSmoke();
});

test('no smoke on auth routes', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $post = Post::factory()->for($user, 'author')->create();

    $routes = [
        route('posts.index'),
        route('posts.create'),
        route('posts.show', $post),
        route('posts.edit', $post),
        route('posts.toggle', $post->id),
        route('import.source', 'fakestore'),
        route('logout'),
    ];

    visit($routes)->assertNoSmoke();
});
