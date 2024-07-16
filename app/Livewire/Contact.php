<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Contact extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';

    public function render()
    {
        sleep(1);

        return view('livewire.contact');
    }
}
