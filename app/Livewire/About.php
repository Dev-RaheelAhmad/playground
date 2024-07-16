<?php

namespace App\Livewire;

use Livewire\Component;

class About extends Component
{

    public function render()
    {
        sleep(3);

        return view('livewire.about');
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>loading...</div>
        HTML;
    }
}
