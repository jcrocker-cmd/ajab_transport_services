<section class="main-user-account-section">

    <section class="user-account-section">
        <div class="user-account-wrapper">
            <img src="{{ $data->picture ?: asset('/images/default-user.png') }}" alt="">
            <span class="line"></span>
            <div class="info">

                <div class="info-sub-1">
                    <p>Full Name:<strong style="margin-left: 10px;">{{ $data->first_name}} {{ $data->last_name}}</strong></p>
                    <p>Email:<strong style="margin-left: 10px;">{{ $data->email}}</strong></p>
                    <p>Birth-Date:<strong style="margin-left: 10px;">{{ $data->bday}}</strong></p>
                    <p>Gender:<strong style="margin-left: 10px;">{{ $data->gender}}</strong></p>
                </div>

                <div class="info-sub-2">
                    <p class="text-white timestamp">Member Since:<strong style="margin-left: 10px;">{{ $data->created_at->format('jS F Y h:i:s A')}}</strong></p>
                    <p class="text-white timestamp">Last Updated:<strong style="margin-left: 10px;">{{ $data->updated_at->format('jS F Y h:i:s A')}}</strong></p>
                </div>

            </div>

            
        </div>

        <div class="account-settings-buttons">
                <a href="#" class="btn-edit action-edit-info" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#infoModal">
                    <span><i class="fas fa-pencil"></i></span>
                    <span>EDIT PROFILE INFORMATION</span>
                </a>

                <a href="#" class="btn-edit-pass" data-bs-toggle="modal" data-bs-target="#passModal">
                    <span><i class="fas fa-lock-alt"></i></span>
                    <span>EDIT PASSWORD</span>
                </a>
        </div>

        <!-- PASSWORD -->
        <div class="modal fade" id="passModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-l">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Old Password:</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">New Password:</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Confirm Password:</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
            </div>
        </div>
        </div>


        <!-- EDIT INFORMATION -->
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-l">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('account-info-update') }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3 d-none">
                    <label for="recipient-name" class="col-form-label">ID</label>
                    <input type="text" class="form-control" id="user_id" name="user_id">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">First Name:</label>
                    <input type="text" class="form-control" id="edit_fname" name="first_name">
                </div>

                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Last Name:</label>
                    <input type="text" class="form-control" id="edit_lname" name="last_name">
                </div>

                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="edit_email" name="email">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Birthdate:</label>
                    <input type="date" class="form-control" id="edit_bday" name="bday">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Gender:</label>
                    <select class="form-select" aria-label="Default select example" id="edit_gender" name="gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
            </div>
        </div>
        </div>


        
    </section>


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
                <a href="/delete_account/{{ $data->id }}" class="btn-delete" onclick="return confirm(&quot;Are you sure you want to delete your account?&quot;)">
                    <span><i class="fas fa-trash-alt"></i></span>
                    <span>Delete Account</span>
                </a>
            </div>
        </div>

    </section>

    <section class="user-account-section3">



    </section>




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



</section>