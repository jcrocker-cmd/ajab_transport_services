<section class="all-cars-section">
    <p class="pb-4">All Cars</p>

    <div class="all-cars-row">


     <!-- CAR PRODUCT -->
     @foreach($addcar as $item)
        <a href="/dashboard" class="text-decoration-none car-link">
            <div class="car-wrapper">
                <div class="car-col-1">

                </div>

                <div class="car-col-2">
                    <h5>{{ $item->brand}} {{ $item->model}} {{ $item->year}}</h5>
                    <p>{{ $item->carlocation}}</p>
                    <h6><sup>₱</sup> {{ $item->weeklyrate}} | Weekly</h6>
                    <h6 class="pt-1"><sup>₱</sup> {{ $item->monthlyrate}} | Monthly</h6>
                    <h5 class="pt-1"><sup>₱</sup> {{ $item->dailyrate}} | Daily</h5>
                    
                    <div class="carbuttons">
                    <button type="button" class="btn-addcart">
                        <span><i class="far fa-cart-plus"></i></span>
                        <span>ADD TO CART</span>
                    </button>

                    <button type="button" class="btn-checkout">
                        <span>CHECKOUT</span>
                    </button>
                    </div>

                </div>

            
            </div>
        </a>
        @endforeach


    </div>
</section>