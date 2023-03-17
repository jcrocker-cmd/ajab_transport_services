<section class="all-cars-section">

    <p class="pb-4">All Cars</p>

    <div class="all-cars-row">


     <!-- CAR PRODUCT -->
        @foreach($addcar as $item)
            @if ($item->is_active == true)
            <div class="car-wrapper">
                <a href="/mainviewcar/{{ $item->id }}" class="text-dark car-link" style="text-decoration: none;" title="View Car">
            
                    <div class="car-col-1">

                    <img src="/images/uploads/{{ $item->carphoto }}"
                    id="allcars-img" style="object-fit: cover;"/>
                    </div>


                    <div class="car-col-2">

                        <div class="d-flex" style="gap: 10px;">
                            <h5 class="brand"><strong>{{ $item->brand}} {{ $item->model}} {{ $item->year}}</strong></h5> 
                            <p class="transmission">{{ $item->transmission}}</p>
                        </div>

                            <p>{{ $item->carlocation}}</p>

                        <div class="d-flex align-items-center" style="gap: 10px;">
                            <span><h6><sup>₱</sup> {{ $item->weeklyrate}} / Weekly</h6></span>
                            <span><h5>|</h5></span>
                            <span><h6><sup>₱</sup> {{ $item->monthlyrate}} / Monthly</h6></span>
                        </div>

                            <h5 class="pt-1 dailyrate"><sup>₱</sup> {{ $item->dailyrate}} | Daily</h5>
                </a>
                        
                        <div class="carbuttons">
                            <a href="#" class="btn-addcart">
                                <span><i class="far fa-cart-plus"></i></span>
                                <span>ADD TO CART</span>
                            </a>
                            

                            <a href="/bookingforms/{{ $item->id }}" class="btn-checkout text-decoration-none">
                                <span><i class="fas fa-caret-right"></i></span>
                                <span>CHECKOUT</span>
                            </a>
                        
                        </div>

                    </div>

            </div>
            @endif
        
        @endforeach


    </div>
</section>