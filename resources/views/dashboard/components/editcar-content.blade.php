<section id="addcar-main">



<h5 class="px-4 pt-3 pb-2">Edit Existing Information</h5>



<!-- FORM ACTION START -->
<form enctype="multipart/form-data" action="/updatecar/{{ $editcar->slug }}" method="post" class="addform">
@csrf
@method('put')

<!-- FIRST FORM -->
<section class="form-1 bg-light py-2 first-form add-car-form active" id="addcar-section-forms">




<div class="px-4 py-2"><h5 class=" pt-2">Car Information</h5></div>


<!-- ROW 1 -->

<div data-step="1" class ="add-row d-flex px-4 pb-2">


<!-- COLUMN 1 -->

<div class="add-col ">



<div class="mb-2 vehicle">
<label for="exampleFormControlInput1" class="form-label">Type</label>
<select class="form-select " name="vehicle" aria-label="Default select example" id="vehicle-info">
  <option value="Van"  @if ($editcar->vehicle == 'Van') selected @endif>Van</option>
  <option value="Pick-Up" @if ($editcar->vehicle == 'Pick-Up') selected @endif>Pick-Up</option>
  <option value="7 Seaters" @if ($editcar->vehicle == '7 Seaters') selected @endif>7 Seaters</option>
  <option value="Sedan" @if ($editcar->vehicle == 'Sedan') selected @endif>Sedan</option>
  <option value="Hatchback" @if ($editcar->vehicle == 'Hatchback') selected @endif>Hatchback</option>
</select>
</div>


<div class="mb-2 brand">
  <label for="exampleFormControlInput1" class="form-label">Brand</label>
  <input type="text" name="brand" value="{{ $editcar->brand}}" class="form-control " id="vehicle-info" placeholder="Ex. Toyota" onkeyup="javascript:capitalize(this);">
  <!-- <span>Please input a Car Brand</span> -->
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Model</label>
  <input type="text" name="model" value="{{ $editcar->model}}" class="form-control " id="vehicle-info" placeholder="Ex. Vios" onkeyup="javascript:capitalize(this);">
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Year</label>
  <select class="form-select" name="year" aria-label="Default select example" id="vehicle-info">
    <option selected>Pick a Year</option>
    @php
      $currentYear = date("Y");
    @endphp
    @for ($year = 2006; $year <= $currentYear; $year++)
      <option value="{{ $year }}" @if ($editcar->year == $year) selected @endif>{{ $year }}</option>
    @endfor
  </select>
</div>



<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Plate No.</label>
  <input type="text" name="plate" value="{{ $editcar->plate}}" class="form-control " id="vehicle-info" placeholder="Ex. ABC 1234">
</div>

<div class="mb-2">
<label for="exampleFormControlInput1" class="form-label">Seats</label>
<select class="form-select " name="seats" aria-label="Default select example" id="vehicle-info">

<option value="2" @if ($editcar->seats == '2') selected @endif>2 Seats</option>
<option value="3" @if ($editcar->seats == '3') selected @endif>3 Seats</option>
<option value="4" @if ($editcar->seats == '4') selected @endif>4 Seats</option>
<option value="5" @if ($editcar->seats == '5') selected @endif>5 Seats</option>
<option value="6" @if ($editcar->seats == '6') selected @endif>6 Seats</option>
<option value="7" @if ($editcar->seats == '7') selected @endif>7 Seats</option>
<option value="8" @if ($editcar->seats == '8') selected @endif>8 Seats</option>
<option value="9" @if ($editcar->seats == '9') selected @endif>9 Seats</option>
<option value="10+" @if ($editcar->seats == '10+') selected @endif>10+ Seats</option>
</select>
</div>

</div>


<!-- COLUMN 2 -->

<div class="add-col">


<div class="mb-2">
<label for="exampleFormControlInput1" class="form-label">Fuel Type</label>
<select class="form-select " name="fuel" aria-label="Default select example" id="vehicle-info">
  <option value="Diesel" @if ($editcar->fuel == 'Diesel') selected @endif>Diesel</option>
  <option value="Petrol" @if ($editcar->fuel == 'Petrol') selected @endif>Petrol</option>
  <option value="Unleaded" @if ($editcar->fuel == 'Unleaded') selected @endif>Unleaded</option>
  <option value="Hybrid" @if ($editcar->fuel == 'Hybrid') selected @endif>Hybrid</option>
</select>
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Displacement</label>
  <input type="text" name="displacement" value="{{ $editcar->displacement}}" class="form-control " id="vehicle" placeholder="Enter Displacement (cc)" onkeyup="this.value=commaSep(this.value);"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Mileage</label>
  <input type="text" name="mileage" value="{{ $editcar->mileage}}" class="form-control " id="vehicle"  placeholder="Enter Mileage (km)" onkeyup="this.value=commaSep(this.value);" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Car Location</label>
  <input type="text" name="carlocation" value="{{ $editcar->carlocation}}" class="form-control " id="vehicle-info" placeholder="Enter Location" onkeyup="javascript:capitalize(this);">
</div>

<label for="exampleFormControlInput1" class="form-label">Transmission</label>
<div class="form-check">
  <input class="form-check-input" name="transmission" type="radio" name="transmission" id="exampleRadios1" value="Manual" {{ $editcar->transmission == "Manual" ? 'checked' : '' }}>
  <label class="form-check-label" for="exampleRadios1">
    Manual
  </label>
