<section class="dashboard-login">


<div class="dashboard-login-div bg-white">
<h2 class="text-center px-4 pb-4 pt-4">YOU DRIVE ADMIN</h2>


<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3 px-4" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="true">Login</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
      aria-controls="pills-register" aria-selected="false">Register</a>
  </li>
</ul>


<form action="addcar" method="post">
@csrf
<div class="mb-3 px-4 pt-3" >
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" required>
</div>
<div class="px-4 pb-4">
  <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
</div>
<div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
         
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
        
          <a href="#!">Forgot password?</a>
        </div>
      </div>
<div class="d-grid px-4 pb-4 ">
  <button class="btn btn-primary dashboard-login-button" type="submit">Login</button>
</div>
    <div class="text-center pb-2">
        <p>Register another admin? <a href="#!">Register</a></p>
      </div>
</form>
</div>
</section>