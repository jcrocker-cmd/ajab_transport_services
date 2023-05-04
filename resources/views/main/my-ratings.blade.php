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

    <div class="myratings-wrapper">

          <div class="d-flex align-items-center" style="display: inline-flex;">
              <h5 class="pb-2 mb-0"><strong>My Ratings</strong></h5>
              @if ($ratingCount > 0)
                  <span class="rental-badge">{{$ratingCount}}</span>
              @endif
          </div>

          @if(count($ratings) > 0)   
          @foreach ($ratings as $rating)
          <div class="ratings-card">
            <div class="ratings-col-1">
              <span>{{ $rating->car->brand }} {{ $rating->car->model }} {{ $rating->car->year }}</span>
              <span>{{ $rating->car->transmission }}</span>
              <span><img src="/images/uploads/{{ $rating->car->carphoto }}" alt=""></span>
            </div>
            <div class="ratings-col-2">
            <div class="ms-3">
              <p class="fw-bold mb-2">{{ $rating->booking->name }}</p>


              <div class="rating-star pb-3 align-items-center">
              <span>
                @for ($i = 1; $i <= $rating->rating; $i++)
                    <i class="fas fa-star text-warning"></i>
                @endfor
                @for ($i = $rating->rating + 1; $i <= 5; $i++)
                    <i class="far fa-star text-muted"></i>
                @endfor
              </span>

                  <span>{{ $rating->rating }} / 5.0</span>
                  
              </div>

              <p class="text-muted">{{ $rating->rating_msg }}</p>
              <p class="date">Date: {{ \Carbon\Carbon::parse($rating->created_at)->format('F d, Y')}} {{ \Carbon\Carbon::parse($rating->created_at)->format('h:i A')}}</p>


              <div class="ratings-buttons">
              <a href="#" title="View" class="actions action-view-ratings text-dark"  data-id="{{ $rating->id }}" data-bs-toggle="modal" data-bs-target="#viewModalRating"><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a href="" title="Edit" class="actions action-edit-ratings" data-id="{{ $rating->id }}" data-bs-toggle="modal" data-bs-target="#editModalRating"><i class="fa fa-edit text-warning" aria-hidden="true"></i></a>
              <a href="/delete_user_ratings/{{ $rating->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </div>
              
            </div>
            </div>
          </div>
          @endforeach

        
          @else
          <h6><strong>You have no ratings yet.</strong></h6>
          @endif

          </div>
        </section>
        </section>
        </section>




        
<!-- View Modal Ratings -->
<div class="modal fade" id="viewModalRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <td style="padding: 10px;"><span id="rater_name"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Rating</td>
              <td style="padding: 10px;"><span id="rater_rating"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Review</td>
              <td style="padding: 10px;"><span id="rater_review"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Car Brand</td>
              <td style="padding: 10px;"><span id="rater_car_brand"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Car Model</td>
              <td style="padding: 10px;"><span id="rater_car_model"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Vehicle Type</td>
              <td style="padding: 10px;"><span id="rater_car_vehicle"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Year</td>
              <td style="padding: 10px;"><span id="rater_car_year"></span></td>
            </tr>
          </tbody>
        </table>

        <div class="created_at"><strong>Created at:</strong> <span id="rater_date"></span></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<!-- MODAL FOR UPDATE RATINGS -->

<div class="modal fade" id="editModalRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 100%;">
    <div class="modal-content">

    <form action="/update_ratings" method="post" id="edit_announcement_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Ratings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @csrf
          @method('put')

            <div class="mb-3" style="display: none;">
              <label for="recipient-name" class="col-form-label">ID:</label>
              <input type="text" id="e_ratings_id" class="form-control" name="ratings_id">
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Ratings:</label>
              <select name="rating" class="form-control" id="e_rater_rating">
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
                </select>
              <span class="text-danger error-text" id="e_error_sub"></span>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Review:</label>
              <textarea rows="5" id="e_rater_review" class="form-control" name="rating_msg"></textarea>
              <span class="text-danger error-text" id="e_error_des"></span>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="edit_announce_button">Update</button>
        </div>
      </form>
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
    <script src="/js/ajax-ratings.js"></script>
    <script src="/js/ajax-ratings-user-view.js"></script>
    <script src="/js/ajax-ratings-user-edit.js"></script>
@endpush
