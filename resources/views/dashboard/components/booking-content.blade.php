
<section class="all-booking-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert">{{ session('status') }}</h6>
@endif


    <div class="pb-2 d-flex justify-content-between px-3 pt-4">
    <h5 class="pb-2 title"><strong>All Bookings</strong></h5>
    </div>
<div class="table-responsive px-3 pb-3">

<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="width: 100%;">
<thead class="table table-dark">
<tr>
  <th scope="col" class="col-3">Renter</th>
  <th scope="col">Rented Car</th>
  <th scope="col">Start</th>
  <th scope="col">Return</th>
  <th scope="col">Booked At</th>
  <th scope="col">Status</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach($booking as $item)
 <tr>
  <td>
    <div class ="d-flex align-items-center">
        <!-- @if($item->user)
            <img src="{{ $item->user->picture ?: asset('/images/default-user.png') }}" alt="" style="height: 45px; width: 45px;" class="rounded-circle">
        @else
            <img src="{{ asset('/images/default-user.png') }}" alt="" style="height: 45px; width: 45px;" class="rounded-circle">
        @endif -->

        @if($item->user->profile_picture)
          @if(file_exists(public_path('images/profile_picture/'.$item->user->profile_picture)))
                  <img src="{{ asset('/images/profile_picture/' . $item->user->profile_picture) }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
              @else
                  <img src="{{ $item->user->profile_picture }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
              @endif
          @else
              <img src="{{ asset('/images/default-user.png') }}" alt="Default User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
        @endif

    <div class="ms-3">
        <p class="fw-bold mb-1">{{ $item->name}}</p>
        <p class="text-muted mb-0">{{ $item->con_email}}</p>
    </div>
    </div>

  </td> 

  <td>
    <div>
      <p class="fw-bold mb-1">{{ $item->car->brand }} {{ $item->car->model }} {{ $item->car->year }} </p>
      <p class="text-muted mb-0">{{ $item->car->transmission}}</p>
    </div>  
  </td>
  <!-- <td>Toyota</td> -->
  
  <td>
    <div class="">
      <p class="fw-bold mb-1">{{ \Carbon\Carbon::parse($item->start_date)->format('F d, Y')}}</p>
      <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($item->start_time)->format('h:i A')}}</p>
    </div>
  </td>

  <td>
    <div class="">
      <p class="fw-bold mb-1">{{ \Carbon\Carbon::parse($item->return_date)->format('F d, Y')}}</p>
      <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($item->return_time)->format('h:i A')}}</p>
    </div>
  </td>

  <td>
  {{ \Carbon\Carbon::parse($item->created_at)->fromNow() }}
  </td>

  <td>
  @if ($item->status == 'In progress')
      <span class="badge bg-warning rounded-pill">{{ $item->status }}</span>
  @elseif ($item->status == 'Confirmed')
      <span class="badge bg-success rounded-pill">{{ $item->status }}</span>
  @elseif ($item->status == 'Declined')
      <span class="badge bg-secondary rounded-pill">{{ $item->status }}</span>
  @elseif ($item->status == 'Closed')
      <span class="badge bg-danger rounded-pill">{{ $item->status }}</span>
  @elseif ($item->status == 'Cancelled')
    <span class="badge bg-info rounded-pill">{{ $item->status }}</span>
  @endif
  </td>

  <td>
   
  <div style="display: flex;">
  <div class="d-flex align-items-center">
    <a href="#" title="View" class="actions action-view" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
    @can('can:delete-record')
    <a href="/delete_booking/{{ $item->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
    @endcan
    </div>
    
    @if ($item->status != 'Confirmed' && $item->status != 'Closed' && $item->status != 'Declined'&& $item->status != 'Cancelled')
    <div class="d-flex align-items-center" style="gap: 5px;">
      <form method="POST" action="/confirm_booking/{{$item->id}}">
        @csrf
        <input type="hidden" name="booking_id" value="{{ $item->id }}">
        <button type="submit" class="btn btn-primary" style="font-size: 10px;">Confirm</button>
      </form>
      <form method="POST" action="/decline_booking/{{$item->id}}">
        @csrf
        @method('PATCH')
        <input type="hidden" name="booking_id" value="{{ $item->id }}">
        <button type="submit" class="btn btn-danger" style="font-size: 10px;">Decline</button>
      </form>
    </div>
  </div>
  @endif

  </td>



</tr>
@endforeach


</tbody>
</table>


</div>



<div class="chart-wrapper px-3 pb-3">
  <div class="bg-light db-chart px-3 py-3 mt-4" style=" border-radius: 10px; width: 100%; ">
    <h5><strong>Booking Graphical Reports</strong></h5>
    <canvas id="booking_Chart" style=" margin: 0; padding: 0;"></canvas>

    <select id="display-selector">
      <option value="day" selected>Daily</option>
      <option value="week">Weekly</option>
      <option value="month" >Monthly</option>
      <option value="year" >Year</option>
    </select>

    <select id="chart-type-selector" onchange="chartType(this.value)">
      <option value="bar" selected>Bar Chart</option>
      <option value="line">Line Chart</option>
      <!-- <option value="pie">Pie Chart</option> -->
    </select>
  </div>
</div>

</section>




<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <tr>
              <td style="padding: 10px;">Form Type</td>
              <td style="padding: 10px;"><span id="form_type"></span></td>
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
              <td style="padding: 10px;">₱ <span id="total_amount_payable"></span></td>
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



