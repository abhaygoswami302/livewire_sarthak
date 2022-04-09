<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',        
    ];

    public function submit()
    {
        $validated_data = $this->validate([
            'form.name' => 'required|min:3',
            'form.email' => 'required|email',
            'form.password' => 'required|confirmed',
        ]);
        //dd($validated_data);
        User::create($this->form);

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
