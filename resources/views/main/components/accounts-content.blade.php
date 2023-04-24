<section class="main-user-account-section">

<div class="user-account-section">
@if (session('accountstatus'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('accountstatus') }}</h6>
@endif

@if (session('successpassword'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('successpassword') }}</h6>
@endif

@if (session('failpassword'))
  <h6 class="alert alert-danger my-0" id="myAlert" style="font-size: 14px;">{{ session('failpassword') }}</h6>
@endif

<section class="settings py-4">

<h5 class="text-white pb-2 title"><strong>Account Settings</strong></h5>



<div class="settings-row pt-2 d-flex">



        <div class="settings-col-1">

            <div class="settings-image text-center bg-light px-5 py-4">
            <form enctype="multipart/form-data" action="/user_adminpp_update" method="post">
            @csrf
            @method('put')
                <div class ="mb-4 settings-profile">
                    <!-- <img src="{{ url('images/profile_picture/' . Auth::user()->profile_picture) }}"
                     class="rounded-circle" id="change-img-add" style="object-fit: cover;"> -->

                    @if(Auth::user()->profile_picture)
                        @if(file_exists(public_path('images/profile_picture/'.Auth::user()->profile_picture)))
                            <img src="{{ asset('images/profile_picture/' . Auth::user()->profile_picture) }}" alt="User Profile Picture"  class="rounded-circle" id="change-img-add" style="object-fit: cover;">
                        @else
                            <img src="{{ Auth::user()->profile_picture }}" alt="User Profile Picture" class="rounded-circle" id="change-img-add" style="object-fit: cover;">
                        @endif
                    @else
                        <img src="{{ asset('/images/default-user.png') }}" alt="Default User Profile Picture" class="rounded-circle" id="change-img-add" style="object-fit: cover;">
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


                <form action="/user_password_update" method="post" class="px-3 py-2">
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

                <form action="/user_info_update" class="px-3" method="post">
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
</div>



    <section class="user-account-section2">

        <div class="myrental-wrapper">

            <div class="d-flex align-items-center" style="display: inline-flex;">
                <h5 class="pb-2 mb-0"><strong>My Rentals</strong></h5>
                @if ($bookingCount > 0)
                    <span class="rental-badge">{{ $bookingCount }}</span>
                @endif
            </div>
        

        @if(count($bookings) > 0)    
        @foreach ($bookings as $booking)
        <div class="rental-card">
            <div class="rental-top">
                <span class="d-flex buttons">
                  <div><button class="action-view" data-id="{{ $booking->id }}" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fas fa-eye"></i> View</button></div>
                  @if ($booking->status == 'Closed')
                  <div><button class="action-rating" data-id="{{ $booking->id }}" data-bs-toggle="modal" data-bs-target="#ratingsModal"><i class="fas fa-star"></i> Rate</button></div>
                  @endif

                  @if ($booking->status == 'In progress')
                    <div class="d-flex align-items-center" style="gap: 5px;">
                      <form method="POST" action="/cancel_booking/{{$booking->id}}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                        <button type="submit" class="action-cancel">Cancel</button>
                      </form>
                    </div>
                  @endif
                </span>
                <span class="statuses">
                    <strong>
                    @if ($booking->status == 'In progress')
                        <span class="badge bg-warning rounded-pill">{{ $booking->status }}</span>
                    @elseif ($booking->status == 'Confirmed')
                        <span class="badge bg-success rounded-pill">{{ $booking->status }}</span>
                    @elseif ($booking->status == 'Declined')
                        <span class="badge bg-secondary rounded-pill">{{ $booking->status }}</span>
                    @elseif ($booking->status == 'Closed')
                        <span class="badge bg-danger rounded-pill">{{ $booking->status }}</span>
                    @elseif ($booking->status == 'Cancelled')
                      <span class="badge bg-info rounded-pill">{{ $booking->status }}</span>
                    @endif
                    </strong>
                </span>
            </div>

            <!-- <hr> -->

            <div class="rental-mid">
                <div>
                    <img src="/images/samplecar.png" alt="">
                </div>

                <div class="group">
                <div>
                    <p>{{ $booking->car->brand }} {{ $booking->car->model }} {{ $booking->car->year }} {{ $booking->car->transmission }}</p>
                    <p>Daily Booking Form</p>
                    <!-- <p>Start: {{ $booking->start_date }} {{ $booking->start_time }}</p> 
                    <p>End: {{ $booking->return_date }} {{ $booking->return_time }}</p>  -->
                </div>

                
                <div>
                    <!-- <p>Toyota Vios 2017 Manual</p>
                    <p>Daily Booking Form</p> -->
                    <p>Start: December 02, 2000 10:00 PM</p> 
                    <p>End: December 02, 2000 12:00 PM</p> 
                </div>
                </div>

            </div>

            <hr>

            <div class="rental-bottom">
                <span><strong>Total Amount: ₱ 200,000</strong></span>
            </div>


        </div>
        @endforeach
        
        @else
            <h6><strong>You have no rentals yet.</strong></h6>
        @endif
        </div>




        <div class="delete-account-wrapper">
            <h5><strong>Delete Account</strong></h5>
            <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
            
            <div class="delete-button">
                <a href="/delete_account/{{ Auth::user()->id }}" class="btn-delete" onclick="return confirm(&quot;Are you sure you want to delete your account?&quot;)">
                    <span><i class="fas fa-trash-alt"></i></span>
                    <span>Delete Account</span>
                </a>
            </div>
        </div>

    </section>

    <section class="user-account-section3">



    </section>


    <!-- View Modal -->
