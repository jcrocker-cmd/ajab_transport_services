<section class="all-cars-section">
    <p class="pb-4">Search Cars</p>

    @if (count($cars) > 0)
    <p>Search Results for "{{ $searchTerm }}"</p>

    <div class="all-cars-row">

         <!-- CAR PRODUCT -->
        @foreach($cars as $car)
            @if ($car->is_active == true)
            <div class="car-wrapper">
                <a href="/mainviewcar/{{ $car->slug }}" class="text-dark car-link" style="text-decoration: none;" title="View Car">
            
                    <div class="car-col-1">

                    <img src="/images/uploads/{{ $car->carphoto }}"
                    id="allcars-img" style="object-fit: cover;"/>
                    </div>


                    <div class="car-col-2">

                        <div class="d-flex" style="gap: 10px;">
                            <h5 class="brand"><strong>{{ $car->brand}} {{ $car->model}} {{ $car->year}}</strong></h5> 
                            <p class="transmission">{{ $car->transmission}}</p>
                        </div>

                            <p class="location">{{ $car->carlocation}}</p>

                        <div class="d-flex align-items-center prices" style="gap: 10px;">
                            <span><h6><sup>₱</sup> {{ number_format($car->weeklyrate) }} / Weekly</h6></span>
                            <span><h5>|</h5></span>
                            <span><h6><sup>₱</sup> {{ number_format($car->monthlyrate) }} / Monthly</h6></span>
                        </div>

                            <h5 class="pt-1 dailyrate"><sup>₱</sup> {{ number_format($car->dailyrate) }} | Daily</h5>
                </a>
                        
                        <div class="carbuttons">
                            <a href="/mainviewcar/{{ $car->slug }}" class="btn-addcart">
                                <span><i class="far fa-car"></i></span>
                                <span>VIEW CAR</span>
                            </a>
                            

                            <a href="/bookingforms/{{ $car->slug }}" class="btn-checkout text-decoration-none">
                                <span><i class="fas fa-caret-right"></i></span>
                                <span>BOOK NOW</span>
                            </a>
                        
                        </div>

                    </div>

            </div>
            @endif
        
        @endforeach

    @else
    <p>No results found for "{{ $searchTerm }}".</p>
    @endif
</section>