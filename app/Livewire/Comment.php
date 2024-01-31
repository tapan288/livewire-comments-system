<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment as CommentModel;

class Comment extends Component
{
    public CommentModel $comment;

    public function render()
    {
        return view('livewire.comment');
    }
}
