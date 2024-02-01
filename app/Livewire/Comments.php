<?php

namespace App\Livewire;

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

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->model->comments()->parent()->latest()->get(),
        ]);
    }
}
