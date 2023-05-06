<section class="dashboard-login">
   <div class="dashboard-login-div ">
      <div class="text-center pb-2"><img src="/images/LOGO.png" class="dashboard-logo" alt="Company Logo"></div>
      <div class="dashboard-login-title">Dashboard Login</div>
      <form action="{{ route('login') }}" class="login" method="post">
         @csrf
         <div class="fields">
            <div class="admin-email" >
               <label>Username</label>
               <input type="text" name="email"  placeholder="Enter Email" value ="{{ old('email') }}" autocomplete="off">
               <span class="error-message">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="admin-password">
               <label>Password</label>
               <input type="password" name="password" placeholder="Enter Password" id="dbPassword" onkeyup="return showhideIcon()">
               <span class="error-message">@error('password') {{$message}} @enderror</span>
               <!-- <i class="far fa-eye" id="dbTogglePassword" style="cursor: pointer;"></i> -->
            </div>
         </div>
         <div class="remember-forgot mb-2">
            <div class="d-flex">
               <div class="checkbox">
                  <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                  <label class="" for="remember"> Remember me</label>
               </div>
            </div>
            <div class="d-flex">
               <a href="{{ route('password.request') }}">Forgot password?</a>
            </div>
         </div>
         <div class="d-grid ">
            <button class="dashboard-login-button" type="submit">Log In</button>
         </div>
      </form>
   </div>
</section>