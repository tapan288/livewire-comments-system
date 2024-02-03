<?php

namespace App\Models\Presenters;

use App\Models\Comment;

class CommentPresenter
{
    public function __construct(public Comment $comment)
    {
        //
    }

    public function relativeCreatedAt()
    {
        return $this->comment->created_at->diffForHumans();
    }
}
