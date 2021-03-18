<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostCreateForm extends Component
{
    public function storePostInformation()
    {
        $this->validate();
    }
}
