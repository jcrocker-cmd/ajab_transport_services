


<section id="signin">
@if (Session::has('failregister'))
<h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ Session::get('failregister') }}</h6>
@endif
<div class="signin-row">
    <div class="signin-col-1">
        <h5 style="display: none;"><strong>Sign-up Today</strong></h5>
    </div>
    <div class="signin-col-2">
       <div class="signin-wrapper">

       <div class="signinlogo">
        <img src="images/LOGO.png" alt="Logo" id="signin-logo" class="justify-content-center">
        </div>

        <h6 class="text-center py-3">Sign-up Today!</h6>
        <form action="signin" method="post">
				@csrf
        <div class="signin-fname">
            <input type="text" id="upper" name="fname"  placeholder="First Name" oninput="this.value = this.value.toUpperCase()" value = "{{old('fname')}}">
            <span class="error-msg">@error('fname') {{$message}} @enderror</span>
        </div>
        <div class="signin-lname">
            <input type="text" id="lower" name="lname"  placeholder="Last Name" oninput="this.value = this.value.toUpperCase()" value = "{{old('lname')}}">
            <span class="error-msg">@error('lname') {{$message}} @enderror</span>
        </div>
        <div class="signin-email">
            <input type="email" name="email"  placeholder="Email or Username" value = "{{old('email')}}">
            <span class="error-msg">@error('email') {{$message}} @enderror</span>

        </div>
        <div class="signin-password">
            <input type="password" name="password"  placeholder="New Password">
            <span class="error-msg">@error('password') {{$message}} @enderror</span>

        </div>
        
        <div class="signin-bday">
            <input placeholder="Date of Birth" value = "{{old('bday')}}" name="bday" type="text" class="bday" onfocus="(this.type='date')" onblur="(this.type='text')">
            <span class="error-msg">@error('bday') {{$message}} @enderror</span>

        </div>

        <div class="gender">
 
            <!-- <input type="radio" name="gender"  value="male" id="maleradio" class="radio"> 
            <label for="maleradio">Male</label>

            <input type="radio" name="gender"  value="female"  id="femaleradio">
            <label for="femaleradio">Female</label> -->

        </div>
        <p class="terms">By clicking Sign Up, you agree to our <a href="/terms">Terms</a>, <a href="http://">Privacy Policy </a>and <a href="http://">Cookies Policy.</a><br><br>
        Already a Member? <a href="/log-in">Log In.</a></p>
        
        <button type="submit" class="signin-button" onclick="this.classList.toggle('signin-loader')">
            <span class="button_signin-text">Sign Up</span> 
        </button>
</form>
        </div>
    </div>

</div>
</section>
