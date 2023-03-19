<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Request;

class ProductComponent extends Component
{
    public $product;

    public function render(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $id = $request->getSession()->get('data');

        $this->product = DB::table('product')->where('product_id', $id)->get()->first();

        return view('livewire.product-component')->extends('layouts.master');
    }
}
