@extends('home.layout.master')

@section('title', 'Car Rental | Hacthback')

@section('styles')
    @include('home.assets.bootstrapcss')
    @include('home.assets.style')
    <link rel="stylesheet" href="/css/guest-nav.css">
    <link rel="stylesheet" href="/css/main-nav-2.css">
    <link rel="stylesheet" href="/css/main-home.css">
    <link rel="stylesheet" href="/css/main-viewcar.css">
 @endsection

@section('content') 
    @include('home.layout.header-for-guest')
    @include('home.layout.header2-main')

    <section class="all-cars-section">

        <p class="category-title pb-4">Hatchback</p>

        <div class="all-cars-row">


        <!-- CAR PRODUCT -->  
            @foreach($addcar as $item)
                @if ($item->is_active == true && $item->vehicle == 'Hatchback')
                <div class="car-wrapper">
                    <a href="/guestviewcar/{{ $item->slug }}" class="text-dark car-link" style="text-decoration: none;" title="View Car">
                
                        <div class="car-col-1">

                        <img src="/images/uploads/{{ $item->carphoto }}"
                        id="allcars-img" style="object-fit: cover;"/>
                        </div>


                        <div class="car-col-2">

                            <div class="d-flex" style="gap: 10px;">
                                <h5 class="brand"><strong>{{ $item->brand}} {{ $item->model}} {{ $item->year}}</strong></h5> 
                                <p class="transmission">{{ $item->transmission}}</p>
                            </div>

                                <p class="location">{{ $item->carlocation}}</p>

                        <div class="d-flex align-items-center prices" style="gap: 10px;">
                            <span><h6><sup>₱</sup> {{ number_format($item->weeklyrate) }} / Weekly</h6></span>
                            <span><h5>|</h5></span>
                            <span><h6><sup>₱</sup> {{ number_format($item->monthlyrate) }} / Monthly</h6></span>
                        </div>

                            <h5 class="pt-1 dailyrate"><sup>₱</sup> {{ number_format($item->dailyrate) }} | Daily</h5>
                    </a>
                            
                            <div class="carbuttons">
                                <a href="/guestviewcar/{{ $item->slug }}" class="btn-addcart">
                                    <span><i class="far fa-car"></i></span>
                                    <span>VIEW CAR</span>
                                </a>
                                

                                <a href="/bookingforms/{{ $item->slug }}" class="btn-checkout text-decoration-none">
                                    <span><i class="fas fa-caret-right"></i></span>
                                    <span>BOOK NOW</span>
                                </a>
                            
                            </div>

                        </div>

                </div>
                @endif
            
            @endforeach

            @if ($addcar->where('is_active', true)->where('vehicle', 'Hatchback')->count() == 0)
                <span class="text-muted no-cars-available">No cars available</span>
            @endif



        </div>
        </section>

    @include('home.layout.footer')
@endsection

@section('script')
    @include('home.assets.script')
    @include('home.assets.bootstrapjs')
@endsection

