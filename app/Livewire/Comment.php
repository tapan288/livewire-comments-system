<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\ReplyForm;
use App\Models\Comment as CommentModel;
use App\Livewire\Forms\UpdateCommentForm;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Comment extends Component
{
    use AuthorizesRequests;

    public CommentModel $comment;

    public $isReplying = false, $isEditing = false;

    public ReplyForm $form;

    public UpdateCommentForm $updateForm;

    public function storeReply()
    {
        $this->form->storeReply($this->comment);

        $this->isReplying = false;
    }

    public function updateComment()
    {
        $this->authorize('update', $this->comment);

        $this->updateForm->updateComment($this->comment);

        $this->isEditing = false;
    }

    public function updatedIsEditing($value)
    {
        if ($value) {
            $this->updateForm->body = $this->comment->body;
        }
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
