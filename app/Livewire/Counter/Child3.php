<?php

namespace App\Livewire\Counter;

use Livewire\Component;

class Child3 extends Component
{
    public function render()
    {
        sleep(2);

        return view('livewire.counter.child3');
    }
}
