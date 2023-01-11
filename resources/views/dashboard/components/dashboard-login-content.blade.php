<section class="dashboard-login">


<div class="dashboard-login-div ">
<div class="text-center pb-2"><img src="/images/LOGO.png" class="dashboard-logo" alt="Company Logo"></div>
<div class="dashboard-login-title">You Drive Admin</div>


<form action="{{url('/adminchecklogin')}}" class="login" method="post">
@if (Session::has('adminloginfail'))
<p class="alert alert-danger loginfail-alert">{{ Session::get('adminloginfail') }}</p>
@endif

<!-- @if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
  <li>@error('email') {{$message}} @enderror</li>
  <li>@error('password') {{$message}} @enderror</li>
</div>
@endif -->

@if (count($errors) > 0)
    <div class="alert alert-danger">
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
    </div>
   @endif

@csrf
<div class="fields">

  <div class="admin-email" >
    <i class="far fa-user"></i>
    <input type="text" name="email"  placeholder="Email" value ="{{ old('email') }}" autocomplete="off">
  </div>

  <div class="admin-password">
    <i class="far fa-lock-alt"></i>
    <input type="password" name="password" placeholder="Password" id="dbPassword" onkeyup="return showhideIcon()">
    <i class="far fa-eye" id="dbTogglePassword" style="cursor: pointer;"></i>
  </div>


  

    
</div>

<!-- <div class="rowa mb-4">
  <div class="d-flex">
    
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
      <label class="form-check-label" for="loginCheck"> Remember me</label>
    </div>
  </div>

  <div class="d-flex">
    <a href="#!">Forgot password?</a>
  </div>

</div> -->

<div class="d-grid ">
  <button class="dashboard-login-button" type="submit">Log In</button>
</div>
</form>







</div>
</section>

