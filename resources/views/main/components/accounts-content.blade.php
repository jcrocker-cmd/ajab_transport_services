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
                    <p class="text-muted timestamp">Member Since:<strong style="margin-left: 10px;">{{ $data->created_at->format('jS F Y h:i:s A')}}</strong></p>
                    <p class="text-muted timestamp">Last Updated:<strong style="margin-left: 10px;">{{ $data->updated_at->format('jS F Y h:i:s A')}}</strong></p>
                </div>

            </div>

            
        </div>

        <div class="account-settings-buttons">
                <a href="#" class="btn-edit">
                    <span><i class="fas fa-pencil"></i></span>
                    <span>EDIT PROFILE INFORMATION</span>
                </a>

                <a href="#" class="btn-edit-pass" data-toggle="modal" data-target="#exampleModal">
                    <span><i class="fas fa-lock-alt"></i></span>
                    <span>EDIT PASSWORD</span>
                </a>
        </div>

        <!-- PASSWORD -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
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


        
    </section>


    <section class="user-account-section2">

        <div class="myrental-wrapper">
            <h4 class="pb-3">My Rentals</h4>

            @if(count($bookings) > 0)
            <div class="table-responsive">

                <table class="table align-middle mb-0 bg-light table-hover" id="dbTable">
                <thead class="table table-dark">
                <tr>
                <th scope="col" class="col-3">Owner</th>
                <th scope="col">Vehicle Status</th>
                <th scope="col">Card Brand</th>
                <th scope="col">Car Model</th>
                <th scope="col">Plate No.</th>
                <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td>
                        <div class ="d-flex align-items-center">
                                <img src="user.jpg" alt=""
                                style="height: 45px; width: 45px;" class="rounded-circle">
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $booking->id }}</p>
                                <p class="text-muted mb-0">dfdf</p>

                            </div>
                        </div>

                    </td>
                    <td>
                        @if ($booking->status == 'In progress')
                            <span class="badge bg-warning rounded-pill">{{ $booking->status }}</span>
                        @elseif ($booking->status == 'Confirmed')
                            <span class="badge bg-success rounded-pill">{{ $booking->status }}</span>
                        @elseif ($booking->status == 'Declined')
                            <span class="badge bg-secondary rounded-pill">{{ $booking->status }}</span>
                        @elseif ($booking->status == 'Closed')
                            <span class="badge bg-danger rounded-pill">{{ $booking->status }}</span>
                        @endif
                    </td>

                    <td>{{ $booking->car->brand }} {{ $booking->car->model }}</td>
                    
                    <td>asas</td>
                    <td>aasasa</td>
                    <td>
                    <a href="" title="View" class="actions action-view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                    <h6><strong>You have no rentals yet.</strong></h6>
                @endif

                </tbody>
                </table>

            </div>
        </div>

        <!-- <div class="myrating-wrapper">
            <h4>My Ratings</h4>
        </div> -->

        <div class="delete-account-wrapper">
            <h4>Delete Account</h4>
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

</section>


