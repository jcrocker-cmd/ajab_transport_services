<div><h2 class="fs-3 pb-2 px-4 py-4">Register a new car!</h2></div>
<hr class="hr-2">
<div class="px-4 py-2"><h2 class="fs-3 pb-2">Vehicle Information </h2></div>


<!-- FORM ACTION START -->
<form action="addcar" method="post">
@csrf

<!-- ROW 1 -->

<div class ="add-row d-flex px-4 py-2">


<!-- COLUMN 1 -->

<div class="add-col ">



<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Type</label>
<select class="form-select rounded-pill" name="vehicle"aria-label="Default select example">
  <option selected>Select Vehicle Type</option>
  <option value="1">Toyota</option>
  <option value="2">Audi</option>
  <option value="3">Suzuki</option>
</select>
</div>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Brand</label>
  <input type="text" name="brand" class="form-control rounded-pill" id="exampleFormControlInput1" placeholder="Toyota">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Model</label>
  <input type="text" name="model" class="form-control rounded-pill" id="exampleFormControlInput1" placeholder="X-Series Model">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Year</label>
<select class="form-select rounded-pill" name="year" aria-label="Default select example">
  <option selected>Pick a Year</option>
  <option value="1">2003</option>
  <option value="2">2002</option>
  <option value="3">2001</option>
</select>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Plate No.</label>
  <input type="text" name="plate" class="form-control rounded-pill" id="exampleFormControlInput1" placeholder="GD-80388">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Seats</label>
<select class="form-select rounded-pill" name="seats" aria-label="Default select example">
  <option selected>2 Seats</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>

</div>


<!-- COLUMN 2 -->

<div class="add-col">


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Fuel Type</label>
<select class="form-select rounded-pill" name="fuel" aria-label="Default select example">
  <option selected>Fuel Type</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Displacement</label>
  <input type="text" name="displacement" class="form-control rounded-pill" id="exampleFormControlInput1" placeholder="Enter Displacement (cc)">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Mileage</label>
  <input type="text" name="mileage" class="form-control rounded-pill" id="exampleFormControlInput1" placeholder="Enter Mileage (km)">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Car Location</label>
  <input type="text" name="carlocation" class="form-control rounded-pill" id="exampleFormControlInput1" placeholder="Enter Location">
</div>

<label for="exampleFormControlInput1" class="form-label">Transmission</label>
<div class="form-check">
  <input class="form-check-input" name="transmission" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Manual
  </label>
</div>
<div class="form-check mb-3">
  <input class="form-check-input" name="transmission" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
    Automatic
  </label>
</div>

<!-- <a href="#" class="btn btn-primary stretched-link mt-3">Next Form</a> -->
<button type="submit" class="btn btn-primary">Submit</button>
</div>




</div>

<!-- <hr class="hr-2">

<div class="px-4 py-2"><h2 class="fs-3 pb-2">Personal Information</h2></div>

<div class="px-4 py-2">

<div class="input-group mb-3">
  <span class="input-group-text">First Name</span>
  <input type="text" aria-label="First name" class="form-control">
  <span class="input-group-text">Middle Name</span>
  <input type="text" aria-label="Middle name" class="form-control">
  <span class="input-group-text">Last Name</span>
  <input type="text" aria-label="Last name" class="form-control">
</div>

<label for="address" class="form-label">Address</label>

<div class=" input-group mb-3">

  <span class="input-group-text">Purok</span>
  <input type="text" aria-label="First name" class="form-control purok">
  <span class="input-group-text">Baranggay</span>
  <input type="text" aria-label="Middle name" class="form-control">
  <span class="input-group-text">Town</span>
  <input type="text" aria-label="Last name" class="form-control">
  <span class="input-group-text">Province</span>
  <input type="text" aria-label="Last name" class="form-control">
 
 
</div>


</div> -->










</form>