@if (session('accountstatus'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('accountstatus') }}</h6>
@endif

@if (session('successpassword'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('successpassword') }}</h6>
@endif

@if (session('failpassword'))
  <h6 class="alert alert-danger my-0" id="myAlert" style="font-size: 14px;">{{ session('failpassword') }}</h6>
@endif

<section class="settings px-3 py-4">

<h5 class=" pb-2 title"><strong>Account Settings</strong></h5>



<div class="settings-row pt-2 d-flex">



        <div class="settings-col-1">

            <div class="settings-image text-center bg-light px-5 py-4">
            <form enctype="multipart/form-data" action="/adminpp_update" method="post">
            @csrf
            @method('put')
                <div class ="mb-4 settings-profile">
                    <!-- <img src="{{ url('images/profile_picture/' . Auth::user()->profile_picture) }}"
                     class="rounded-circle" id="change-img-add" style="object-fit: cover;"> -->

                        @if(Auth::user()->profile_picture)
                            <img src="{{ asset('/images/profile_picture/' . Auth::user()->profile_picture) }}" id="change-img-add" class="user_icon rounded-circle" height="42" width="42" style="object-fit: cover;">
                        @else
                            <img src="{{ asset('/images/default-user.png') }}" class="user_icon rounded-circle" height="42" width="42" id="change-img-add" style="object-fit: cover;">
                        @endif

                </div>

                <div class="">
                    <p class="fw-bold mb-0">{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}, {{ Auth::user()->last_name }}</p>
                    <p class="text-muted mb-0">{{ Auth::user()->roles->pluck('name')->implode(', ') }}</p>
                </div>

                <div class="img-button mt-3">
                    <input type="file" name="profile_picture" id="addphotoBtn" accept="image/jpg, image/jpeg, image/png" hidden>
                    <button onclick ="addPhoto()" type="button" class="btn btn-primary" id="addphotoBtn">Choose Image</button>
                    <button type="submit" class="btn btn-success" id="addphotoBtn">Save</button>
                </div>
            </form>

            </div>

    

    
        <div class="settings-password  mt-4  bg-light">

            <div class="bg-light"><p class="px-2 py-2 settings-title">Edit Password</p></div>


                <form action="/adminpassword_update" method="post" class="px-3 py-2">
                @csrf
                @method('put')
                <div class="mb-3 old_password">
                    <div class="input-group">
                        <input type="password" class="form-control border-right-0" placeholder="Old Password" id="oldPassword" name="old_password">
                        <span class="input-group-text"><i class="far fa-eye" id="togglePassword1" style="cursor: pointer;"></i></span>
                    </div>
                    @if($errors->any('old_password'))
                        <p class="my-0 text-danger" style="font-size: 12px;">{{$errors->first('old_password')}}</p>
                    @endif
                </div>

                <div class="mb-3 new_password">
                    <div class="input-group">
                        <input type="password" class="form-control border-right-0" placeholder="New Password" id="newPassword" name="new_password">
                        <span class="input-group-text"><i class="far fa-eye" id="togglePassword2" style="cursor: pointer;"></i></span>
                    </div>
                    @if($errors->any('new_password'))
                        <p class="my-0 text-danger" style="font-size: 12px;">{{$errors->first('new_password')}}</p>
                    @endif
                </div>

                <div class="mb-3 confirm_password">
                    <div class="input-group">
                        <input type="password" class="form-control border-right-0" placeholder="Confirm Password" id="confirmPassword" name="confirm_password">
                        <span class="input-group-text"><i class="far fa-eye" id="togglePassword3" style="cursor: pointer;"></i></span>
                    </div>
                    @if($errors->any('confirm_password'))
                        <p class="my-0 text-danger" style="font-size: 12px;">{{$errors->first('confirm_password')}}</p>
                    @endif
                </div>


                <div class="mb-2 password-button justify-content-right">
                <button type="submit" class="btn btn-success" id="default-btn">Update</button>
                </div>

                </form>
            

        </div>
        </div>

         <div class="settings-col-2 ">




            <div class="settings-edit-profile bg-light">

                <p class="py-2 px-2 settings-title">Edit Profile</p>

                <p class="px-3 mb-2"><strong>Basic Info</strong></p>

                <form action="/admininfo_update" class="px-3" method="post">
                @csrf
                @method('put')

                <div class="mb-2 d-flex edit-profile">
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->first_name }}" onkeyup="javascript:capitalize(this);">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Middle Name</label>
                        <input type="text" name="middle_name" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->middle_name }}" onkeyup="javascript:capitalize(this);">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Cruz" value="{{ Auth::user()->last_name }}" onkeyup="javascript:capitalize(this);">
                    </div>

                </div>

                

                <div class="mb-4 d-flex edit-profile">
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="example@email.com" value="{{ Auth::user()->email }}">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input type="number" name="con_num" class="form-control" id="exampleFormControlInput1" placeholder="09123456789" value="{{ Auth::user()->con_num }}">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Birth-Date</label>
                        <input type="date" name="bday" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->bday }}">
                    </div>

                </div>
                

                <p class=" mb-2"><strong>Address</strong></p>

                <div class="mb-2 d-flex edit-address">
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Purok/Street</label>
                        <input type="text" name="purok" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Purok 2 / Lot 1 Blk 1" value="{{ Auth::user()->purok }}" onkeyup="javascript:capitalize(this);">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Baranggay</label>
                        <input type="text" name="baranggay" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Salvador" value="{{ Auth::user()->baranggay }}" onkeyup="javascript:capitalize(this);">
                    </div>
                </div>

                

                <div class="mb-2 d-flex edit-address">
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Town</label>
                        <input type="text" name="town" class="form-control" id="exampleFormControlInput1" placeholder="Consolacion" value="{{ Auth::user()->town }}">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Province</label>
                        <input type="text" name="province" class="form-control" id="exampleFormControlInput1" placeholder="Cebu City" value="{{ Auth::user()->province }}">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Postal Code</label>
                        <input type="text" name="postal" class="form-control" id="exampleFormControlInput1" placeholder="6001" value="{{ Auth::user()->postal }}">
                    </div>

                </div>

                <!-- <p class=" mb-0"><strong>Basic Info</strong></p> -->

                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Facebook Profile URL (Optional)</label>
                        <input type="text" name="fb" class="form-control" id="exampleFormControlInput1" placeholder="https://www.facebook.com/myprofile"  value="{{ Auth::user()->fb }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">About Me (Optional)</label>
                        <textarea class="form-control" name="admin_about" id="exampleFormControlTextarea1" rows="3" value="{{ Auth::user()->about }}"></textarea>
                    </div>

                    <div class="pb-3 password-button justify-content-right">
                        <button type="submit" class="btn btn-success" id="default-btn">Update Information</button>
                    </div>




                </form>


          
            </div>  


        </div>

    
</div>

</section>