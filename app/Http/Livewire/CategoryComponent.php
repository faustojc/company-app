<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Request;

class CategoryComponent extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $main = new MainComponent();
        $main = $main->render_main();

        return view('livewire.category-component', $main)->extends('livewire.main-component');
    }
}
