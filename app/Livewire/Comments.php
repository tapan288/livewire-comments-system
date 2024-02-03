<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Livewire\Forms\CommentForm;
use Illuminate\Database\Eloquent\Model;

class Comments extends Component
{
    public Model $model;

    public CommentForm $form;

    public function postComment()
    {
        $this->form->storeComment($this->model);
    }

    public function deleteComment($comment_id)
    {
        $comment = Comment::find($comment_id);

        $this->authorize('delete', $comment);

        $comment->delete();
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->model
                ->comments()
                ->with('user', 'replies.user', 'replies.replies')
                ->parent()
                ->latest()
                ->get(),
        ]);
    }
}
