<!-- <div><h5 class=" pb-2 px-4 py-4">Register a new car!</h5></div>
<hr class="hr-2"> -->

<!-- PROGRESS-BAR -->
<div class="progress-bar-container" >
<div class="progressbar">

    <div class="progress" id="progress"></div>

  <div class="progress-step active" data-title="Car Information"></div>
  <div class="progress-step" data-title="Owner Information"></div>
  <div class="progress-step" data-title="Pricing"></div>
  <div class="progress-step" data-title="Submit"></div>
</div>
</div>





<!-- FORM ACTION START -->
<form data-multi-step action="addcar" method="post" class="addform">
@csrf


<!-- FIRST FORM -->
<section class="form-1 bg-light py-2 first-form add-car-form active" id="addcar-section-forms">


<div class="px-4 py-2"><h5 class=" pt-2">Car Information</h5></div>


<!-- ROW 1 -->

<div data-step="1" class ="add-row d-flex px-4">


<!-- COLUMN 1 -->

<div class="add-col ">



<div class="mb-2 vehicle">
<label for="exampleFormControlInput1" class="form-label">Type</label>
<select class="form-select " name="vehicle" aria-label="Default select example" id="vehicle-info">
  <option selected>Select Vehicle Type</option>
  <option value="Van">Van</option>
  <option value="Pick-Up">Pick-Up</option>
  <option value="7 Seaters">7 Seaters</option>
  <option value="Sedan">Sedan</option>
  <option value="Hatchback">Hatchback</option>
</select>
</div>


<div class="mb-2 brand">
  <label for="exampleFormControlInput1" class="form-label">Brand</label>
  <input type="text" name="brand" class="form-control " id="vehicle-info" placeholder="Toyota">
  <span>Please input a Car Brand</span>
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Model</label>
  <input type="text" name="model" class="form-control " id="vehicle-info" placeholder="Ex. Vios" inputmode="numeric">
</div>

<div class="mb-2">
<label for="exampleFormControlInput1" class="form-label">Year</label>
<select class="form-select " name="year" aria-label="Default select example" id="vehicle-info">
  <option selected>Pick a Year</option>
  <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
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
  <input type="text" name="plate" class="form-control " id="vehicle-info" placeholder="GD-80388">
</div>

<div class="mb-2">
<label for="exampleFormControlInput1" class="form-label">Seats</label>
<select class="form-select " name="seats" aria-label="Default select example" id="vehicle-info">
<option value="2" selected>2 Seats</option>
<option value="3">3 Seats</option>
<option value="4">4 Seats</option>
<option value="5">5 Seats</option>
<option value="6">6 Seats</option>
<option value="7">7 Seats</option>
<option value="8">8 Seats</option>
<option value="9">9 Seats</option>
<option value="10">10+ Seats</option>\
</select>
</div>

</div>


<!-- COLUMN 2 -->

<div class="add-col">


<div class="mb-2">
<label for="exampleFormControlInput1" class="form-label">Fuel Type</label>
<select class="form-select " name="fuel" aria-label="Default select example" id="vehicle-info">
  <option value="Diesel">Diesel</option>
  <option value="Petrol">Petrol</option>
  <option value="Unleaded">Unleaded</option>
  <option value="Hybrid">Hybrid</option>
</select>
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Displacement</label>
  <input type="number" name="displacement" class="form-control " id="vehicle" onkeyup="this.value=commaPrice(this.value);" placeholder="Enter Displacement (cc)">
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Mileage</label>
  <input type="number" name="mileage" class="form-control " id="vehicle"  placeholder="Enter Mileage (km)" >
</div>

<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Car Location</label>
  <input type="text" name="carlocation" class="form-control " id="vehicle-info" placeholder="Enter Location">
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

<!-- <a href="#" class="btn btn-primary stretched-link mt-3">Next Form</a> -->
<button class="btn btn-primary add-car-btn addcar-btn-next" id="addcar-btn-next" type="button">Next</button>
<!-- <a href="#" class="btn btn-primary add-car-btn addcar-btn-next" id="addcar-btn-next">Next</a> -->
</div>

</section>


</div>


<!-- SECOND FORM -->
<section class="form-1 bg-light py-2 second-form add-car-form" id="addcar-section-forms">


<div class="px-4 py-2">

<h5 class="pt-2">Owner Information</h5>

<label for="name" class="form-label">Full Name</label>


<div class="d-flex add-full-name">

<div class="input-group mb-2">
  <span class="input-group-text">First Name</span>
  <input type="text" aria-label="First name" name="fname" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Middle Name</span>
  <input type="text" aria-label="First name" name="mname" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Last Name</span>
  <input type="text" aria-label="First name" name="lname" class="form-control">
</div>
</div>


<label for="address" class="form-label">Full Address</label>


<div class="d-flex add-full-address">

<div class="input-group mb-2">
  <span class="input-group-text">Purok/Street</span>
  <input type="text" aria-label="First name" name="purok" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Baranggay</span>
  <input type="text" aria-label="First name" name="baranggay" class="form-control">
</div>
</div>


<div class="d-flex add-full-address">

<div class="input-group mb-2">
  <span class="input-group-text">Town</span>
  <input type="text" aria-label="First name" name="town" class="form-control">
</div>


<div class="input-group mb-2">
  <span class="input-group-text">City</span>
  <input type="text" aria-label="First name" name="city" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Postal Code</span>
  <input type="text" aria-label="First name" name="postal" class="form-control">
</div>
</div>

<div class="addcar-button-group">
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
  <input type="number" name="dailyrate" class="form-control" onkeyup="multiPrice(value)">
</div>

<div class="mb-2 price">
  <label for="exampleFormControlInput1" class="form-label">Weekly Rate</label>
  <input type="number" name="weeklyrate" class="form-control " id="price7x">
</div>

<div class="mb-2 price">
  <label for="exampleFormControlInput1" class="form-label">Monthly Rate</label>
  <input type="number" name="monthlyrate" class="form-control " id="price30x">
</div>



<div class="addcar-button-group">
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-prev" role="button">Previous</a>
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-next" role="button">Next</a>
  </div>

</div>

</section>


<!-- FOURTH FORM -->
<section class="form-1 bg-light py-2 second-form add-car-form" id="addcar-section-forms">


<div class="px-4 py-2">

<h5 class="pt-2">You're almost there!</h5>

<label for="name" class="form-label">Name</label>


<div data-step="2" class="d-flex add-full-name">

<div class="input-group mb-2">
  <span class="input-group-text">First Name</span>
  <input type="text" aria-label="First name" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Middle Name</span>
  <input type="text" aria-label="First name" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Last Name</span>
  <input type="text" aria-label="First name" class="form-control">
</div>
</div>


<label for="address" class="form-label">Address</label>

<div class=" input-group mb-2">

  <span class="input-group-text">Purok</span>
  <input type="text" aria-label="First name" class="form-control purok">
  <span class="input-group-text">Baranggay</span>
  <input type="text" aria-label="Middle name" class="form-control">
  <span class="input-group-text">Town</span>
  <input type="text" aria-label="Last name" class="form-control">
  <span class="input-group-text">Province</span>
  <input type="text" aria-label="Last name" class="form-control">
 
 
</div>

<div class="addcar-button-group">
  <a href="#" class="btn btn-primary add-car-btn addcar-btn-prev" role="button">Previous</a>
  <!-- <a href="#" class="btn btn-primary add-car-btn addcar-btn-next" role="button">Next</a> -->
  <button class="btn btn-primary" type="submit">Submit</button>

  </div>

</div>

</section>



</form>