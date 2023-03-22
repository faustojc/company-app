@extends('livewire.main-component')

@section('content')
    <section id= "featured" class="my-5 pb-5">
    	<div class="container text-center mt-5 py-5"> 
    		<h3>Our Feature</h3>
            <hr>
            <p>Here you can check out our new products with fair price on Delargo.ph</p>
    	</div> 
        <div onclick="window.location.href='singleproduct.html';" class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img src="{{ asset('resource/images/flaredCargo.png') }}" width="300" height="350" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>  <!--not working-->
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    
                </div>
                <h5 class="p-name">Flared Cargos</h5>
                <h4 class="p-price"> ₱899</h4>
                <button class="buy-btn">Add to cart</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img src="{{ asset('resource/images/BaggyCargoPants.png') }}" width="300" height="350" padding="10px" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Baggy Cargo pants</h5>
                <h4 class="p-price"> ₱599</h4>
                <button class="buy-btn">Add to cart</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img src="{{ asset('resource/images/baggyDenimCargos.png') }}" width="300" height="350" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Baggy Denim Cargos</h5>
                <h4 class="p-price">  ₱799 </h4>
                <button class="buy-btn">Add to cart</button>
            </div>
            <br>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img src="{{ asset('resource/images/LowriseFlaredCargo.png') }}" width="300" height="350" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5 class="p-name">Lowrise Flared Cargo</h5>
                <h4 class="p-price">  ₱799</h4>
                <button class="buy-btn">Add to cart</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img src="{{ asset('resource/images/BaggyMultipocket.png') }}" width="300" height="350" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Baggy Multipocket</h5>
                <h4 class="p-price"> ₱699</h4>
                <button class="buy-btn">Add to cart</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img src="{{ asset('resource/images/baggyCargos.png') }}" width="300" height="350" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Baggy Cargos</h5>
                <h4 class="p-price"> ₱1,349</h4>
                <button class="buy-btn">Add to cart</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img src="{{ asset('resource/images/baggyCargos.png') }}" width="300" height="350" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Baggy Cargos</h5>
                <h4 class="p-price"> ₱1,349</h4>
                <button class="buy-btn">Add to cart</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img src="{{ asset('resource/images/baggyDenimCargos.png') }}" width="300" height="350" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Baggy Denim Cargos</h5>
                <h4 class="p-price">  ₱799 </h4>
                <button class="buy-btn">Add to cart</button>
            </div>



        </div>
    </section>
@endsection
