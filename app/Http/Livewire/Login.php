<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $form = [
        'email' => '',
        'password' => ''
    ];

    public function submit()
    {
        $this->validate([
            'form.email' => 'required|email',
            'form.password' => 'required'
        ]);

        $user = User::where('email', $this->form['email'])
                        ->where('password', $this->form['password'])->first();
        Auth::attempt($this->form);
        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
