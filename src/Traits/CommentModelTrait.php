<?php

namespace Donkovah\Teaket\Traits;

use Donkovah\Teaket\Model\Comment;

trait CommentModel
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}