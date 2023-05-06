
<section class="all-ratings-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert">{{ session('status') }}</h6>
@endif


    <div class="pb-2 d-flex justify-content-between px-3 pt-4">
    <h5 class="pb-2 title"><strong>All Rating</strong></h5>
    </div>

<div class="table-responsive px-3" style="width: 100%;">

<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="width: 100%;">
<thead class="table table-dark">
<tr>
  <th scope="col">Car</th>
  <th scope="col">Client</th>
  <th scope="col">Ratings</th>
  <th scope="col" class="">Review</th>
  <th scope="col">Rated at</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach ($ratings as $rating)
 <tr>
 <td>
    <div class ="d-flex align-items-center">
        <img src="/images/uploads/{{ $rating->car->carphoto }}" alt=""
        style="width: 45px;" class="">
      <div class="ms-3">
          <p class="fw-bold mb-1">{{ $rating->car->brand }} {{ $rating->car->model }} {{ $rating->car->year }}</p>
          <p class="text-muted mb-0">{{ $rating->car->transmission }}</p>

      </div>
    </div>
  </td>
  <td>{{ $rating->booking->name }}</td>
  
  <td>
  <span>
    @for ($i = 1; $i <= $rating->rating; $i++)
        <i class="fas fa-star text-warning"></i>
    @endfor
    @for ($i = $rating->rating + 1; $i <= 5; $i++)
        <i class="far fa-star text-muted"></i>
    @endfor
    ({{ $rating->rating }})
</span>

  </td>
  <td>{{ $rating->rating_msg }}</td>
  <td>
  <div class="">
      <p class="fw-bold mb-1">{{ \Carbon\Carbon::parse($rating->created_at)->format('F d, Y')}}</p>
      <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($rating->created_at)->format('h:i A')}}</p>
    </div>
  </td>
  <td>
  <a href="#" title="View" class="actions action-view"  data-id="{{ $rating->id }}" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
  @can('can:delete-record')
  <a href="/delete_ratings/{{ $rating->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
  @endcan
  </td>
  </tr>
  @endforeach
</tbody>
</table>


</div>




</section>




<!-- View Modal Ratings-->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ratings</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <table class="table" cellspacing="0" cellpadding="0" style="border: 1px solid #003049;" id="modalTable">
          <thead class="table" style="background: #023047; color: white;">
            <tr>
            <th style="padding: 10px; text-align: left; width: 50%;">View Details</th>
            <th style="padding: 10px; text-align: left; width: 50%;"></th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 10px;" >Client</td>
              <td style="padding: 10px;"><span id="name"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Rating</td>
              <td style="padding: 10px;"><span id="rating"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Review</td>
              <td style="padding: 10px;"><span id="review"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Car Brand</td>
              <td style="padding: 10px;"><span id="car_brand"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Car Model</td>
              <td style="padding: 10px;"><span id="car_model"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Vehicle Type</td>
              <td style="padding: 10px;"><span id="car_vehicle"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Year</td>
              <td style="padding: 10px;"><span id="car_year"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Plate #</td>
              <td style="padding: 10px;"><span id="car_plate"></span></td>
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