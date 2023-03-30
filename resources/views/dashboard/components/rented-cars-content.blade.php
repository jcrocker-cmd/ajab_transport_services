<section class="all-rented-section">
<div class="table-responsive px-3 pb-3">
    
<h5 class="pt-4 pb-2 title"><strong>Rented Cars</strong></h5>
<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="width: 100%;">
<thead class="table table-dark">
    <tr>
      <th scope="col">Renter</th>
      <th scope="col">Car Owner</th>
      <th scope="col">Car</th>
      <th scope="col">Plate No.</th>
      <th scope="col">Vehicle Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($rented as $item)
    @if ($item->status == 'Confirmed')
    <tr>
      <td>
        <div class ="d-flex align-items-center">
        @if($item->user)
            <img src="{{ $item->user->picture ?: asset('/images/default-user.png') }}" alt="" style="height: 45px; width: 45px;" class="rounded-circle">
        @else
            <img src="{{ asset('/images/default-user.png') }}" alt="" style="height: 45px; width: 45px;" class="rounded-circle">
        @endif
        <div class="ms-3">
            <p class="fw-bold mb-1">{{ $item->name }}</p>
            <p class="text-muted mb-0">{{ $item->con_email }}</p>

        </div>
        </div>

      </td>

      <td>
        <div class="">
            <p class="fw-bold mb-1">{{ $item->car->fname }} {{ $item->car->mname }} {{ $item->car->lname }}</p>
            <p class="text-muted mb-0">{{ $item->car->email }}</p>

        </div>

      </td>
      <td>

        <div class ="d-flex align-items-center">
            <img src="/images/uploads/{{ $item->car->carphoto }}" alt=""
            style="width: 45px;" class="">
          <div class="ms-3">
              <p class="fw-bold mb-1">{{ $item->car->brand }} {{ $item->car->model }} {{ $item->car->year }}</p>
              <p class="text-muted mb-0">{{ $item->car->transmission }}</p>

          </div>
        </div>

      </td>

      <td>{{ $item->car->plate }}</td>
      <td>
        <span class="badge bg-danger rounded-pill">Rented</span>
      </td>

      <td>
      <a href="#" title="View" class="actions action-view" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
      </td>
      </tr>
    @endif
    @endforeach
  </tbody>
</table>
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
        <table class="table" cellspacing="0" cellpadding="0" style="border: 1px solid #003049;" style="font-size: 10px;" id="modalTable">
          <thead class="table" style="background: #023047; color: white;" style="font-size: 10px;">
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

        <div class="created_at"><strong>Confirmed by Admin at:</strong> <span id="date"></span></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
