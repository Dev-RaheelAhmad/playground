<?php

namespace App\Livewire\Counter;

use Livewire\Component;

class Child1 extends Component
{
    public function render()
    {
        sleep(1);

        return view('livewire.counter.child1');
    }
}
