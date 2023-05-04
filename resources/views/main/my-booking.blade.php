@extends('main.layout.master')

@section('styles')
    @include('main.assets.bootstrapcss')
    @include('main.assets.style')
 @endsection

@section('content') 
    @include('main.layout.header-main')
    @include('main.layout.header2-main')
    <section style="background: #7594e2;">
    <section class="main-user-account-section">
    <section class="user-account-section2">
    <div class="myrental-wrapper">

<div class="d-flex align-items-center" style="display: inline-flex;">
    <h5 class="pb-2 mb-0"><strong>My Bookings</strong></h5>
    @if ($bookingCount > 0)
        <span class="rental-badge">{{ $bookingCount }}</span>
    @endif
</div>


@if(count($bookings) > 0)    
@foreach ($bookings as $booking)
<div class="rental-card">
<div class="rental-top">
    <span class="d-flex buttons">
      <div><button class="action-view-booking" data-id="{{ $booking->id }}" data-bs-toggle="modal" data-bs-target="#viewModalBooking"><i class="fas fa-eye"></i> View</button></div>
      @if ($booking->status == 'Closed' && !$booking->car_rating)
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
</section>
</section>
</section>



<!-- View Modal Rate -->
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



<!-- View Modal Booking-->
<div class="modal fade " id="viewModalBooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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




@endsection

@section('script')
    @include('main.assets.bootstrapjs')
    @include('main.assets.script')
@endsection


@push('script')
    <script src="/js/moment-library.js"></script>
    <script src="/js/ajax-user-booking.js"></script>
@endpush
