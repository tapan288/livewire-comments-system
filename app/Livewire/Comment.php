<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\ReplyForm;
use App\Models\Comment as CommentModel;

class Comment extends Component
{
    public CommentModel $comment;

    public $isReplying = false;

    public ReplyForm $form;

    public function storeReply()
    {
        $this->form->storeReply($this->comment);

        $this->isReplying = false;
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