<div class="modal fade " id="ratingsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="width: 100%;">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <form action="/ratings_submit" method="post">
      @csrf
      <div class="modal-body">

        <div class="rating-title">
          <span>Customer's Review</span>
        </div>
          
        <div class="rating">
          <input type="radio" name="rating" id="star5" value="5" /><label for="star5" title="5 Stars"><i class="fas fa-star"></i></label>
          <input type="radio" name="rating" id="star4" value="4" /><label for="star4" title="4 Stars"><i class="fas fa-star"></i></label>
          <input type="radio" name="rating" id="star3" value="3" /><label for="star3" title="3 Stars"><i class="fas fa-star"></i></label>
          <input type="radio" name="rating" id="star2" value="2" /><label for="star2" title="2 Stars"><i class="fas fa-star"></i></label>
          <input type="radio" name="rating" id="star1" value="1" /><label for="star1" title="1 Star"><i class="fas fa-star"></i></label>
        </div>

        <input type="hidden" name="car_id" id="car_id">
        <input type="hidden" name="booking_id" id="booking_id">

        <div class="rating-txt">
          <label for="rating">Message</label>
          <textarea name="rating_msg" id="rating-txt" rows="5" placeholder="Leave a message here"></textarea>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn-warning">Rate</button>
      </div>
      </form>
    </div>
  </div>
</div>








<!-- View Modal -->
<div class="modal fade " id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table" cellspacing="0" cellpadding="0" style="border: 1px solid #003049;" id="modalTable">
          <thead class="table" style="background: #023047; color: white;">
            <tr>
            <th style="padding: 10px; text-align: left; width: 50%;">Renter Information</th>
            <th style="padding: 10px; text-align: left; width: 50%;"></th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 10px;" >Full Name</td>
              <td style="padding: 10px;"><span id="name"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Contact Email</td>
              <td style="padding: 10px;"><span id="con_email"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Contact Phone</td>
              <td style="padding: 10px;"><span id="con_num"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Address</td>
              <td style="padding: 10px;"><span id="address"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Message (Optional)</td>
              <td style="padding: 10px;"><span id="msg"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">License (Front Side)</td>
              <td style="padding: 10px;"><span id="view_front_license"><img src="" style="width: 200px;"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">License (Back Side)</td>
              <td style="padding: 10px;"><span id="view_back_license"><img src="" style="width: 200px;"></span></td>
            </tr>
          </tbody>

          <thead class="table"  style="background: #023047; 
                                            color: white;
                                            ">
            <tr>
              <th style="padding: 10px; text-align: left;" colspan="2">Car Details</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border: 1px solid black;">
              <td style="padding: 10px;">Brand</td>
              <td style="padding: 10px;"><span id="car-brand"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Model</td>
              <td style="padding: 10px;"><span id="car-model"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Vehicle type</td>
              <td style="padding: 10px;"><span id="car-vehicle"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Year Model</td>
              <td style="padding: 10px;"><span id="car-year"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Transmission</td>
              <td style="padding: 10px;"><span id="car-transmission"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Plate No.</td>
              <td style="padding: 10px;"><span id="car-plate"></span></td>
            </tr>
          </tbody>

          <thead class="table"  style="background: #023047; 
                                            color: white;
                                            ">
            <tr>
              <th style="padding: 10px; text-align: left;" colspan="2">Reservation Details</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border: 1px solid black;">
              <td style="padding: 10px;">Start Date</td>
              <td style="padding: 10px;"><span id="start_date"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Start Time</td>
              <td style="padding: 10px;"><span id="start_time"></span></td>
            </tr>
            <tr style="border: 1px solid black;">
              <td style="padding: 10px;">Return Date</td>
              <td style="padding: 10px;"><span id="return_date"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Return Time</td>
              <td style="padding: 10px;"><span id="return_time"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Mode of Delivery</td>
              <td style="padding: 10px;"><span id="mode_del"></span></td>
            </tr>
          </tbody>


          <thead class="table"  style="background: #023047; 
                                            color: white;
                                            ">
            <tr>
              <th style="padding: 10px; text-align: left;" colspan="2">Payment Details</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border: 1px solid black;">
              <td style="padding: 10px;">Payment Method</td>
              <td style="padding: 10px;"><span id="payment"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Total Amount Payable</td>
              <td style="padding: 10px;">@fat</td>
            </tr>
          </tbody>
        </table>

        <div class="created_at"><strong>Created at:</strong> <span id="date"></span></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


