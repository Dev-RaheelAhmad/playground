<?php

namespace App\Livewire\Counter;

use Livewire\Component;

class Index extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {

        return view('livewire.counter.index');
    }
}
