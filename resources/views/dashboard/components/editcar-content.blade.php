<section id="addcar-main">


<h5 class="px-4 pt-3 pb-2">Edit Existing Information</h5>



<!-- FORM ACTION START -->
<form data-multi-step action="/updatecar/{{ $editcar->id }}" method="post" class="addform">
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
  <option value="{{ $editcar->vehicle}}" selected>{{ $editcar->vehicle}}</option>
  <option value="Van">Van</option>
  <option value="Pick-Up">Pick-Up</option>
  <option value="7 Seaters">7 Seaters</option>
  <option value="Sedan">Sedan</option>
  <option value="Hatchback">Hatchback</option>
</select>
</div>


<div class="mb-2 brand">
  <label for="exampleFormControlInput1" class="form-label">Brand</label>
  <input type="text" name="brand" value="{{ $editcar->brand}}" class="form-control " id="vehicle-info" placeholder="Ex. Toyota">
  <!-- <span>Please input a Car Brand</span> -->
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Model</label>
  <input type="text" name="model" value="{{ $editcar->model}}" class="form-control " id="vehicle-info" placeholder="Ex. Vios">
</div>

<div class="mb-2">
<label for="exampleFormControlInput1" class="form-label">Year</label>
<select class="form-select"  name="year" aria-label="Default select example" id="vehicle-info">
    <option value="{{ $editcar->year}}" selected>{{ $editcar->year}}</option>
    <option value="2000">2000</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
</select>
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Plate No.</label>
  <input type="text" name="plate" value="{{ $editcar->plate}}" class="form-control " id="vehicle-info" placeholder="Ex. ABC 1234">
</div>

<div class="mb-2">
<label for="exampleFormControlInput1" class="form-label">Seats</label>
<select class="form-select " name="seats" aria-label="Default select example" id="vehicle-info">

<option value="{{ $editcar->seats}}" selected>{{ $editcar->seats}}</option>
<option value="2">2 Seats</option>
<option value="3">3 Seats</option>
<option value="4">4 Seats</option>
<option value="5">5 Seats</option>
<option value="6">6 Seats</option>
<option value="7">7 Seats</option>
<option value="8">8 Seats</option>
<option value="9">9 Seats</option>
<option value="10+">10+ Seats</option>
</select>
</div>

</div>


<!-- COLUMN 2 -->

<div class="add-col">


<div class="mb-2">
<label for="exampleFormControlInput1" class="form-label">Fuel Type</label>
<select class="form-select " name="fuel" aria-label="Default select example" id="vehicle-info">
  <option value="{{ $editcar->fuel}}">{{ $editcar->fuel}}</option>
  <option value="Diesel">Diesel</option>
  <option value="Petrol">Petrol</option>
  <option value="Unleaded">Unleaded</option>
  <option value="Hybrid">Hybrid</option>
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
  <input type="text" name="carlocation" value="{{ $editcar->carlocation}}" class="form-control " id="vehicle-info" placeholder="Enter Location">
</div>

<label for="exampleFormControlInput1" class="form-label">Transmission</label>
<div class="form-check">
  <input class="form-check-input" name="transmission" type="radio" name="exampleRadios" id="exampleRadios1" value="Manual" checked>
  <label class="form-check-label" for="exampleRadios1">
    Manual
  </label>
</div>
<div class="form-check mb-2">
  <input class="form-check-input" name="transmission" type="radio" name="exampleRadios" id="exampleRadios2" value="Automatic">
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
  <input type="text" aria-label="First name" value="{{ $editcar->fname}}" name="fname" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Middle Name</span>
  <input type="text" aria-label="First name" value="{{ $editcar->mname}}" name="mname" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Last Name</span>
  <input type="text" aria-label="First name" value="{{ $editcar->lname}}" name="lname" class="form-control">
</div>
</div>




<div class="d-flex add-full-name">

<div class="input-group mb-2">
  <span class="input-group-text">Email</span>
  <input type="email" aria-label="First name" value="{{ $editcar->email}}" name="email" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Phone No.</span>
  <input type="text" aria-label="First name" value="{{ $editcar->phone}}" name="phone" class="form-control">
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
  <input type="text" aria-label="First name" value="{{ $editcar->purok}}" name="purok" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Baranggay</span>
  <input type="text" aria-label="First name" value="{{ $editcar->baranggay}}" name="baranggay" class="form-control">
</div>
</div>


<div class="d-flex add-full-address">

<div class="input-group mb-2">
  <span class="input-group-text">Town</span>
  <input type="text" aria-label="First name" value="{{ $editcar->town}}" name="town" class="form-control">
</div>


<div class="input-group mb-2">
  <span class="input-group-text">City</span>
  <input type="text" aria-label="First name" value="{{ $editcar->city}}" name="city" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Postal Code</span>
  <input type="text" aria-label="First name" value="{{ $editcar->postal}}" name="postal" class="form-control">
</div>
</div>

<div class="addcar-button-group pt-2">
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-prev" role="button">Previous</a>
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-next" role="button">Next</a>
  </div>


</div>



</section>


<!-- THIRD FORM -->
<section class="form-1 bg-light py-2 second-form add-car-form" id="addcar-section-forms">


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
  <button class="btn btn-success" type="submit">Update</button>

  </div>

</div>

</section>




</form>
</section>