@extends('livewire.main-component')

@section('content')
<section id="home" style="background-image: url('resource/images/bkg.jpg');">
    <div class="container">
        <h5 class="text-white font-bold">Delargo.ph</h5>
        <h1><span>Best Prices</span> This Year</h1>
        <p>Offers your very comfortable time on walking and exercises. </p>
        <button href="{{ route('category') }}">Shop Now</button>
    </div>
</section>
@endsection
