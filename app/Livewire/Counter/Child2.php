<?php

namespace App\Livewire\Counter;

use Livewire\Component;

class Child2 extends Component
{
    public function render()
    {
        sleep(1.5);

        return view('livewire.counter.child2');
    }
}
