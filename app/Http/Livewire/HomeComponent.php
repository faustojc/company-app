<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $main = new MainComponent();
        $main = $main->render_main();
        $products = Product::query()->get()->all();

        return view('livewire.home-component', $main)->with('products', $products)->extends('livewire.main-component');
    }
}
