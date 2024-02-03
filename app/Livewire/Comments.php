<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\CommentForm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Comments extends Component
{
    use AuthorizesRequests;

    public Model $model;

    public CommentForm $form;

    public function postComment()
    {
        $this->form->storeComment($this->model);
    }

    #[On('deleteComment')]
    public function deleteComment($comment)
    {
        $comment = Comment::find($comment);

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
