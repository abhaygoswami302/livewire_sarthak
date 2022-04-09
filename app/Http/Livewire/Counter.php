<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $text =0 ;

    public function increment()
    {
        $this->text = $this->text + 1;;
    }

    public function decrement()
    {
        $this->text = $this->text - 1;;
    }
    
    public function render()
    {
        return view('livewire.counter');
    }
}