</div>
<div class="form-check mb-2">
  <input class="form-check-input" name="transmission" type="radio" name="transmission" id="exampleRadios2" value="Automatic" {{ $editcar->transmission == "Automatic" ? 'checked' : '' }}>
  <label class="form-check-label" for="exampleRadios2">
    Automatic
  </label>
</div>

<a href="#" class="btn btn-primary add-car-btn addcar-btn-next" id="addcar-btn-next">Next</a>
</div>

</section>


</div>


<!-- SECOND FORM -->
<section class="form-1 bg-light py-2 second-form add-car-form" id="addcar-section-forms">


<div class="px-4 py-2">

<h5 class="pt-2">Owner Information</h5>

<label for="name" class="form-label">Basic Info</label>


<div class="d-flex add-full-name">

<div class="input-group mb-2">
  <span class="input-group-text">First Name</span>
  <input type="text" aria-label="First name" value="{{ $editcar->fname}}" name="fname" class="form-control" onkeyup="javascript:capitalize(this);">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Middle Name</span>
  <input type="text" aria-label="First name" value="{{ $editcar->mname}}" name="mname" class="form-control" onkeyup="javascript:capitalize(this);">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Last Name</span>
  <input type="text" aria-label="First name" value="{{ $editcar->lname}}" name="lname" class="form-control" onkeyup="javascript:capitalize(this);">
</div>
</div>




<div class="d-flex add-full-name">

<div class="input-group mb-2">
  <span class="input-group-text">Email</span>
  <input type="email" aria-label="First name" value="{{ $editcar->email}}" name="email" class="form-control" onkeyup="javascript:capitalize(this);">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Phone No.</span>
  <input type="text" aria-label="First name" value="{{ $editcar->phone}}" name="phone" class="form-control" onkeyup="javascript:capitalize(this);">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Birth-Date</span>
  <input type="date" aria-label="First name" value="{{ $editcar->bday}}" name="bday" class="form-control">
</div>
</div>

<label for="address" class="form-label">Full Address</label>


<div class="d-flex add-full-address">

<div class="input-group mb-2">
  <span class="input-group-text">Purok/Street</span>
  <input type="text" aria-label="First name" value="{{ $editcar->purok}}" name="purok" class="form-control" onkeyup="javascript:capitalize(this);">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Baranggay</span>
  <input type="text" aria-label="First name" value="{{ $editcar->baranggay}}" name="baranggay" class="form-control" onkeyup="javascript:capitalize(this);">
</div>
</div>


<div class="d-flex add-full-address">

<div class="input-group mb-2">
  <span class="input-group-text">Town</span>
  <input type="text" aria-label="First name" value="{{ $editcar->town}}" name="town" class="form-control" onkeyup="javascript:capitalize(this);">
</div>


<div class="input-group mb-2">
  <span class="input-group-text">Province</span>
  <input type="text" aria-label="First name" value="{{ $editcar->city}}" name="province" class="form-control" onkeyup="javascript:capitalize(this);">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Postal Code</span>
  <input type="number" aria-label="First name" value="{{ $editcar->postal}}" name="postal" class="form-control">
</div>
</div>

<div class="addcar-button-group pt-2">
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-prev" role="button">Previous</a>
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-next" role="button">Next</a>
  </div>


</div>



</section>


<!-- THIRD FORM -->
<section class="form-1 bg-light py-2 third-form add-car-form" id="addcar-section-forms">


<div class="px-4 py-2">

<h5 class="pt-2">Pricing</h5>
<!-- 
<label for="name" class="form-label">Name</label> -->


<div class="mb-2 price">
  <label for="exampleFormControlInput1" class="form-label">Daily Rate</label>
  <input type="text" name="dailyrate" value="{{ $editcar->dailyrate}}" class="form-control" onkeyup="this.value=commaSep(this.value);" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
</div>

<div class="mb-2 price">
  <label for="exampleFormControlInput1" class="form-label">Weekly Rate</label>
  <input type="text" name="weeklyrate" value="{{ $editcar->weeklyrate}}" class="form-control " onkeyup="this.value=commaSep(this.value);" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
</div>

<div class="mb-2 price">
  <label for="exampleFormControlInput1" class="form-label">Monthly Rate</label>
  <input type="text" name="monthlyrate" value="{{ $editcar->monthlyrate}}" class="form-control " onkeyup="this.value=commaSep(this.value);" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
</div>



<div class="addcar-button-group pt-2">
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-prev" role="button">Previous</a>
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-next" role="button">Next</a>


  </div>

</div>

</section>

<!-- FOURTH FORM -->
<section class="form-1 bg-light py-2 fourth-form add-car-form" id="addcar-section-forms">


<div class="px-4 py-2">

<h5 class="pt-2 pb-3">You're almost there!</h5>

<label for="address" class="form-label">Select Car Photo</label>

<div class="addphoto">
  <img src="/images/uploads/{{ $editcar->carphoto }}"
  height="230" width="350" class="" id="change-img-add" style="object-fit: cover;">
  </div>

  <div class="img-button mt-3">
  <input type="file" name="carphoto" id="addphotoBtn" accept="image/jpg, image/jpeg, image/png" hidden>
  <button onclick ="addPhoto()" type="button" class="btn btn-primary addphoto-btn" id="addphotoBtn">Choose Image</button>
  </div>

<div class="addcar-button-group">
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-prev" role="button">Previous</a>
  <!-- <a href="#" class="btn btn-primary add-car-btn addcar-btn-next" role="button">Next</a> -->
  <button class="btn btn-primary" type="submit">Submit</button>
  </div>

</div>

</section>



</form>
</section>