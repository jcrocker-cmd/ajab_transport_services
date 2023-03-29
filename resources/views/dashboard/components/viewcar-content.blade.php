
@if (session('message'))
  <h6 class="alert alert-warning my-0" id="myAlert" style="font-size: 14px;">{{ session('message') }}</h6>
@endif
<section class="px-4 py-3 d-flex" id="viewcar_section1">

    <div class="view-car-row d-flex">
        <div class="car-photo">

            <img src="/images/uploads/{{ $addcar->carphoto }}"
             class="" id="addphoto-img" style="object-fit: cover;"/>
        </div>
            
    </div>

    <div class="car-info-row">

                    <div class="car-info-heading">
                        <h5>Car Information</h5>
                        <hr class="bg-white">
                    </div>

                    <div class="car-info-col d-flex">
                        <div>
                            <h5>Brand:<strong> {{ $addcar->brand}} </strong></h5>
                            <h5 class="pb-3">Model:<strong> {{ $addcar->model}}</strong></h5>
                            <h6>Year-Model: {{ $addcar->year}}</h6>
                            <h6>Type: {{ $addcar->vehicle}}</h6>
                            <h6>Seats: {{ $addcar->seats}}</h6>
                        </div>

                        <div>
                            <h6>Plate No: {{ $addcar->plate}}</h6>
                            <h6>Fuel: {{ $addcar->fuel}}</h6>
                            <h6>Displacement: {{ $addcar->displacement}} cc</h6>
                            <h6>Mileage: {{ $addcar->mileage}} km</h6>
                            <h6>Car Location: {{ $addcar->carlocation}}</h6>
                            <h6>Transmission: {{ $addcar->transmission}}</h6>
                        </div>
                        
                    </div>
                    

            </div>

</section>

<section class="px-4 py-3 d-flex" id="viewcar_section2">


<div class="owner-section pt-2">

    <div class="owner-info-heading">
        <h5>Owner Information</h5>
        <hr class="bg-dark">
    </div>

    <h6 class="pb-2" >Full-Name: {{ $addcar->fname}} {{ $addcar->mname}} {{ $addcar->lname}}</h6>
    <h6 class="pb-2" >Address: {{ $addcar->purok}}, {{ $addcar->baranggay}}, {{ $addcar->town}}, {{ $addcar->city}} {{ $addcar->postal}}</h6>
    <h6 class="pb-2" >Birth-Date: {{ $addcar->bday}}</h6>
    <h6 class="pb-2" >Email: {{ $addcar->email}}</h6>
    <h6>Phone No: {{ $addcar->phone}}</h6>



</div>

<div class="pricing-section pt-2">

    <div class="pricing-info-heading">
        <h5>Pricing</h5>
        <hr class="bg-dark">
    </div>

    <h6 class="pb-1">Daily Rate: <sup>₱</sup> {{ $addcar->dailyrate}}</h6>
    <h6 class="pb-1">Weekly Rate: <sup>₱</sup> {{ $addcar->weeklyrate}}</h6>
    <h6>Monthly Rate: <sup>₱</sup> {{ $addcar->monthlyrate}}</h6>

    <hr class="bg-dark">

    <div class="timestamps gap-3 pt-2">
        <h6 class="text-muted font-italic timestamp">Created at:  {{ $addcar->created_at->format('m/d/Y')}},   {{ $addcar->created_at->toTimeString()}}</h6>
        <h6 class="text-muted font-italic timestamp">Updated at:  {{ $addcar->updated_at->format('m/d/Y')}},   {{ $addcar->updated_at->toTimeString()}}</h6>
    </div>

    <div class="view-car-buttons">
    @can('can:edit-record')
        <a href="/editcar/{{ $addcar->slug }}" class="btn-edit">
            <span><i class="far fa-pencil"></i></span>
            <span>EDIT</span>
        </a>
    @endcan

    
    @can('can:delete-record')
        <a href="/delete_car/{{ $addcar->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"   class="btn-delete">
            <span><i class="far fa-trash"></i></span>
            <span>DELETE</span>
        </a>
    @endcan

    </div>



</div>


</section>