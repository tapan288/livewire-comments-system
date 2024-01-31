<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class Comments extends Component
{
    public Model $model;

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->model->comments()->parent()->latest()->get(),
        ]);
    }
}
