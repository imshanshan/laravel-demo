<?php

namespace App\Policies\Web;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function update(User $user, Topic $topic)
    {
        return $user->isAuthor($topic);
    }
    
    public function destory(User $user, Topic $topic)
    {
        return $user->isAuthor($topic);
    }
}
