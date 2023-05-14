<section class="viewcar-section">

    <!-- CAR SECTION 1 -->
    <section class="d-flex" id="viewcar_section1">
    <div class="view-car-row d-flex">
    <div class="car-photo">

        <img src="/images/uploads/{{ $viewcar->carphoto }}"
        id="viewphoto-img" style="object-fit: cover;"/>
    </div>
            
    </div>

    <div class="car-info-row">

                    <div class="car-info-title">
                        <h3>{{ $viewcar->brand}} {{ $viewcar->model}} {{ $viewcar->year}}</h3>
                        <hr class="bg-dark">
                    </div>
                    

                    <div class="allratings d-flex align-items-center">
                    <span>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>

                    <span>{{ $ratings->count() }} Ratings</span>
                    
                    </div>

                    <div class="car-info-col d-flex">
                        <div class="car-price d-flex">
                            <h4><sup>₱ </sup>{{ number_format($viewcar->dailyrate) }} | Daily</h4>
                            <h4><sup>₱ </sup>{{ number_format($viewcar->weeklyrate) }} | Weekly</h4>
                            <h4><sup>₱ </sup>{{ number_format($viewcar->monthlyrate) }} | Monthly</h4>
                        </div>

                        
                        
                    </div>

                    <div class="viewcarbuttons">
                        <!-- <button type="button" class="btn-addcart">
                            <span><i class="far fa-cart-plus"></i></span>
                            <span>ADD TO CART</span>
                        </button> -->

                        <a href="/bookingforms/{{ $viewcar->slug }}" type="button" class="btn-checkout text-decoration-none">
                            <span><i class="fas fa-caret-right"></i></span>
                            <span>BOOK NOW</span>
                        </a>
                    </div>
                    

            </div>

    </section>

        <!-- CAR SECTION 2 -->
        <section id="viewcar_section2" class="pt-4">
                <h5><strong>Characteristics</strong></h5> 
                <hr class="bg-dark">

                <div class="viewcar_info d-flex">
                <div>      
                    <h6>Brand: {{ $viewcar->brand}}</h6>
                    <h6>Model: {{ $viewcar->model}}</h6>
                    <h6>Year-Model: {{ $viewcar->year}}</h6>
                    <h6>Type: {{ $viewcar->vehicle}}</h6>
                    <h6>Seats: {{ $viewcar->seats}}</h6>
                    
                </div>

                <div>
                    <h6>Fuel: {{ $viewcar->fuel}}</h6>
                    <h6>Displacement: {{ $viewcar->displacement}} cc</h6>
                    <h6>Mileage: {{ $viewcar->mileage}} km</h6>
                    <h6>Car Location: {{ $viewcar->carlocation}}</h6>
                    <h6>Transmission: {{ $viewcar->transmission}}</h6>
                </div>
                </div>

        </section>


        <!-- CAR SECTION 3 -->
        <section id="viewcar_section3" class="pt-4">
                <h5><strong>Requirements</strong></h5> 
                <hr class="bg-dark">
                <h6>1. Driver's license</h6>
                <h6>2. Pay before drive</h6>
                <br>
                <h6 class="text-primary">IMPORTANT: For clients outside Philippines, please provide us a VALID email address for us to communicate with you. Upon submission, a link of our WhatsApp, Viber, Telegram, 
                    and Facebook Messenger account will be sent to the email you provide.</h6>
        </section>


        <!-- CAR SECTION 4 -->
        <section id="viewcar_section4" class="pt-4">
                <h5><strong>Car Owner</strong></h5> 
                <hr class="bg-dark">

                <div class ="d-flex align-items-center">
                <img src="/user.jpg" alt="" class="rounded-circle">
                <div class="ms-3">
                    <p class="fw-bold mb-1">{{ $viewcar->fname}} {{ $viewcar->lname}}</p>
                    <p class="text-muted mb-0">{{ $viewcar->email}}</p>

                </div>
                </div>
        </section>


        <!-- CAR SECTION 5 -->
        <section id="viewcar_section5" class="pt-4">
                <h5><strong>Car Ratings</strong></h5> 
                <hr class="bg-dark">

                <div class="d-flex overall-ratings align-items-center bg-dark rounded-pill">
                <span>
                    <i class="fas fa-star "></i>
                    <i class="fas fa-star "></i>
                    <i class="fas fa-star "></i>
                    <i class="fas fa-star "></i>
                    <i class="fas fa-star "></i>

<!-- 
                    @php
                        $averageRating = $viewcar->ratings()->avg('rating');
                        $wholeStars = floor($averageRating);
                        $halfStar = false;
                        if ($averageRating - $wholeStars >= 0.5) {
                            $halfStar = true;
                        }
                    @endphp

                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $wholeStars)
                            <i class="fas fa-star text-warning"></i>
                        @elseif ($halfStar && $i == $wholeStars + 1)
                            <i class="fas fa-star-half-alt text-warning"></i>
                        @else
                            <i class="far fa-star text-secondary"></i>
                        @endif
                    @endfor -->
                    </span>

                    <span class="number text-white">{{ number_format($averageRating, 1) }} / 5.0</span>


                
                    <!-- 
                <span class="number text-white">4.9 / 5.0</span> -->
                <!-- <span class="number text-white">{{ round($viewcar->ratings()->avg('rating'), 1) }} / 5.0</span> -->
                </div>
                @if ($ratings)
                @foreach ($ratings as $rating)

                <div class="d-flex pt-4">
                @if($rating->user->profile_picture)
                @if(file_exists(public_path('images/profile_picture/'.$rating->user->profile_picture)))
                        <img src="{{ asset('/images/profile_picture/' . $rating->user->profile_picture) }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                    @else
                        <img src="{{ $rating->user->profile_picture }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                    @endif
                @else
                    <img src="{{ asset('/images/default-user.png') }}" alt="Default User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                @endif


                    <div class="ms-3">
                        <p class="fw-bold mb-2">{{ $rating->booking->name }}</p>


                        <div class="rating-star pb-3 align-items-center">
                            <span>
                                @for ($i = 1; $i <= $rating->rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                @for ($i = $rating->rating + 1; $i <= 5; $i++)
                                    <i class="far fa-star"></i>
                                @endfor
                            </span>

                            <span>{{ $rating->rating }}.0</span>
                            
                        </div>

                        <p class="text-muted">{{ $rating->rating_msg }}</p>
                        <p class="date">Date: {{ $rating->created_at}}</p>

                    </div>
                    
                </div>

                @endforeach
                @endif



        </section>

</section>