<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Database\Eloquent\Model;

class CommentForm extends Form
{
    #[Validate('required', message: 'Please enter a comment.')]
    public $body;

    public function storeComment(Model $model)
    {
        $this->validate();

        $model->comments()->create([
            'body' => $this->body,
            'user_id' => auth()->id(),
        ]);

        $this->reset(['body']);
    }
}
