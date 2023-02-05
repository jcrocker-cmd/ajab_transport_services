<section class="main-user-account-section">

    <section class="user-account-section">
        <div class="user-account-wrapper">
            <img src="/images/default-user.png" alt="">
            <span class="line"></span>
            <div class="info">

                <div class="info-sub-1">
                    <p>Full Name:<strong style="margin-left: 10px;">{{ $data->fname}} {{ $data->mname}} {{ $data->lname}}</strong></p>
                    <p>Username:<strong style="margin-left: 10px;">{{ $data->email}}</strong></p>
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

                <a href="#" class="btn-edit-pass" >
                    <span><i class="fas fa-lock-alt"></i></span>
                    <span>EDIT PASSWORD</span>
                </a>
        </div>

        <!-- PASSWORD -->
        <div class="modal fade modal-dialog-centered" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <h3>MY RENTALS</h3>
        </div>

        <div class="myrating-wrapper">
            <h3>MY RATINGS</h3>
        </div>

    </section>

</section>


