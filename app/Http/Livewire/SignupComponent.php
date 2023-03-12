<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SignupComponent extends Component
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        return view('livewire.signup');
    }
}
