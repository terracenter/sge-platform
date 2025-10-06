<?php

namespace Blog\Policies;

use App\Models\User;
use Blog\Models\Post;

class PostPolicy
{
    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Post $post): bool
    {
        \Log::info("Policy check - User: {$user->id}, Post User: {$post->user_id}, Result: " . ($user->id === $post->user_id ? 'YES' : 'NO'));
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }
}